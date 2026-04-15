<div class="p-6 bg-white rounded-xl border border-[#D4C4A8]">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="font-black uppercase tracking-widest text-[#180C04]">Payroll Processing</h2>
            <p class="text-[10px] text-[#A89070] font-bold uppercase">Generate semi-monthly salary reports</p>
        </div>
        <span class="text-[10px] bg-[#EEF5E4] text-[#2E5A12] px-3 py-1 rounded-full font-bold">
            Period: {{ $start_date ? \Carbon\Carbon::parse($start_date)->format('M d') : '...' }} - {{ $end_date ?
            \Carbon\Carbon::parse($end_date)->format('M d, Y') : '...' }}
        </span>
    </div>

    @if (session()->has('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase tracking-wider">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit.prevent="generatePayroll" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end mb-8">
        <x-form-input label="Start Period" type="date" wire:model.live="start_date" />
        <x-form-input label="End Period" type="date" wire:model.live="end_date" />

        <div class="md:col-span-2">
            <button type="submit"
                class="h-[38px] w-full rounded-lg bg-[#180C04] text-white text-[10px] font-black uppercase tracking-widest hover:bg-black transition-all shadow-md">
                <i class="fa-solid fa-calculator mr-2"></i> Generate Payroll
            </button>
        </div>
    </form>

    <div class="overflow-hidden rounded-xl border border-[#D4C4A8]">
        <table class="w-full text-xs border-collapse">
            <thead class="bg-[#F5EFE8]">
                <tr class="text-[#63594E] font-black uppercase tracking-widest">
                    <th class="p-4 text-left">Employee</th>
                    <th class="p-4 text-right">Gross Salary</th>
                    <th class="p-4 text-right">OT Pay</th>
                    <th class="p-4 text-right">Deductions</th>
                    <th class="p-4 text-right">Net Pay</th>
                    <th class="p-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EDE5D8]">
                @forelse($payrolls as $p)
                <tr class="hover:bg-[#FAF7F2]/50 transition-colors">
                    <td class="p-4 font-bold text-[#180C04]">
                        {{ $p->employee->lastname }}, {{ $p->employee->firstname }}
                    </td>
                    <td class="p-4 text-right font-mono text-gray-600">₱{{ number_format($p->gross_salary, 2) }}</td>
                    <td class="p-4 text-right text-green-600 font-mono font-bold">+₱{{ number_format($p->overtime_pay,
                        2) }}</td>
                    <td class="p-4 text-right text-red-600 font-mono font-bold">-₱{{ number_format($p->leave_deductions,
                        2) }}</td>
                    <td class="p-4 text-right font-black text-[#180C04] bg-[#F5EFE8]/30">
                        ₱{{ number_format($p->net_salary, 2) }}
                    </td>
                    <td class="p-4 text-center">
                        @if($p->status === 'Draft')
                        <button wire:click="markAsPaid({{ $p->id }})"
                            class="text-[9px] font-black uppercase bg-[#4A7A28] text-white px-3 py-1 rounded hover:bg-[#2E5A12]">
                            Release
                        </button>
                        @else
                        <span class="text-[9px] font-black uppercase text-[#4A7A28]">
                            <i class="fa-solid fa-check-double mr-1"></i> Paid
                        </span>
                        @endif
                        <button wire:click="downloadPayslip({{ $p->id }})"
                            class="text-[9px] font-black uppercase border border-[#D4C4A8] text-[#180C04] px-3 py-1 rounded hover:bg-[#F5EFE8]">
                            <i class="fa-solid fa-file-pdf"></i> PDF
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-10 text-center text-[#A89070] italic font-medium">
                        No payroll records found for this period. Click "Generate" to process.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>