<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Time Record</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #180C04;
            padding: 0;
        }

        .dtr-page {
            padding: 32px 40px;
            page-break-after: always;
            max-width: 800px;
            margin: 0 auto;
        }

        .dtr-page:last-child {
            page-break-after: avoid;
        }

        .dtr-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #D4C4A8;
            padding-bottom: 14px;
        }

        .dtr-header .org-name {
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: #A89070;
            margin-bottom: 4px;
        }

        .dtr-header .report-title {
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: #A89070;
            margin-bottom: 6px;
        }

        .dtr-header h1 {
            font-size: 18px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #180C04;
            margin-bottom: 4px;
        }

        .dtr-header .meta {
            font-size: 10px;
            color: #63594E;
            margin-top: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            margin-top: 12px;
        }

        thead tr {
            background: #F5EFE8;
        }

        th {
            border: 1px solid #D4C4A8;
            padding: 7px 8px;
            text-align: left;
            font-size: 9px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #63594E;
        }

        th.center {
            text-align: center;
        }

        th.danger {
            color: #8B1A1A;
        }

        td {
            border: 1px solid #D4C4A8;
            padding: 5px 8px;
        }

        td.center {
            text-align: center;
        }

        td.mono {
            font-family: monospace;
        }

        td.color-in {
            text-align: center;
            color: #2E5A12;
        }

        td.color-out {
            text-align: center;
            color: #8B1A1A;
        }

        td.color-red {
            text-align: center;
            color: #CC0000;
        }

        td.bold {
            text-align: center;
            font-weight: bold;
        }

        tr.weekend td {
            background: #FAF7F2;
        }

        tfoot tr {
            background: #F5EFE8;
            font-weight: bold;
        }

        tfoot td {
            padding: 7px 8px;
        }

        .summary-strip {
            display: flex;
            gap: 0;
            margin-top: 12px;
            border: 1px solid #D4C4A8;
            border-radius: 6px;
            overflow: hidden;
        }

        .summary-item {
            flex: 1;
            padding: 8px 12px;
            border-right: 1px solid #D4C4A8;
            text-align: center;
        }

        .summary-item:last-child {
            border-right: none;
        }

        .summary-item .s-label {
            font-size: 8px;
            font-weight: 900;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #A89070;
            display: block;
            margin-bottom: 3px;
        }

        .summary-item .s-value {
            font-size: 14px;
            font-weight: 900;
            color: #180C04;
        }

        .summary-item .s-value.danger {
            color: #8B1A1A;
        }

        .signature-row {
            margin-top: 48px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .sig-note {
            font-size: 9px;
            color: #A89070;
            max-width: 320px;
            line-height: 1.5;
        }

        .sig-block {
            text-align: center;
        }

        .sig-block .sig-line {
            height: 1px;
            width: 220px;
            background: #180C04;
            margin-bottom: 5px;
        }

        .sig-block .sig-label {
            font-size: 9px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #A89070;
        }

        .dtr-divider {
            border: none;
            border-top: 1px dashed #D4C4A8;
            margin: 40px 0;
        }

        @media print {
            body {
                padding: 0;
            }

            .dtr-page {
                padding: 20px 28px;
            }

            .dtr-divider {
                display: none;
            }
        }
    </style>
</head>

<body>

    @foreach($dtrData as $index => $employee)
    @php
    $totalDays = 0;
    $totalLate = 0;
    $totalUT = 0;
    $totalMins = 0;

    foreach ($employee['rows'] as $row) {
    if ($row['time_in'] && $row['time_out']) $totalDays++;
    $totalLate += $row['late'];
    $totalUT += $row['undertime'];
    $totalMins += $row['rendered'];
    }

    $totalHours = floor($totalMins / 60);
    $totalRemMins = $totalMins % 60;
    @endphp

    @if($index > 0)
    <hr class="dtr-divider">
    @endif

    <div class="dtr-page">

        <div class="dtr-header">
            <p class="report-title">Daily Time Record</p>
            <h1>{{ $employee['employee_name'] }}</h1>
            <p class="meta">Employee Code: <strong>{{ $employee['employee_code'] }}</strong></p>
            <p class="meta">
                {{ \Carbon\Carbon::parse($dateFrom)->format('F d, Y') }}
                &mdash;
                {{ \Carbon\Carbon::parse($dateTo)->format('F d, Y') }}
            </p>
        </div>

        <div class="summary-strip">
            <div class="summary-item">
                <span class="s-label">Days Present</span>
                <span class="s-value">{{ $totalDays }}</span>
            </div>
            <div class="summary-item">
                <span class="s-label">Total Late</span>
                <span class="s-value {{ $totalLate > 0 ? 'danger' : '' }}">
                    {{ $totalLate > 0 ? $totalLate . 'm' : '—' }}
                </span>
            </div>
            <div class="summary-item">
                <span class="s-label">Undertime</span>
                <span class="s-value {{ $totalUT > 0 ? 'danger' : '' }}">
                    {{ $totalUT > 0 ? $totalUT . 'm' : '—' }}
                </span>
            </div>
            <div class="summary-item">
                <span class="s-label">Hours Rendered</span>
                <span class="s-value">{{ $totalHours }}h {{ $totalRemMins }}m</span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th class="center">Time In</th>
                    <th class="center">Time Out</th>
                    <th class="center danger">Late (m)</th>
                    <th class="center danger">UT (m)</th>
                    <th class="center">Rendered</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee['rows'] as $row)
                @php
                $isWeekend = in_array(\Carbon\Carbon::parse($row['date'])->dayOfWeek, [0, 6]);
                @endphp
                <tr class="{{ $isWeekend ? 'weekend' : '' }}">
                    <td class="mono">{{ \Carbon\Carbon::parse($row['date'])->format('M d, Y') }}</td>
                    <td>{{ $row['day'] }}</td>
                    <td class="color-in">{{ $row['time_in'] ?? '—' }}</td>
                    <td class="color-out">{{ $row['time_out'] ?? '—' }}</td>
                    <td class="color-red">{{ $row['late'] > 0 ? $row['late'] : '' }}</td>
                    <td class="color-red">{{ $row['undertime'] > 0 ? $row['undertime'] : '' }}</td>
                    <td class="bold">
                        @if($row['rendered'] > 0)
                        {{ floor($row['rendered'] / 60) }}h {{ $row['rendered'] % 60 }}m
                        @else
                        —
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">TOTALS</td>
                    <td colspan="2" class="center">Days present: {{ $totalDays }}</td>
                    <td class="center color-red">{{ $totalLate }}m</td>
                    <td class="center color-red">{{ $totalUT }}m</td>
                    <td class="center">{{ $totalHours }}h {{ $totalRemMins }}m</td>
                </tr>
            </tfoot>
        </table>

        <div class="signature-row">
            <p class="sig-note">
                I hereby certify that the entries above are true and correct records of my attendance.
            </p>
            <div class="sig-block">
                <div class="sig-line"></div>
                <p class="sig-label">Signature over Printed Name</p>
            </div>
        </div>

    </div>
    @endforeach

</body>

</html>