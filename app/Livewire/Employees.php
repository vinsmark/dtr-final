<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;

    public $showModal = false;

    public $showDeleteModal = false;

    public $editingEmployeeId = null;

    public $deletingEmployeeId = null;

    public $search = '';

    public $date_for_employment;

    public $pagibig_date_from;

    public $lastname;

    public $firstname;

    public $middlename;

    public $address;

    public $telephone_no;

    public $birthday;

    public $age;

    public $sex;

    public $civil_status;

    public $department_code;

    public $department_desc;

    public $employee_code;

    public $company_code;

    public $sss;

    public $tin;

    public $philhealth_no;

    public $pagibig;

    public $atm_no;

    public $basic_salary;

    public $tax_code;

    public $religion;

    public $birthplace;

    public $citizenship;

    public $position;

    public $employment_status;

    public $type_of_payment;

    public $active = true;

    public $location;

    public $nickname;

    public $bank_code;

    public $voting_location;

    public $talent;

    public $prefered_sex;

    public $fiesta_date;

    protected function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'employee_code' => 'required|unique:employees,employee_code,'.$this->editingEmployeeId,
        ];
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->resetFields();
        $this->editingEmployeeId = null;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->editingEmployeeId = $id;
        $employee = Employee::findOrFail($id);

        $this->fill($employee->toArray());
        $this->showModal = true;
    }

    public function confirmDelete($id)
    {
        $this->deletingEmployeeId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->deletingEmployeeId) {
            Employee::destroy($this->deletingEmployeeId);
            $this->showDeleteModal = false;
            $this->deletingEmployeeId = null;
            session()->flash('message', 'Employee record removed successfully.');
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDeleteModal = false;
        $this->resetFields();
    }

    public function save()
    {
        $this->validate();

        $data = $this->only([
            'date_for_employment',
            'pagibig_date_from',
            'lastname',
            'firstname',
            'middlename',
            'address',
            'telephone_no',
            'birthday',
            'age',
            'sex',
            'civil_status',
            'department_code',
            'department_desc',
            'employee_code',
            'company_code',
            'sss',
            'tin',
            'philhealth_no',
            'pagibig',
            'atm_no',
            'basic_salary',
            'tax_code',
            'religion',
            'birthplace',
            'citizenship',
            'position',
            'employment_status',
            'type_of_payment',
            'active',
            'location',
            'nickname',
            'bank_code',
            'voting_location',
            'talent',
            'prefered_sex',
            'fiesta_date',
        ]);

        if ($this->editingEmployeeId) {
            Employee::find($this->editingEmployeeId)->update($data);
            session()->flash('message', 'Employee updated successfully!');
        } else {
            Employee::create($data);
            session()->flash('message', 'Employee registered successfully!');
        }

        $this->closeModal();
    }

    private function resetFields()
    {
        $this->resetExcept(['search']);
        $this->active = true;
    }

    public function render()
    {
        return view('livewire.employees.index', [
            'employees' => Employee::where('firstname', 'like', '%'.$this->search.'%')
                ->orWhere('lastname', 'like', '%'.$this->search.'%')
                ->orWhere('employee_code', 'like', '%'.$this->search.'%')
                ->latest()
                ->paginate(10),
        ]);
    }
}
