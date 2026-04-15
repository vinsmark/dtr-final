<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

    <x-modal name="showDeleteModal" title="Confirm Deletion" maxWidth="md">
        <div class="p-4 text-center">
            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                <i class="fa-solid fa-trash-can text-red-600"></i>
            </div>
            <h3 class="mb-2 text-lg font-bold text-[#180C04]">Delete Employee Record?</h3>
            <p class="text-xs text-[#A89070]">This action is permanent and cannot be undone. Are you sure you want to
                proceed?</p>
        </div>

        <x-slot:footer>
            <button type="button" wire:click="$set('showDeleteModal', false)"
                class="px-5 py-2 text-[10px] font-black uppercase tracking-widest text-[#A89070] hover:text-[#180C04]">
                Cancel
            </button>
            <button type="button" wire:click="delete"
                class="rounded-lg bg-red-600 px-8 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-md hover:bg-red-700 transition-all">
                Confirm Delete
            </button>
        </x-slot:footer>
    </x-modal>

    <x-modal name="showModal" :title="$editingEmployeeId ? 'Update Employee Profile' : 'Employee Registration'"
        subtitle="Manage comprehensive employee records and statutory data" maxWidth="5xl">

        <form id="employeeForm" wire:submit.prevent="save">
            <div class="mb-10">
                <h4
                    class="mb-6 border-b border-[#F5EFE8] pb-2 text-[10px] font-black uppercase tracking-[0.2em] text-[#4A7A28]">
                    Personal Identity
                </h4>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                    <x-form-input label="First Name" wire:model="firstname" placeholder="Enter first name" />
                    <x-form-input label="Middle Name" wire:model="middlename" placeholder="Enter middle name" />
                    <x-form-input label="Last Name" wire:model="lastname" placeholder="Enter last name" />
                    <x-form-input label="Nickname" wire:model="nickname" />
                    <x-form-input label="Birthday" type="date" wire:model="birthday" />
                    <x-form-input label="Age" type="number" wire:model="age" />
                    <x-form-input label="Birthplace" wire:model="birthplace" />
                    <x-form-select label="Sex" wire:model="sex">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </x-form-select>
                    <x-form-input label="Civil Status" wire:model="civil_status" />
                    <x-form-input label="Citizenship" wire:model="citizenship" />
                    <x-form-input label="Religion" wire:model="religion" />
                    <x-form-input label="Telephone No." wire:model="telephone_no" />
                </div>
                <div class="mt-5">
                    <x-form-textarea label="Full Address" wire:model="address" rows="2" />
                </div>
            </div>

            <div class="mb-10">
                <h4
                    class="mb-6 border-b border-[#F5EFE8] pb-2 text-[10px] font-black uppercase tracking-[0.2em] text-[#4A7A28]">
                    Employment Details
                </h4>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-4">
                    <x-form-input label="Employee Code" wire:model="employee_code" placeholder="EMP-000" />
                    <x-form-input label="Company Code" wire:model="company_code" />
                    <x-form-input label="Position" wire:model="position" />
                    <x-form-input label="Hired Date" type="date" wire:model="date_for_employment" />
                    <x-form-input label="Employment Status" wire:model="employment_status" />
                    <x-form-input label="Dept Code" wire:model="department_code" />
                    <x-form-input label="Dept Description" wire:model="department_desc" />
                    <x-form-input label="Location" wire:model="location" />
                    <x-form-input label="Type of Payment" wire:model="type_of_payment" />
                    <x-form-input label="Bank Code" wire:model="bank_code" />

                    <div class="flex items-center pt-8">
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" wire:model="active" class="sr-only peer">
                            <div
                                class="peer h-5 w-9 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-[#4A7A28] peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none">
                            </div>
                            <span class="ml-3 text-[10px] font-black uppercase text-[#180C04]">Active Status</span>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <h4
                    class="mb-6 border-b border-[#F5EFE8] pb-2 text-[10px] font-black uppercase tracking-[0.2em] text-[#4A7A28]">
                    Statutory & Misc Information
                </h4>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-4">
                    <x-form-input label="Basic Salary" type="number" step="0.01" wire:model="basic_salary"
                        icon="fa-solid fa-coins" />
                    <x-form-input label="SSS No." wire:model="sss" />
                    <x-form-input label="TIN No." wire:model="tin" />
                    <x-form-input label="PhilHealth" wire:model="philhealth_no" />
                    <x-form-input label="Pag-Ibig No." wire:model="pagibig" />
                    <x-form-input label="Pag-Ibig From" type="date" wire:model="pagibig_date_from" />
                    <x-form-input label="ATM Account" wire:model="atm_no" />
                    <x-form-input label="Tax Code" wire:model="tax_code" />
                    <x-form-input label="Voting Location" wire:model="voting_location" />
                    <x-form-input label="Talent" wire:model="talent" />
                    <x-form-input label="Fiesta Date" type="date" wire:model="fiesta_date" />
                    <x-form-input label="Preferred Sex" wire:model="prefered_sex" />
                </div>
            </div>
        </form>

        <x-slot:footer>
            <button type="button" wire:click="closeModal"
                class="px-5 py-2 text-[10px] font-black uppercase tracking-widest text-[#A89070] hover:text-red-600 transition-colors">
                Discard
            </button>
            <button type="submit" form="employeeForm"
                class="rounded-lg bg-[#180C04] px-8 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-md hover:bg-black transition-all">
                {{ $editingEmployeeId ? 'Update Employee' : 'Confirm Registration' }}
            </button>
        </x-slot:footer>
    </x-modal>

    <x-table.container title="Employee Directory" :count="$employees->count()" :total="$employees->total()">
        <x-slot:actions>
            <div class="relative w-full sm:w-48">
                <i
                    class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-[#A89070]"></i>
                <input wire:model.live="search" type="text" placeholder="Search..."
                    class="h-8 w-full rounded-lg border border-[#D4C4A8] bg-white pl-9 pr-3 text-xs outline-none focus:border-[#4A7A28]" />
            </div>
            <button wire:click="openModal"
                class="h-8 w-full rounded-lg bg-[#4A7A28] px-3 text-xs font-semibold text-white sm:w-auto">
                <i class="fa-solid fa-plus text-[10px]"></i> Add Employee
            </button>
        </x-slot:actions>

        <x-table.thead>
            <x-table.th class="w-[35%]">Employee</x-table.th>
            <x-table.th class="w-[15%]">Employee ID</x-table.th>
            <x-table.th class="w-[25%]">Department</x-table.th>
            <x-table.th class="w-[15%]">Status</x-table.th>
            <x-table.th class="w-[10%] text-right">Actions</x-table.th>
        </x-table.thead>

        <tbody class="divide-y divide-[#EDE5D8]">
            @foreach($employees as $employee)
            <x-table.tr class="transition-colors hover:bg-[#FAF7F2]/50">
                <x-table.td>
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#EEF5E4] text-[10px] font-bold text-[#2E5A12]">
                            {{ strtoupper(substr($employee->firstname, 0, 1) . substr($employee->lastname, 0, 1)) }}
                        </div>
                        <div class="truncate">
                            <p class="truncate font-semibold text-[#180C04]">{{ $employee->firstname }} {{
                                $employee->lastname }}</p>
                            <p class="truncate text-[10px] text-[#A89070]">{{ $employee->position ?? 'No Position' }}
                            </p>
                        </div>
                    </div>
                </x-table.td>
                <x-table.td class="whitespace-nowrap font-medium text-[#4A7A28]">{{ $employee->employee_code }}
                </x-table.td>
                <x-table.td class="whitespace-nowrap text-[#63594E]">{{ $employee->department_desc }}</x-table.td>
                <x-table.td>
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full {{ $employee->active ? 'bg-[#EEF5E4] text-[#2E5A12]' : 'bg-gray-100 text-gray-500' }} px-2.5 py-1 text-[10px] font-bold">
                        <span
                            class="h-1.5 w-1.5 rounded-full {{ $employee->active ? 'bg-[#4A7A28]' : 'bg-gray-400' }}"></span>
                        {{ $employee->active ? 'Active' : 'Inactive' }}
                    </span>
                </x-table.td>
                <x-table.td class="text-right">
                    <div class="flex justify-end gap-3 items-center">
                        <a href="{{ route('employee.profile', $employee->id) }}" wire:navigate
                            class="text-[11px] font-black uppercase tracking-wider text-[#180C04] bg-[#F5EFE8] px-2 py-1 rounded hover:bg-[#D4C4A8] transition-all">
                            201 FILE
                        </a>

                        <button wire:click="edit({{ $employee->id }})"
                            class="text-[11px] font-black uppercase tracking-wider text-[#4A7A28] hover:underline">
                            Edit
                        </button>

                        <button wire:click="confirmDelete({{ $employee->id }})"
                            class="text-[11px] font-black uppercase tracking-wider text-red-500 hover:underline">
                            Delete
                        </button>
                    </div>
                </x-table.td>
            </x-table.tr>
            @endforeach
        </tbody>

        <x-slot:footer>
            {{ $employees->links() }}
        </x-slot:footer>
    </x-table.container>
</div>