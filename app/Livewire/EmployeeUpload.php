<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Employee;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class EmployeeUpload extends Component
{
    use WithFileUploads;

    public $file;

    public function uploadData()
    {
        $this->validate(['file' => 'required|mimes:csv,xlsx,xls|max:10240']);

        try {
            $spreadsheet = IOFactory::load($this->file->getRealPath());
            $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            array_shift($rows); // Skip header row

            foreach ($rows as $row) {
                // If the employee code (Col N) is empty, skip the row
                if (empty($row['N'])) continue;

                Employee::create([
                    'date_for_employment' => $this->formatDate($row['A']),
                    'pagibig_date_from'   => $this->formatDate($row['B']),
                    'lastname'            => $row['C'] ?? null,
                    'firstname'           => $row['D'] ?? null,
                    'middlename'          => $row['E'] ?? null,
                    'address'             => $row['F'] ?? null,
                    'telephone_no'        => $row['G'] ?? null,
                    'birthday'            => $this->formatDate($row['H']),
                    'age'                 => is_numeric($row['I']) ? $row['I'] : null,
                    'sex'                 => $row['J'] ?? null,
                    'civil_status'        => $row['K'] ?? null,
                    'department_code'     => $row['L'] ?? null,
                    'department_desc'     => $row['M'] ?? null,
                    'employee_code'       => $row['N'],
                    'company_code'        => $row['O'] ?? null,
                    'sss'                 => $row['P'] ?? null,
                    'tin'                 => $row['Q'] ?? null,
                    'philhealth_no'       => $row['R'] ?? null,
                    'pagibig'             => $row['S'] ?? null,
                    'atm_no'              => $row['T'] ?? null,
                    'basic_salary'        => floatval(preg_replace('/[^-0-9.]/', '', $row['U'] ?? 0)),
                    'tax_code'            => $row['V'] ?? null,
                    'religion'            => $row['W'] ?? null,
                    'birthplace'          => $row['X'] ?? null,
                    'citizenship'         => $row['Y'] ?? null,
                    'position'            => $row['Z'] ?? null,
                    'employment_status'   => $row['AA'] ?? null,
                    'type_of_payment'     => $row['AB'] ?? null,
                    'active'              => true,
                    'location'            => $row['AD'] ?? null,
                    'nickname'            => $row['AE'] ?? null,
                    'bank_code'           => $row['AF'] ?? null,
                    'voting_location'     => $row['AG'] ?? null,
                    'talent'              => $row['AH'] ?? null,
                    'prefered_sex'        => $row['AI'] ?? null,
                    'fiesta_date'         => $this->formatDate($row['AJ']),
                ]);
            }

            session()->flash('message', 'Import Successful!');
            $this->reset('file');
        } catch (\Exception $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    private function formatDate($value)
    {
        if (empty($value)) return null;
        if (is_numeric($value)) {
            return ExcelDate::excelToDateTimeObject($value);
        }
        try {
            return Carbon::parse($value);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function render() { return view('livewire.employee-upload'); }
}