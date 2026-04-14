<div x-show="notifOpen" x-cloak class="fixed inset-0 z-[100] flex items-end lg:hidden">
    <div x-transition.opacity class="absolute inset-0 bg-[#180C04]/50 backdrop-blur-sm" @click="notifOpen = false">
    </div>
    <div x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        class="relative w-full bg-white rounded-t-[2rem] shadow-2xl border-t border-[#D4C4A8] overflow-hidden">
        <div class="px-6 pt-6 pb-4">
            <div class="w-10 h-1 bg-[#D4C4A8] rounded-full mx-auto mb-5"></div>
            <div class="flex items-center justify-between mb-1">
                <h3 class="text-base font-bold text-[#180C04]">Notifications Mobile</h3>
                <span class="text-xs font-semibold text-[#4A7A28]">Mark all as read</span>
            </div>
        </div>

        <div class="flex items-start gap-3 px-6 py-3.5 bg-[#F5F0E8]/60 border-y border-[#EDE5D8]">
            <div class="w-9 h-9 rounded-xl bg-[#FBF0E2] flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-umbrella-beach text-[#C8823A]"></i>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-[#180C04]">Leave Request Pending</p>
                <p class="text-xs text-[#6B4C2A] mt-0.5">Maria Reyes requested leave for Apr 18–20.</p>
                <p class="text-[10px] text-[#A89070] mt-1"><i class="fa-regular fa-clock mr-1"></i>2 hours ago</p>
            </div>
            <span class="w-2 h-2 bg-[#C8823A] rounded-full mt-1.5 flex-shrink-0"></span>
        </div>

        <div class="flex items-start gap-3 px-6 py-3.5 bg-[#F5F0E8]/60 border-b border-[#EDE5D8]">
            <div class="w-9 h-9 rounded-xl bg-[#EEF5E4] flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-peso-sign text-[#4A7A28]"></i>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-[#180C04]">Payroll Processed</p>
                <p class="text-xs text-[#6B4C2A] mt-0.5">March 2025 payroll successfully processed.</p>
                <p class="text-[10px] text-[#A89070] mt-1"><i class="fa-regular fa-clock mr-1"></i>Yesterday, 4:30
                    PM</p>
            </div>
            <span class="w-2 h-2 bg-[#4A7A28] rounded-full mt-1.5 flex-shrink-0"></span>
        </div>

        <div class="flex items-start gap-3 px-6 py-3.5 border-b border-[#EDE5D8]">
            <div class="w-9 h-9 rounded-xl bg-[#FEF2F2] flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-[#180C04]">Contract Expiring Soon</p>
                <p class="text-xs text-[#6B4C2A] mt-0.5">3 employee contracts expire within 30 days.</p>
                <p class="text-[10px] text-[#A89070] mt-1"><i class="fa-regular fa-clock mr-1"></i>Apr 13, 9:00 AM
                </p>
            </div>
        </div>

        <div class="px-6 py-4 text-center bg-[#FAF7F2]">
            <a href="#" class="text-xs font-semibold text-[#4A7A28]">View all notifications</a>
        </div>
        <div class="h-safe-area-bottom h-6"></div>
    </div>
</div>