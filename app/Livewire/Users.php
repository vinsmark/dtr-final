<?php

namespace App\Livewire;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $showModal = false;

    public $showDeleteModal = false;

    public $editingUserId = null;

    public $deletingUserId = null;

    public $search = '';

    public $first_name;

    public $middle_name;

    public $last_name;

    public $email;

    public $role = 'user';

    public $password;

    public $password_confirmation;

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$this->editingUserId,
            'role' => ['required', new Enum(UserRole::class)],
            'password' => $this->editingUserId ? 'nullable|confirmed|min:8' : 'required|confirmed|min:8',
        ];
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->resetFields();
        $this->editingUserId = null;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->editingUserId = $id;
        $user = User::findOrFail($id);

        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = '';

        $this->showModal = true;
    }

    public function confirmDelete($id)
    {
        $this->deletingUserId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->deletingUserId) {
            User::destroy($this->deletingUserId);
            $this->showDeleteModal = false;
            $this->deletingUserId = null;
            session()->flash('message', 'User account deleted.');
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

        $data = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role instanceof UserRole ? $this->role->value : $this->role,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->editingUserId) {
            User::find($this->editingUserId)->update($data);
            session()->flash('message', 'User updated successfully!');
        } else {
            User::create($data);
            session()->flash('message', 'User created successfully!');
        }

        $this->closeModal();
    }

    private function resetFields()
    {
        $this->reset(['first_name', 'middle_name', 'last_name', 'email', 'role', 'password', 'password_confirmation']);
        $this->role = 'user';
    }

    public function render()
    {
        return view('livewire.users.index', [
            'users' => User::where('first_name', 'like', '%'.$this->search.'%')
                ->orWhere('last_name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->latest()
                ->paginate(10),
        ]);
    }
}
