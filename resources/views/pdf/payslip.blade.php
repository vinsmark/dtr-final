<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4A7A28;
            padding-bottom: 10px;
        }

        .section-title {
            font-weight: bold;
            text-transform: uppercase;
            background: #F5EFE8;
            padding: 5px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #EEE;
        }

        .bold {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .total-row {
            background: #180C04;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2 style="margin:0;">NEW ASIA OIL INC.</h2>
        <p style="margin:5px 0;">Official Employee Payslip</p>
    </div>

    <table>
        <tr>
            <td><span class="bold">Employee:</span> {{ $payroll->employee->firstname }} {{ $payroll->employee->lastname
                }}</td>
            <td class="text-right"><span class="bold">Period:</span> {{ $payroll->period_start->format('M d') }} - {{
                $payroll->period_end->format('M d, Y') }}</td>
        </tr>
    </table>

    <div class="section-title">Earnings</div>
    <table>
        <tr>
            <td>Basic Salary (Semi-Monthly)</td>
            <td class="text-right">₱{{ number_format($payroll->basic_salary / 2, 2) }}</td>
        </tr>
        <tr>
            <td>Overtime Pay</td>
            <td class="text-right">₱{{ number_format($payroll->overtime_pay, 2) }}</td>
        </tr>
        <tr class="bold">
            <td>Gross Earnings</td>
            <td class="text-right">₱{{ number_format($payroll->gross_salary, 2) }}</td>
        </tr>
    </table>

    <div class="section-title">Deductions</div>
    <table>
        <tr>
            <td>Absences / Unpaid Leaves</td>
            <td class="text-right">-₱{{ number_format($payroll->leave_deductions, 2) }}</td>
        </tr>
        <tr>
            <td>Other Deductions</td>
            <td class="text-right">-₱{{ number_format($payroll->other_deductions, 2) }}</td>
        </tr>
    </table>

    <table style="margin-top: 30px;">
        <tr class="total-row">
            <td style="padding: 15px;">NET TAKE HOME PAY</td>
            <td class="text-right" style="padding: 15px;">₱{{ number_format($payroll->net_salary, 2) }}</td>
        </tr>
    </table>

    <div style="margin-top: 50px; font-style: italic; font-size: 10px; color: #888;">
        This is a computer-generated document. No signature is required. Generated on: {{ now()->format('Y-m-d H:i') }}
    </div>
</body>

</html>