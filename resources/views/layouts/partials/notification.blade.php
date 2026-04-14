<div class="relative">
    <button @click="notifOpen = !notifOpen"
        class="w-10 h-10 flex items-center justify-center rounded-xl border border-[#D4C4A8] text-[#A89070] hover:text-[#4A7A28] hover:border-[#4A7A28]/40 transition-all relative bg-white">
        <i class="fa-solid fa-bell"></i>
        <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-[#C8823A] rounded-full ring-2 ring-[#FAF7F2]"></span>
    </button>

    <div x-show="notifOpen" @click.away="notifOpen = false" x-cloak
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="absolute right-0 mt-3 w-[22rem] bg-white rounded-2xl shadow-xl border border-[#D4C4A8] overflow-hidden hidden lg:block">

        <div class="flex items-center justify-between px-4 py-3 bg-[#FAF7F2] border-b border-[#E8DECE]">
            <span class="text-[10px] font-black text-[#3A1E08] uppercase tracking-widest">Notifications</span>
            <span class="text-[10px] font-bold text-[#4A7A28] cursor-pointer hover:underline">Mark all
                as read</span>
        </div>

        <div
            class="flex items-start gap-3 px-4 py-3.5 bg-[#F5F0E8]/60 border-b border-[#EDE5D8] hover:bg-[#F0E8DC]/60 transition-all cursor-pointer">
            <div class="w-9 h-9 rounded-xl bg-[#FBF0E2] flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-umbrella-beach text-[#C8823A] text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-bold text-[#180C04]">Leave Request Pending</p>
                <p class="text-[11px] text-[#6B4C2A] mt-0.5 leading-snug">Maria Reyes submitted a leave
                    request for <span class="font-semibold">Apr 18–20</span>. Awaiting your approval.
                </p>
                <p class="text-[10px] text-[#A89070] mt-1.5 flex items-center gap-1">
                    <i class="fa-regular fa-clock text-[9px]"></i> 2 hours ago
                </p>
            </div>
            <span class="w-2 h-2 bg-[#C8823A] rounded-full flex-shrink-0 mt-1.5"></span>
        </div>

        <div
            class="flex items-start gap-3 px-4 py-3.5 bg-[#F5F0E8]/60 border-b border-[#EDE5D8] hover:bg-[#F0E8DC]/60 transition-all cursor-pointer">
            <div class="w-9 h-9 rounded-xl bg-[#EEF5E4] flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-peso-sign text-[#4A7A28] text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-bold text-[#180C04]">Payroll Processed</p>
                <p class="text-[11px] text-[#6B4C2A] mt-0.5 leading-snug">March 2025 payroll has been
                    <span class="font-semibold">successfully processed</span> for 248 employees.
                </p>
                <p class="text-[10px] text-[#A89070] mt-1.5 flex items-center gap-1">
                    <i class="fa-regular fa-clock text-[9px]"></i> Yesterday, 4:30 PM
                </p>
            </div>
            <span class="w-2 h-2 bg-[#4A7A28] rounded-full flex-shrink-0 mt-1.5"></span>
        </div>

        <div class="flex items-start gap-3 px-4 py-3.5 hover:bg-[#FAF7F2] transition-all cursor-pointer">
            <div class="w-9 h-9 rounded-xl bg-[#FEF2F2] flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-triangle-exclamation text-red-500 text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-bold text-[#180C04]">Contract Expiring Soon</p>
                <p class="text-[11px] text-[#6B4C2A] mt-0.5 leading-snug"><span class="font-semibold">3
                        employee contracts</span> are expiring within the next 30 days. Review and
                    renew.</p>
                <p class="text-[10px] text-[#A89070] mt-1.5 flex items-center gap-1">
                    <i class="fa-regular fa-clock text-[9px]"></i> Apr 13, 9:00 AM
                </p>
            </div>
        </div>

        <div class="px-4 py-2.5 bg-[#FAF7F2] border-t border-[#E8DECE] text-center">
            <a href="#" class="text-[11px] font-semibold text-[#4A7A28] hover:underline">View all
                notifications</a>
        </div>
    </div>
</div>