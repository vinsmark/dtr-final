<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

    <div class="rounded-xl border border-[#D4C4A8] bg-white p-6 no-print">
        <p class="mb-4 text-[10px] font-black uppercase tracking-widest text-[#180C04]">
            <i class="fa-solid fa-calendar-days mr-2 text-[#4A7A28]"></i> Generate DTR
        </p>

        <form wire:submit.prevent="generate" class="flex flex-wrap items-end gap-4">
            <div class="flex flex-col gap-1">
                <label class="text-[9px] font-black uppercase tracking-widest text-[#A89070]">Date From</label>
                <input type="date" wire:model="dateFrom"
                    class="h-9 rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs outline-none focus:border-[#4A7A28]" />
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-[9px] font-black uppercase tracking-widest text-[#A89070]">Date To</label>
                <input type="date" wire:model="dateTo"
                    class="h-9 rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs outline-none focus:border-[#4A7A28]" />
            </div>

            <div class="flex flex-col gap-1">
                <label class="text-[9px] font-black uppercase tracking-widest text-[#A89070]">Employee</label>
                <select wire:model="employeeCode"
                    class="h-9 min-w-[220px] rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs outline-none focus:border-[#4A7A28]">
                    <option value="">— All Employees —</option>
                    @foreach($employeeList as $emp)
                    <option value="{{ $emp->employee_code }}">
                        {{ trim($emp->lastname . ', ' . $emp->firstname) }} ({{ $emp->employee_code }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="h-9 rounded-lg bg-[#180C04] px-6 text-[10px] font-black uppercase tracking-widest text-white shadow-md transition-all hover:bg-black"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="generate">
                        <i class="fa-solid fa-bolt mr-1"></i> Generate
                    </span>
                    <span wire:loading wire:target="generate">
                        <i class="fa-solid fa-spinner fa-spin mr-1"></i> Generating...
                    </span>
                </button>

                @if($generated && count($dtrData) > 0)
                <button type="button" onclick="window.print()"
                    class="h-9 rounded-lg bg-[#4A7A28] px-6 text-[10px] font-black uppercase tracking-widest text-white shadow-md transition-all hover:bg-[#3a6020]">
                    <i class="fa-solid fa-print mr-1"></i> Print
                </button>
                @endif
            </div>
        </form>
    </div>

    @if($generated && count($dtrData) > 0)
    <div class="rounded-xl border border-[#D4C4A8] bg-white p-6 no-print">

        <div class="mb-4 flex items-center justify-between">
            <p class="text-[10px] font-black uppercase tracking-widest text-[#180C04]">
                <i class="fa-solid fa-table mr-2 text-[#4A7A28]"></i>
                Generated Results
                <span class="ml-2 font-normal normal-case text-[#A89070]">
                    {{ \Carbon\Carbon::parse($dateFrom)->format('M d, Y') }}
                    &mdash;
                    {{ \Carbon\Carbon::parse($dateTo)->format('M d, Y') }}
                    &middot; {{ count($dtrData) }} employee(s)
                </span>
            </p>

            <a href="{{ route('dtr.download-all', ['from' => $dateFrom, 'to' => $dateTo]) }}" target="_blank"
                class="flex h-9 items-center gap-2 rounded-lg bg-[#180C04] px-5 text-[10px] font-black uppercase tracking-widest text-white shadow-md transition-all hover:bg-black">
                <i class="fa-solid fa-download"></i> Download All
            </a>
        </div>

        <table class="w-full border-collapse text-xs">
            <thead>
                <tr class="bg-[#F5EFE8]">
                    <th
                        class="border border-[#D4C4A8] p-2 text-left text-[9px] font-black uppercase tracking-wider text-[#63594E]">
                        Employee</th>
                    <th
                        class="border border-[#D4C4A8] p-2 text-left text-[9px] font-black uppercase tracking-wider text-[#63594E]">
                        Code</th>
                    <th
                        class="border border-[#D4C4A8] p-2 text-center text-[9px] font-black uppercase tracking-wider text-[#63594E]">
                        Days Present</th>
                    <th
                        class="border border-[#D4C4A8] p-2 text-center text-[9px] font-black uppercase tracking-wider text-[#8B1A1A]">
                        Late (m)</th>
                    <th
                        class="border border-[#D4C4A8] p-2 text-center text-[9px] font-black uppercase tracking-wider text-[#8B1A1A]">
                        UT (m)</th>
                    <th
                        class="border border-[#D4C4A8] p-2 text-center text-[9px] font-black uppercase tracking-wider text-[#63594E]">
                        Hours Rendered</th>
                    <th
                        class="border border-[#D4C4A8] p-2 text-center text-[9px] font-black uppercase tracking-wider text-[#63594E]">
                        DTR</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dtrData as $employee)
                @php
                $days = collect($employee['rows'])->filter(fn($r) => $r['time_in'] && $r['time_out'])->count();
                $totalLate = collect($employee['rows'])->sum('late');
                $totalUT = collect($employee['rows'])->sum('undertime');
                $totalMins = collect($employee['rows'])->sum('rendered');
                $hrs = floor($totalMins / 60);
                $mins = $totalMins % 60;
                @endphp
                <tr class="transition-colors hover:bg-[#FAF7F2]">
                    <td class="border border-[#D4C4A8] p-2 font-medium text-[#180C04]">
                        {{ $employee['employee_name'] }}
                    </td>
                    <td class="border border-[#D4C4A8] p-2 font-mono text-[10px] text-[#63594E]">
                        {{ $employee['employee_code'] }}
                    </td>
                    <td class="border border-[#D4C4A8] p-2 text-center font-medium">
                        {{ $days }}
                    </td>
                    <td class="border border-[#D4C4A8] p-2 text-center">
                        @if($totalLate > 0)
                        <span class="rounded bg-red-50 px-2 py-0.5 text-[10px] font-bold text-red-700">
                            {{ $totalLate }}m
                        </span>
                        @else
                        <span class="text-[#A89070]">—</span>
                        @endif
                    </td>
                    <td class="border border-[#D4C4A8] p-2 text-center">
                        @if($totalUT > 0)
                        <span class="rounded bg-red-50 px-2 py-0.5 text-[10px] font-bold text-red-700">
                            {{ $totalUT }}m
                        </span>
                        @else
                        <span class="text-[#A89070]">—</span>
                        @endif
                    </td>
                    <td class="border border-[#D4C4A8] p-2 text-center font-medium text-[#180C04]">
                        {{ $hrs }}h {{ $mins }}m
                    </td>
                    <td class="border border-[#D4C4A8] p-2 text-center">
                        <a href="{{ route('dtr.download', ['code' => $employee['employee_code'], 'from' => $dateFrom, 'to' => $dateTo]) }}"
                            target="_blank"
                            class="inline-flex items-center gap-1 rounded-lg bg-[#4A7A28] px-3 py-1.5 text-[9px] font-black uppercase tracking-widest text-white transition-all hover:bg-[#3a6020]">
                            <i class="fa-solid fa-download text-[8px]"></i> Download
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if($generated && count($dtrData) > 0)
    <div class="print-only">
        @foreach($dtrData as $employee)
        <div class="dtr-page">
            <div style="text-align:center; margin-bottom: 18px; padding: 0 10px;">
                <p
                    style="font-size:9px; font-weight:900; letter-spacing:0.3em; text-transform:uppercase; color:#A89070; margin:0;">
                    Daily Time Record
                </p>
                <h2
                    style="font-size:16px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#180C04; margin:4px 0; line-height: 1.2;">
                    {{ $employee['employee_name'] }}
                </h2>
                <p style="font-size:10px; color:#63594E; margin:0;">
                    Employee Code: {{ $employee['employee_code'] }}
                </p>
                <p style="font-size:10px; color:#63594E; margin:2px 0 0;">
                    {{ \Carbon\Carbon::parse($dateFrom)->format('F d, Y') }} — {{
                    \Carbon\Carbon::parse($dateTo)->format('F
                    d, Y') }}
                </p>
            </div>

            <div style="width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; margin-bottom: 20px;">
                <table style="width:100%; min-width: 600px; border-collapse:collapse; font-size:10px;">
                    <thead>
                        <tr style="background:#F5EFE8;">
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:left;">Date</th>
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:left;">Day</th>
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:center;">In</th>
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:center;">Out</th>
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:center; color:#8B1A1A;">Late(m)
                            </th>
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:center; color:#8B1A1A;">UT(m)
                            </th>
                            <th style="border:1px solid #D4C4A8; padding:6px; text-align:center;">Rendered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalDays = 0; $totalLate = 0; $totalUT = 0; @endphp
                        @foreach($employee['rows'] as $row)
                        @php
                        $isWeekend = in_array(\Carbon\Carbon::parse($row['date'])->dayOfWeek, [0, 6]);
                        if ($row['time_in'] && $row['time_out']) $totalDays++;
                        $totalLate += $row['late'];
                        $totalUT += $row['undertime'];
                        @endphp
                        <tr style="background: {{ $isWeekend ? '#FAF7F2' : 'white' }};">
                            <td
                                style="border:1px solid #D4C4A8; padding:4px 8px; font-family:monospace; white-space: nowrap;">
                                {{ \Carbon\Carbon::parse($row['date'])->format('M d, Y') }}
                            </td>
                            <td style="border:1px solid #D4C4A8; padding:4px 8px;">{{ $row['day'] }}</td>
                            <td style="border:1px solid #D4C4A8; padding:4px; text-align:center; color:#2E5A12;">{{
                                $row['time_in'] ?? '—' }}</td>
                            <td style="border:1px solid #D4C4A8; padding:4px; text-align:center; color:#8B1A1A;">{{
                                $row['time_out'] ?? '—' }}</td>
                            <td style="border:1px solid #D4C4A8; padding:4px; text-align:center; color:red;">{{
                                $row['late']
                                > 0 ? $row['late'] : '' }}</td>
                            <td style="border:1px solid #D4C4A8; padding:4px; text-align:center; color:red;">{{
                                $row['undertime'] > 0 ? $row['undertime'] : '' }}</td>
                            <td
                                style="border:1px solid #D4C4A8; padding:4px; text-align:center; font-weight:bold; white-space: nowrap;">
                                {{ $row['rendered'] > 0 ? floor($row['rendered'] / 60).'h '.($row['rendered'] % 60).'m'
                                :
                                '—' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="background:#F5EFE8; font-weight:bold;">
                            <td colspan="2" style="border:1px solid #D4C4A8; padding:6px;">TOTALS</td>
                            <td colspan="2" style="border:1px solid #D4C4A8; padding:6px; text-align:center;">Days: {{
                                $totalDays }}</td>
                            <td style="border:1px solid #D4C4A8; padding:6px; text-align:center; color:red;">{{
                                $totalLate
                                }}m</td>
                            <td style="border:1px solid #D4C4A8; padding:6px; text-align:center; color:red;">{{ $totalUT
                                }}m
                            </td>
                            <td style="border:1px solid #D4C4A8; padding:6px;"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div style="margin-top:30px; display:flex; justify-content:flex-end; padding-right: 10px;">
                <div style="text-align:center; width: 100%; max-width: 220px;">
                    <div style="height:1px; width:100%; background:#180C04; margin-bottom:4px;"></div>
                    <p
                        style="font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.2em; color:#A89070; margin:0;">
                        Signature over Printed Name
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <style>

    </style>
</div>

<style>
    @media (max-width: 640px) {
        .dtr-page {
            padding: 15px !important;
        }

        .print-only {
            width: 100%;
            overflow-x: hidden;
        }
    }

    @media print {
        .no-print {
            display: none !important;
        }

        .print-only {
            display: block !important;
        }

        .dtr-page {
            padding: 24px;
            page-break-after: always;
        }

        body,
        html {
            background: white !important;
        }
    }
</style>