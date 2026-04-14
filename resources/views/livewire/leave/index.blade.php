<div class="p-6 bg-white rounded-xl border border-[#D4C4A8]">
    <h2 class="font-black uppercase tracking-widest text-[#180C04] mb-4">Leave Application</h2>

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 items-end mb-8">
        <x-form-select label="Employee" wire:model="employee_id">
            <option value="">Select Employee</option>
            @foreach($employees as $emp)
            <option value="{{ $emp->id }}">{{ $emp->firstname }} {{ $emp->lastname }}</option>
            @endforeach
        </x-form-select>

        <x-form-select label="Type" wire:model="leave_type">
            <option value="">Select Type</option>
            <option value="Sick">Sick Leave</option>
            <option value="Vacation">Vacation Leave</option>
            <option value="Emergency">Emergency Leave</option>
        </x-form-select>

        <x-form-input label="Start Date" type="date" wire:model="start_date" />
        <x-form-input label="End Date" type="date" wire:model="end_date" />

        <button type="submit"
            class="h-[38px] rounded-lg bg-[#180C04] text-white text-[10px] font-black uppercase tracking-widest hover:bg-black transition-all">
            Submit Request
        </button>
    </form>

    <div class="overflow-hidden rounded-xl border border-[#D4C4A8]">
        <table class="w-full text-xs">
            <thead class="bg-[#F5EFE8]">
                <tr>
                    <th class="p-4 text-left font-black uppercase tracking-widest text-[#63594E]">Employee</th>
                    <th class="p-4 text-center font-black uppercase tracking-widest text-[#63594E]">Type</th>
                    <th class="p-4 text-center font-black uppercase tracking-widest text-[#63594E]">Period</th>
                    <th class="p-4 text-center font-black uppercase tracking-widest text-[#63594E]">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EDE5D8]">
                @foreach($leaves as $leave)
                <tr class="hover:bg-[#FAF7F2]/50">
                    <td class="p-4 font-bold">{{ $leave->employee->firstname }} {{ $leave->employee->lastname }}</td>
                    <td class="p-4 text-center">{{ $leave->leave_type }}</td>
                    <td class="p-4 text-center">{{ $leave->start_date }} to {{ $leave->end_date }}</td>
                    <td class="p-4 text-center">
                        <span
                            class="px-2 py-1 rounded-full font-bold uppercase text-[9px] {{ $leave->status == 'Approved' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $leave->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>