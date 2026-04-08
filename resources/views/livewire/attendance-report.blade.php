<div class="p-6">
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">User ID</th>
                    <th class="px-6 py-3">Days Recorded</th>
                    <th class="px-6 py-3">Late (Minutes)</th>
                    <th class="px-6 py-3">Early Exit (Minutes)</th>
                    <th class="px-6 py-3 bg-red-100 text-red-700">Total Deduction</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $row)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-bold text-gray-900">{{ $row['user_id'] }}</td>
                        <td class="px-6 py-4">{{ $row['days_count'] }}</td>
                        <td class="px-6 py-4 text-orange-600">{{ $row['late_mins'] }}</td>
                        <td class="px-6 py-4 text-orange-600">{{ $row['early_mins'] }}</td>
                        <td class="px-6 py-4 font-bold text-red-600 bg-red-50">
                            -{{ $row['total_deduction'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>