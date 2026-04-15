<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeProfile extends Component
{
    use WithFileUploads;

    public $employee;

    public $activeTab = 'personal'; // personal, family, documents

    // Form fields
    public $dep_name;

    public $dep_relationship;

    public $dep_birthdate;

    public $doc_type;

    public $file;

    public function mount($id)
    {
        $this->employee = Employee::with(['attachments', 'dependents'])->findOrFail($id);
    }

    public function addDependent()
    {
        $this->validate([
            'dep_name' => 'required',
            'dep_relationship' => 'required',
        ]);

        $this->employee->dependents()->create([
            'name' => $this->dep_name,
            'relationship' => $this->dep_relationship,
            'birthdate' => $this->dep_birthdate,
        ]);

        $this->reset(['dep_name', 'dep_relationship', 'dep_birthdate']);
    }

    public function uploadDocument()
    {
        $this->validate([
            'doc_type' => 'required',
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        $path = $this->file->store('employee-docs', 'public');

        $this->employee->attachments()->create([
            'document_type' => $this->doc_type,
            'file_path' => $path,
        ]);

        $this->reset(['doc_type', 'file']);
    }

    public function render()
    {
        return view('livewire.employee-profile.index')->layout('layouts.app');
    }
}
