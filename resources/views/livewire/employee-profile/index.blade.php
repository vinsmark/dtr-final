<div class="p-6">
    <div class="flex items-center gap-4 mb-6 bg-white p-6 rounded-xl border border-[#D4C4A8]">
        <div
            class="w-16 h-16 bg-[#4A7A28] rounded-full flex items-center justify-center text-white text-2xl font-black">
            {{ strtoupper(substr($employee->firstname, 0, 1) . substr($employee->lastname, 0, 1)) }}
        </div>
        <div>
            <h1 class="text-xl font-black text-[#180C04] uppercase">{{ $employee->firstname }} {{ $employee->lastname }}
            </h1>
            <p class="text-xs font-bold text-[#A89070] uppercase tracking-widest">{{ $employee->position }} | {{
                $employee->employee_code }}</p>
        </div>
    </div>

    <div class="flex gap-2 mb-6 border-b border-[#D4C4A8]">
        <button wire:click="$set('activeTab', 'personal')"
            class="px-6 py-3 text-xs font-black uppercase tracking-widest {{ $activeTab == 'personal' ? 'border-b-2 border-[#4A7A28] text-[#180C04]' : 'text-[#A89070]' }}">Info</button>
        <button wire:click="$set('activeTab', 'family')"
            class="px-6 py-3 text-xs font-black uppercase tracking-widest {{ $activeTab == 'family' ? 'border-b-2 border-[#4A7A28] text-[#180C04]' : 'text-[#A89070]' }}">Family</button>
        <button wire:click="$set('activeTab', 'documents')"
            class="px-6 py-3 text-xs font-black uppercase tracking-widest {{ $activeTab == 'documents' ? 'border-b-2 border-[#4A7A28] text-[#180C04]' : 'text-[#A89070]' }}">201
            Documents</button>
    </div>

    @if($activeTab == 'family')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8] h-fit">
            <h3 class="font-black text-[10px] uppercase mb-4 text-[#A89070]">Add Dependent</h3>
            <x-form-input label="Full Name" wire:model="dep_name" />
            <x-form-input label="Relationship" wire:model="dep_relationship" />
            <x-form-input label="Birthdate" type="date" wire:model="dep_birthdate" />
            <button wire:click="addDependent"
                class="w-full mt-4 bg-[#180C04] text-white py-2 rounded-lg text-[10px] font-black uppercase">Save
                Dependent</button>
        </div>
        <div class="md:col-span-2 bg-white rounded-xl border border-[#D4C4A8] overflow-hidden">
            <table class="w-full text-xs text-left">
                <thead class="bg-[#F5EFE8] font-black uppercase text-[#63594E]">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Relationship</th>
                        <th class="p-4">Birthdate</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EDE5D8]">
                    @foreach($employee->dependents as $dep)
                    <tr>
                        <td class="p-4 font-bold">{{ $dep->name }}</td>
                        <td class="p-4">{{ $dep->relationship }}</td>
                        <td class="p-4">{{ $dep->birthdate }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if($activeTab == 'documents')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-[#D4C4A8] h-fit">
            <h3 class="font-black text-[10px] uppercase mb-4 text-[#A89070]">Upload File</h3>
            <x-form-input label="Document Name (e.g. NBI)" wire:model="doc_type" />
            <input type="file" wire:model="file" class="text-xs mt-2" />
            <button wire:click="uploadDocument"
                class="w-full mt-4 bg-[#4A7A28] text-white py-2 rounded-lg text-[10px] font-black uppercase">Upload to
                201</button>
        </div>
        <div class="md:col-span-2 grid grid-cols-2 gap-4">
            @foreach($employee->attachments as $doc)
            <div class="p-4 bg-white border border-[#D4C4A8] rounded-xl flex justify-between items-center">
                <span class="font-black text-[10px] uppercase text-[#180C04]">{{ $doc->document_type }}</span>
                <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank"
                    class="text-[#4A7A28] font-bold text-[10px] uppercase underline">View File</a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>