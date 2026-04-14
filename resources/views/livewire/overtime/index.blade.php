<div class="p-6 bg-white rounded-xl border border-[#D4C4A8]">
    <h2 class="font-black uppercase tracking-widest text-[#180C04] mb-4">
        <i class="fa-solid fa-clock-pulse mr-2 text-[#4A7A28]"></i> Overtime Management
    </h2>

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 items-end mb-8">
        <div class="lg:col-span-1">
            <x-form-select label="Select Employee" wire:model="employee_id">
                <option value="">Select...</option>
                @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->lastname }}, {{ $emp->firstname }}</option>
                @endforeach
            </x-form-select>
        </div>

        <x-form-input label="OT Date" type="date" wire:model="ot_date" />
        <x-form-input label="Hours" type="number" step="0.5" wire:model="hours" placeholder="0.0" />
        <x-form-input label="Purpose/Task" wire:model="purpose" placeholder="e.g. Month-end reporting" />

        <button type="submit"
            class="h-[38px] w-full rounded-lg bg-[#180C04] px-6 text-[10px] font-black uppercase tracking-widest text-white shadow-md transition-all hover:bg-black">
            Submit OT
        </button>
    </form>

    <div class="overflow-hidden rounded-xl border border-[#D4C4A8]">
        <table class="w-full text-xs border-collapse">
            <thead class="bg-[#F5EFE8]">
                <tr>
                    <th
                        class="border-b border-[#D4C4A8] p-4 text-left font-black uppercase tracking-widest text-[#63594E]">
                        Employee</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Date</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Hours</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-left font-black uppercase tracking-widest text-[#63594E]">
                        Purpose</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Status</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EDE5D8]">
                @foreach($overtimes as $ot)
                <tr class="hover:bg-[#FAF7F2]/50">
                    <td class="p-4 font-bold text-[#180C04]">{{ $ot->employee->lastname }}, {{ $ot->employee->firstname
                        }}</td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center">{{
                        \Carbon\Carbon::parse($ot->ot_date)->format('M d, Y') }}</td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center font-bold text-[#4A7A28]">{{ $ot->hours }} hrs
                    </td>
                    <td class="border-l border-[#D4C4A8] p-4 text-[#63594E]">{{ $ot->purpose }}</td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center">
                        <span
                            class="px-2.5 py-1 rounded-full text-[9px] font-black uppercase tracking-tighter 
                            {{ $ot->status === 'Approved' ? 'bg-[#EEF5E4] text-[#2E5A12]' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $ot->status }}
                        </span>
                    </td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center">
                        <button wire:click="delete({{ $ot->id }})" wire:confirm="Delete this record?"
                            class="text-red-500 hover:text-red-700">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>