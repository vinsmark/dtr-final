<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

    <x-modal name="showDeleteModal" title="Delete User" maxWidth="md">
        <div class="p-4 text-center">
            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                <i class="fa-solid fa-user-slash text-red-600"></i>
            </div>
            <h3 class="mb-2 text-lg font-bold text-[#180C04]">Remove User Access?</h3>
            <p class="text-xs text-[#A89070]">This will permanently revoke access for this user. Are you sure?</p>
        </div>
        <x-slot:footer>
            <button type="button" wire:click="$set('showDeleteModal', false)"
                class="px-5 py-2 text-[10px] font-black uppercase tracking-widest text-[#A89070]">Cancel</button>
            <button type="button" wire:click="delete"
                class="rounded-lg bg-red-600 px-8 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-md hover:bg-red-700 transition-all">Confirm
                Delete</button>
        </x-slot:footer>
    </x-modal>

    <x-modal name="showModal" :title="$editingUserId ? 'Edit System User' : 'Register New User'" maxWidth="2xl">
        <form id="userForm" wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                <x-form-input label="First Name" wire:model="first_name" />
                <x-form-input label="Last Name" wire:model="last_name" />
                <x-form-input label="Middle Name" wire:model="middle_name" />
                <x-form-select label="System Role" wire:model="role">
                    <option value="user">User / Employee</option>
                    <option value="manager">Manager</option>
                    <option value="hr">HR Personnel</option>
                    <option value="admin">System Admin</option>
                </x-form-select>
                <div class="md:col-span-2">
                    <x-form-input label="Email Address" type="email" wire:model="email"
                        placeholder="email@company.com" />
                </div>
                <x-form-input label="Password" type="password" wire:model="password"
                    placeholder="{{ $editingUserId ? 'Leave blank to keep current' : 'Enter password' }}" />
                <x-form-input label="Confirm Password" type="password" wire:model="password_confirmation" />
            </div>
        </form>
        <x-slot:footer>
            <button type="button" wire:click="closeModal"
                class="px-5 py-2 text-[10px] font-black uppercase tracking-widest text-[#A89070]">Discard</button>
            <button type="submit" form="userForm"
                class="rounded-lg bg-[#180C04] px-8 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-md hover:bg-black transition-all">
                {{ $editingUserId ? 'Update User' : 'Create User' }}
            </button>
        </x-slot:footer>
    </x-modal>

    <x-table.container title="System Users" :count="$users->count()" :total="$users->total()">
        <x-slot:actions>
            <div class="relative w-full sm:w-48">
                <i
                    class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-[#A89070]"></i>
                <input wire:model.live="search" type="text" placeholder="Search users..."
                    class="h-8 w-full rounded-lg border border-[#D4C4A8] bg-white pl-9 pr-3 text-xs outline-none focus:border-[#4A7A28]" />
            </div>
            <button wire:click="openModal"
                class="h-8 w-full rounded-lg bg-[#4A7A28] px-3 text-xs font-semibold text-white sm:w-auto">
                <i class="fa-solid fa-user-plus text-[10px]"></i> Add User
            </button>
        </x-slot:actions>

        <x-table.thead>
            <x-table.th>Name</x-table.th>
            <x-table.th>Email</x-table.th>
            <x-table.th>Role</x-table.th>
            <x-table.th class="text-right">Actions</x-table.th>
        </x-table.thead>

        <tbody class="divide-y divide-[#EDE5D8]">
            @foreach($users as $user)
            <x-table.tr class="transition-colors hover:bg-[#FAF7F2]/50">
                <x-table.td>
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#EEF5E4] text-[10px] font-bold text-[#2E5A12]">
                            {{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}
                        </div>
                        <span class="font-semibold text-[#180C04]">{{ $user->first_name }} {{ $user->last_name }}</span>
                    </div>
                </x-table.td>
                <x-table.td class="text-[#63594E]">{{ $user->email }}</x-table.td>
                <x-table.td>
                    <span
                        class="inline-flex items-center rounded-full bg-[#F5EFE8] px-2.5 py-0.5 text-[10px] font-bold uppercase text-[#A89070]">
                        {{ $user->role }}
                    </span>
                </x-table.td>
                <x-table.td class="text-right">
                    <div class="flex justify-end gap-3">
                        <button wire:click="edit({{ $user->id }})"
                            class="text-[11px] font-black uppercase text-[#4A7A28] hover:underline">Edit</button>
                        <button wire:click="confirmDelete({{ $user->id }})"
                            class="text-[11px] font-black uppercase text-red-500 hover:underline">Delete</button>
                    </div>
                </x-table.td>
            </x-table.tr>
            @endforeach
        </tbody>

        <x-slot:footer>
            {{ $users->links() }}
        </x-slot:footer>
    </x-table.container>
</div>