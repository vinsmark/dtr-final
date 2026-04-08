<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Record;

class RecordManager extends Component
{
    use WithFileUploads;

    public $dat_file;

    // Rename this from 'upload' to 'saveFile'
    public function saveFile()
    {
        $this->validate([
            'dat_file' => 'required|max:10240', 
        ]);

        $path = $this->dat_file->getRealPath();
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // Your data uses spaces/tabs: "77 2026-02-02 07:35:41"
            // We split by any whitespace
            $parts = preg_split('/\s+/', trim($line));

            if (count($parts) >= 3) {
                Record::updateOrCreate(
                    ['custom_id' => $parts[0]], // 77
                    ['entry_date' => $parts[1] . ' ' . $parts[2]] // 2026-02-02 07:35:41
                );
            }
        }

        $this->reset('dat_file');
        session()->flash('message', 'File processed successfully.');
    }

    public function render()
    {
        return view('livewire.record-manager', [
            'records' => Record::latest()->get(),
        ]);
    }
}