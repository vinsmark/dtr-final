<div class="p-6 bg-white rounded-xl border border-[#D4C4A8]">
    <h2 class="font-black uppercase tracking-widest text-[#180C04] mb-4">
        <i class="fa-solid fa-calendar-day mr-2 text-[#4A7A28]"></i> Manage Holidays (Ranges)
    </h2>

    {{-- FORM SECTION USING X-FORM-INPUT --}}
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 items-end mb-8">
        <div class="lg:col-span-2">
            <x-form-input label="Holiday Name" wire:model="name" placeholder="e.g. Christmas Break" />
        </div>

        <div>
            <x-form-input label="Start Date" type="date" wire:model="start_date" />
        </div>

        <div>
            <x-form-input label="End Date" type="date" wire:model="end_date" />
        </div>

        <div>
            <x-form-input label="Pre-Holiday Duty" type="date" wire:model="pre_holiday_date" />
        </div>

        <div>
            <x-form-input label="Post-Holiday Duty" type="date" wire:model="post_holiday_date" />
        </div>

        <button type="submit"
            class="h-[38px] w-full rounded-lg bg-[#180C04] px-6 text-[10px] font-black uppercase tracking-widest text-white shadow-md transition-all hover:bg-black">
            <i class="fa-solid fa-plus mr-1"></i> Add Holiday
        </button>
    </form>

    {{-- TABLE SECTION --}}
    <div class="overflow-hidden rounded-xl border border-[#D4C4A8]">
        <table class="w-full text-xs border-collapse">
            <thead class="bg-[#F5EFE8]">
                <tr>
                    <th
                        class="border-b border-[#D4C4A8] p-4 text-left font-black uppercase tracking-widest text-[#63594E]">
                        Holiday Name</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Pre-Duty Date</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Holiday Range</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Post-Duty Date</th>
                    <th
                        class="border-b border-l border-[#D4C4A8] p-4 text-center font-black uppercase tracking-widest text-[#63594E]">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EDE5D8]">
                @foreach($holidays as $h)
                <tr class="transition-colors hover:bg-[#FAF7F2]/50">
                    <td class="p-4 font-semibold text-[#180C04]">{{ $h->name }}</td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center font-medium text-[#4A7A28]">
                        {{ \Carbon\Carbon::parse($h->pre_holiday_date)->format('M d, Y') }}
                    </td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center bg-[#FFF9C4]/30">
                        <span class="font-bold text-red-700">
                            {{ \Carbon\Carbon::parse($h->start_date)->format('M d') }}
                        </span>
                        @if($h->start_date != $h->end_date)
                        <span class="text-gray-400 mx-1">—</span>
                        <span class="font-bold text-red-700">
                            {{ \Carbon\Carbon::parse($h->end_date)->format('M d, Y') }}
                        </span>
                        @else
                        <span class="font-bold text-red-700">, {{ \Carbon\Carbon::parse($h->start_date)->format('Y')
                            }}</span>
                        @endif
                    </td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center font-medium text-[#4A7A28]">
                        {{ \Carbon\Carbon::parse($h->post_holiday_date)->format('M d, Y') }}
                    </td>
                    <td class="border-l border-[#D4C4A8] p-4 text-center">
                        <button wire:click="delete({{ $h->id }})"
                            wire:confirm="Are you sure you want to delete this holiday configuration?"
                            class="text-[10px] font-black uppercase tracking-wider text-red-500 hover:text-red-700 hover:underline">
                            <i class="fa-solid fa-trash-can mr-1"></i> Delete
                        </button>
                    </td>
                </tr>
                @endforeach
                @if($holidays->isEmpty())
                <tr>
                    <td colspan="5" class="p-10 text-center text-[#A89070] italic font-medium">
                        <i class="fa-solid fa-calendar-xmark mb-2 block text-2xl opacity-20"></i>
                        No holiday records found.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>