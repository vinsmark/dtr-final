<?php

namespace App\Livewire;

use App\Models\Attendance;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Attendances extends Component
{
    use WithFileUploads, WithPagination;

    public $file;

    public $search = '';

    public function saveImport()
    {
        $this->validate([
            'file' => 'required|max:10240',
        ]);

        $path = $this->file->getRealPath();
        $rows = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $importedCount = 0;
        $duplicateCount = 0;

        foreach ($rows as $row) {
            if (empty(trim($row))) {
                continue;
            }

            // Split on tabs first
            $data = preg_split('/\t+/', trim($row));

            // Fallback to multiple spaces
            if (count($data) < 3) {
                $data = preg_split('/\s{2,}/', trim($row));
            }

            // Last fallback: any whitespace
            if (count($data) < 3) {
                $data = preg_split('/\s+/', trim($row));
            }

            if (count($data) >= 3) {
                $employee_code = trim($data[0]);

                // Column 1 is already "date time" combined (e.g. "2026-03-16 02:00:45")
                if (str_contains(trim($data[1]), ' ')) {
                    $full_timestamp = trim($data[1]);
                    $state = isset($data[2]) ? trim($data[2]) : null;
                    $device_id = isset($data[3]) ? trim($data[3]) : null;
                    $verification = isset($data[4]) ? trim($data[4]) : null;
                    $work_code = isset($data[5]) ? trim($data[5]) : null;
                } else {
                    // Separate date and time columns
                    $full_timestamp = trim($data[1]).' '.trim($data[2]);
                    $state = isset($data[3]) ? trim($data[3]) : null;
                    $device_id = isset($data[4]) ? trim($data[4]) : null;
                    $verification = isset($data[5]) ? trim($data[5]) : null;
                    $work_code = isset($data[6]) ? trim($data[6]) : null;
                }

                $exists = Attendance::where('employee_code', $employee_code)
                    ->where('log_time', $full_timestamp)
                    ->exists();

                if (! $exists) {
                    Attendance::create([
                        'employee_code' => $employee_code,
                        'log_time' => $full_timestamp,
                        'state' => $state,
                        'device_id' => $device_id,
                        'verification' => $verification,
                        'work_code' => $work_code,
                    ]);
                    $importedCount++;
                } else {
                    $duplicateCount++;
                }
            }
        }

        $this->reset('file');

        session()->flash(
            'message',
            "Import complete: {$importedCount} new logs added. ({$duplicateCount} duplicates skipped)."
        );
    }

    public function render()
    {
        return view('livewire.attendances.index', [
            'attendances' => Attendance::where('employee_code', 'like', '%'.$this->search.'%')
                ->latest('log_time')
                ->paginate(20),
        ]);
    }
}
