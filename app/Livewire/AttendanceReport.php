<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Record;
use Carbon\Carbon;

class AttendanceReport extends Component
{
    public $selectedUser = null;
    public $viewMode = 'summary'; // 'summary' or 'details'

    /**
     * Switch to the detailed daily view for a specific user
     */
    public function viewDetails($userId)
    {
        $this->selectedUser = $userId;
        $this->viewMode = 'details';
    }

    /**
     * Switch back to the main list
     */
    public function backToList()
    {
        $this->selectedUser = null;
        $this->viewMode = 'summary';
    }

    /**
     * Computed Property to process and calculate attendance data
     */
    public function getAttendanceDataProperty()
    {
        $query = Record::orderBy('entry_date', 'asc');
        
        if ($this->selectedUser) {
            $query->where('custom_id', $this->selectedUser);
        }

        $records = $query->get()->groupBy('custom_id');
        $report = [];

        foreach ($records as $userId => $userRows) {
            // Group logs by Month
            $months = $userRows->groupBy(function($item) {
                return Carbon::parse($item->entry_date)->format('F Y');
            });

            foreach ($months as $monthName => $days) {
                $totalLate = 0;
                $totalEarly = 0;
                $dailyBreakdown = [];

                // Group by specific Date
                $daysInMonth = $days->groupBy(function($item) {
                    return Carbon::parse($item->entry_date)->format('Y-m-d');
                });

                foreach ($daysInMonth as $date => $logs) {
                    $scheduleIn = Carbon::parse($date . ' 08:00:00');
                    $scheduleOut = Carbon::parse($date . ' 17:00:00');
                    
                    $firstRecord = Carbon::parse($logs->min('entry_date'));
                    $lastRecord = Carbon::parse($logs->max('entry_date'));

                    $firstTap = null;
                    $lastTap = null;
                    $late = 0;
                    $early = 0;

                    // --- SMART DETECTION LOGIC ---
                    if ($logs->count() === 1) {
                        // If only one tap: Assume it's an 'Out' if it's 12:00 PM or later
                        if ($firstRecord->hour >= 12) {
                            $lastTap = $firstRecord;
                            $firstTap = null; // Mark In as missing
                        } else {
                            $firstTap = $firstRecord;
                            $lastTap = null; // Mark Out as missing
                        }
                    } else {
                        // If 2+ taps: Earliest is In, Latest is Out
                        $firstTap = $firstRecord;
                        $lastTap = $lastRecord;
                    }

                    // --- CALCULATION LOGIC ---
                    // Calculate Late
                    if ($firstTap && $firstTap->gt($scheduleIn)) {
                        $diff = $firstTap->diffInMinutes($scheduleIn);
                        $late = ($diff > 540) ? 0 : (int)$diff;
                    }

                    // Calculate Early Exit
                    if ($lastTap && $lastTap->lt($scheduleOut)) {
                        $early = (int)$lastTap->diffInMinutes($scheduleOut);
                    }

                    $totalLate += $late;
                    $totalEarly += $early;

                    $dailyBreakdown[] = [
                        'date' => $date,
                        'in' => $firstTap ? $firstTap->format('H:i') : 'MISSING',
                        'out' => $lastTap ? $lastTap->format('H:i') : 'MISSING',
                        'late' => $late,
                        'early' => $early
                    ];
                }

                $report[] = [
                    'user_id' => $userId,
                    'month' => $monthName,
                    'days_count' => $daysInMonth->count(),
                    'late_mins' => $totalLate,
                    'early_mins' => $totalEarly,
                    'total_deduction' => $totalLate + $totalEarly,
                    'breakdown' => $dailyBreakdown
                ];
            }
        }

        return $report;
    }

    public function render()
    {
        return view('livewire.attendance-report', [
            'results' => $this->attendance_data
        ]);
    }
}