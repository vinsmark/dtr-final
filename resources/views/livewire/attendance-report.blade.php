<div class="p-6">
    @if($viewMode == 'summary')
        <h2 class="text-xl font-bold mb-4">Monthly Attendance Summary</h2>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">User ID</th>
                        <th class="px-6 py-3">Month</th>
                        <th class="px-6 py-3">Days</th>
                        <th class="px-6 py-3">Total Late</th>
                        <th class="px-6 py-3 text-red-700">Total Deduction</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $row)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $row['user_id'] }}</td>
                            <td class="px-6 py-4">{{ $row['month'] }}</td>
                            <td class="px-6 py-4">{{ $row['days_count'] }}</td>
                            <td class="px-6 py-4">{{ $row['late_mins'] }}m</td>
                            <td class="px-6 py-4 font-bold text-red-600">-{{ $row['total_deduction'] }}m</td>
                            <td class="px-6 py-4">
                                <button wire:click="viewDetails({{ $row['user_id'] }})" class="text-blue-600 hover:underline font-medium">
                                    View Jan 1-30
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Attendance Details: ID #{{ $selectedUser }}</h2>
            <button wire:click="backToList" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                ← Back to List
            </button>
        </div>

        @foreach($results as $monthData)
            <div class="overflow-x-auto shadow-lg rounded-lg mb-8">
                <table class="w-full text-sm text-left">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time In</th>
                            <th class="px-4 py-2">Time Out</th>
                            <th class="px-4 py-2">Late</th>
                            <th class="px-4 py-2">Early Exit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monthData['breakdown'] as $day)
                            <tr class="border-b bg-white">
                                <td class="px-4 py-2 font-medium">{{ Carbon\Carbon::parse($day['date'])->format('M d, Y') }}</td>
                                <td class="px-4 py-2">{{ $day['in'] }}</td>
                                <td class="px-4 py-2">{{ $day['out'] }}</td>
                                <td class="px-4 py-2 text-orange-600">{{ $day['late'] > 0 ? $day['late'].'m' : '-' }}</td>
                                <td class="px-4 py-2 text-orange-600">{{ $day['early'] > 0 ? $day['early'].'m' : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif
</div>