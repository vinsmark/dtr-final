<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

    {{-- ===== FILTER FORM (hidden on print) ===== --}}
    <div class="rounded-xl border border-[#D4C4A8] bg-white p-6 no-print">
        <p class="mb-4 text-[10px] font-black uppercase tracking-widest text-[#180C04]">
            <i class="fa-solid fa-calendar-days mr-2 text-[#4A7A28]"></i> Generate DTR
        </p>

        <form wire:submit.prevent="generate" class="flex flex-wrap items-end gap-4">

            {{-- Date From --}}
            <div class="flex flex-col gap-1">
                <label class="text-[9px] font-black uppercase tracking-widest text-[#A89070]">Date From</label>
                <input type="date" wire:model="dateFrom"
                    class="h-9 rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs outline-none focus:border-[#4A7A28]" />
                @error('dateFrom')
                <span class="text-[9px] font-bold text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Date To --}}
            <div class="flex flex-col gap-1">
                <label class="text-[9px] font-black uppercase tracking-widest text-[#A89070]">Date To</label>
                <input type="date" wire:model="dateTo"
                    class="h-9 rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs outline-none focus:border-[#4A7A28]" />
                @error('dateTo')
                <span class="text-[9px] font-bold text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Employee Dropdown --}}
            <div class="flex flex-col gap-1">
                <label class="text-[9px] font-black uppercase tracking-widest text-[#A89070]">Employee</label>
                <select wire:model="employeeCode"
                    class="h-9 min-w-[220px] rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs outline-none focus:border-[#4A7A28]">
                    <option value="">— All Employees —</option>
                    @foreach($employeeList as $emp)
                    <option value="{{ $emp->employee_code }}">
                        {{ trim($emp->lastname . ', ' . $emp->firstname . ' ' . $emp->middlename) }}
                        ({{ $emp->employee_code }})
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Buttons --}}
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

    {{-- ===== SUMMARY (screen only, hidden on print) ===== --}}
    @if($generated)
    @if(count($dtrData) > 0)
    <div class="no-print rounded-xl border border-[#D4C4A8] bg-[#EEF5E4] px-5 py-3">
        <p class="text-xs font-bold text-[#2E5A12]">
            <i class="fa-solid fa-circle-check mr-2"></i>
            {{ count($dtrData) }} employee(s) found &mdash;
            {{ \Carbon\Carbon::parse($dateFrom)->format('M d, Y') }}
            to
            {{ \Carbon\Carbon::parse($dateTo)->format('M d, Y') }}.
            Click <strong>Print</strong> to print all DTRs.
        </p>

        {{-- Employee list chips --}}
        <div class="mt-2 flex flex-wrap gap-2">
            @foreach($dtrData as $emp)
            <span class="rounded-full border border-[#4A7A28] bg-white px-3 py-1 text-[10px] font-bold text-[#2E5A12]">
                {{ $emp['employee_name'] }} <span class="text-[#A89070]">({{ $emp['employee_code'] }})</span>
            </span>
            @endforeach
        </div>
    </div>
    @else
    <div class="no-print rounded-xl border border-[#D4C4A8] bg-white p-12 text-center">
        <i class="fa-solid fa-inbox text-4xl text-[#D4C4A8]"></i>
        <p class="mt-3 text-xs font-bold text-[#A89070]">No attendance records found for the selected range.</p>
    </div>
    @endif
    @endif

    {{-- ===== DTR PAGES (print only) ===== --}}
    @if($generated && count($dtrData) > 0)
    <div class="print-only">
        @foreach($dtrData as $employee)
        <div class="dtr-page">

            {{-- Header --}}
            <div style="text-align:center; margin-bottom: 18px;">
                <p
                    style="font-size:9px; font-weight:900; letter-spacing:0.3em; text-transform:uppercase; color:#A89070; margin:0;">
                    Daily Time Record
                </p>
                <h2
                    style="font-size:16px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#180C04; margin:4px 0;">
                    {{ $employee['employee_name'] }}
                </h2>
                <p style="font-size:10px; color:#63594E; margin:0;">
                    Employee Code: {{ $employee['employee_code'] }}
                </p>
                <p style="font-size:10px; color:#63594E; margin:2px 0 0;">
                    {{ \Carbon\Carbon::parse($dateFrom)->format('F d, Y') }}
                    &mdash;
                    {{ \Carbon\Carbon::parse($dateTo)->format('F d, Y') }}
                </p>
            </div>

            {{-- Table --}}
            <table style="width:100%; border-collapse:collapse; font-size:11px;">
                <thead>
                    <tr style="background:#F5EFE8;">
                        <th
                            style="border:1px solid #D4C4A8; padding:6px 10px; text-align:left; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#A89070;">
                            Date</th>
                        <th
                            style="border:1px solid #D4C4A8; padding:6px 10px; text-align:left; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#A89070;">
                            Day</th>
                        <th
                            style="border:1px solid #D4C4A8; padding:6px 10px; text-align:center; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#A89070;">
                            Time In</th>
                        <th
                            style="border:1px solid #D4C4A8; padding:6px 10px; text-align:center; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#A89070;">
                            Time Out</th>
                        <th
                            style="border:1px solid #D4C4A8; padding:6px 10px; text-align:center; font-size:9px; font-weight:900; text-transform:uppercase; letter-spacing:0.1em; color:#A89070;">
                            All Logs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee['rows'] as $row)
                    @php
                    $isWeekend = in_array(\Carbon\Carbon::parse($row['date'])->dayOfWeek, [0, 6]);
                    @endphp
                    <tr style="background: {{ $isWeekend ? '#FAF7F2' : 'white' }};">
                        <td style="border:1px solid #D4C4A8; padding:5px 10px; font-family:monospace; color:#180C04;">
                            {{ \Carbon\Carbon::parse($row['date'])->format('M d, Y') }}
                        </td>
                        <td
                            style="border:1px solid #D4C4A8; padding:5px 10px; color: {{ $isWeekend ? '#A89070' : '#63594E' }}; font-weight: {{ $isWeekend ? '700' : '400' }};">
                            {{ $row['day'] }}
                        </td>
                        <td
                            style="border:1px solid #D4C4A8; padding:5px 10px; text-align:center; font-family:monospace; color:#2E5A12;">
                            {{ $row['time_in'] ?? '—' }}
                        </td>
                        <td
                            style="border:1px solid #D4C4A8; padding:5px 10px; text-align:center; font-family:monospace; color:#8B1A1A;">
                            {{ $row['time_out'] ?? '—' }}
                        </td>
                        <td
                            style="border:1px solid #D4C4A8; padding:5px 10px; text-align:center; font-family:monospace; color:#63594E; font-size:10px;">
                            {{ implode(', ', $row['all_times']) ?: '—' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Signature --}}
            <div style="margin-top:40px; display:flex; justify-content:flex-end;">
                <div style="text-align:center;">
                    <div style="height:1px; width:200px; background:#180C04; margin-bottom:4px;"></div>
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

</div>

{{-- Print Styles --}}
<style>
    .print-only {
        display: none;
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

        .dtr-page:last-child {
            page-break-after: avoid;
        }

        body,
        html {
            background: white !important;
        }
    }
</style>