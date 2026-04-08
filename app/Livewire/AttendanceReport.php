<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Record;
use Carbon\Carbon;

class AttendanceReport extends Component
{
    public function getAttendanceDataProperty()
    {
        // Get all records ordered by date
        $records = Record::orderBy('entry_date', 'asc')->get()->groupBy('custom_id');
        $report = [];

        foreach ($records as $userId => $userRows) {
            $days = $userRows->groupBy(function($item) {
                return Carbon::parse($item->entry_date)->format('Y-m-d');
            });

            $totalLate = 0;
            $totalEarly = 0;

            foreach ($days as $date => $logs) {
                // Define our strict boundaries
                $scheduleIn = Carbon::parse($date . ' 08:00:00');
                $scheduleOut = Carbon::parse($date . ' 17:00:00');

                $firstTap = Carbon::parse($logs->min('entry_date'));
                $lastTap = Carbon::parse($logs->max('entry_date'));

                // 1. Calculate Late (If first tap is after 8:00 AM)
                if ($firstTap->gt($scheduleIn)) {
                    // We only count lateness within a reasonable window (e.g., same morning)
                    // This prevents huge numbers if they only tapped in the afternoon
                    $diff = $firstTap->diffInMinutes($scheduleIn);
                    $totalLate += ($diff > 540) ? 0 : $diff; 
                }

                // 2. Calculate Early Exit (If last tap is before 5:00 PM)
                // We only calculate this if there's a distinct 'Out' tap
                if ($logs->count() > 1 && $lastTap->lt($scheduleOut)) {
                    $totalEarly += $lastTap->diffInMinutes($scheduleOut);
                }
            }

            $report[] = [
                'user_id' => $userId,
                'days_count' => $days->count(),
                'late_mins' => (int)$totalLate,
                'early_mins' => (int)$totalEarly,
                'total_deduction' => (int)($totalLate + $totalEarly)
            ];
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