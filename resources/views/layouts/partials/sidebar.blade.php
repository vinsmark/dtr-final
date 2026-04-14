<aside :class="mobileMenu ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-[70] w-64 bg-[#180C04] text-white transition-transform duration-300 lg:translate-x-0 flex flex-col">

    <div class="h-20 flex items-center px-6 border-b border-white/[0.07]">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-[#4A7A28] flex items-center justify-center shadow-lg flex-shrink-0">
                <i class="fa-solid fa-seedling text-white text-sm"></i>
            </div>
            <div>
                <p class="text-sm font-bold tracking-tight leading-tight">NEW ASIA OIL INC.</p>
                <p class="text-[9px] font-semibold text-[#8AB85A]/70 uppercase tracking-widest">HR Information
                    System</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">

        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
            wire:navigate class="flex items-center px-4 py-2.5 text-sm font-semibold rounded-xl transition-all
            {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard')
            ? 'active-nav text-white'
            : 'text-white/50 hover:text-white hover:bg-white/[0.06]' }}">

            <i class="fa-solid fa-gauge-high mr-3 w-4 text-sm"></i> Dashboard
        </a>

        <p class="pt-6 pb-1.5 px-4 text-[9px] font-bold text-[#8AB85A]/40 uppercase tracking-widest">Workforce</p>

        <a href="{{ route('employees') }}" wire:navigate
            class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all
        {{ request()->routeIs('employees') ? 'active-nav text-white' : 'text-white/50 hover:text-white hover:bg-white/[0.06]' }}">

            <i class="fa-solid fa-users mr-3 w-4 text-sm transition-colors
        {{ request()->routeIs('employees') ? 'text-white' : 'group-hover:text-[#8AB85A]' }}"></i>
            Employees
        </a>
        {{-- Users --}}
        <a href="{{ route('users.index') }}" wire:navigate
            class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all
        {{ request()->routeIs('users.index') ? 'active-nav text-white' : 'text-white/50 hover:text-white hover:bg-white/[0.06]' }}">

            <i class="fa-solid fa-user-gear mr-3 w-4 text-sm transition-colors
        {{ request()->routeIs('users.index') ? 'text-white' : 'group-hover:text-[#8AB85A]' }}"></i>
            Users
        </a>
        {{-- Attendance --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-calendar-check mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Attendance
        </a>

        {{-- Leave --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-umbrella-beach mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Leave Requests
            <span class="ml-auto bg-[#C8823A] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">5</span>
        </a>

        {{-- Org Chart --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-sitemap mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Org Chart
        </a>

        <p class="pt-6 pb-1.5 px-4 text-[9px] font-bold text-[#8AB85A]/40 uppercase tracking-widest">Compensation</p>

        {{-- Payroll --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-peso-sign mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Payroll
        </a>

        {{-- Benefits --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-hand-holding-heart mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Benefits
        </a>

        <p class="pt-6 pb-1.5 px-4 text-[9px] font-bold text-[#8AB85A]/40 uppercase tracking-widest">Growth</p>

        {{-- Performance --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-star-half-stroke mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Performance
        </a>

        {{-- Training --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i class="fa-solid fa-person-chalkboard mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Training
        </a>

        {{-- Recruitment --}}
        <a href="#"
            class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
            <i
                class="fa-solid fa-magnifying-glass-chart mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
            Recruitment
        </a>

    </nav>

    <div class="p-3 border-t border-white/[0.07]">
        <div class="flex items-center gap-3 px-3 py-2.5 bg-white/[0.06] rounded-2xl">
            <div
                class="w-8 h-8 rounded-lg bg-[#4A7A28]/30 text-[#8AB85A] flex items-center justify-center font-bold text-sm flex-shrink-0">
                {{ Auth::user()->initials() }}
            </div>

            <div class="overflow-hidden">
                <p class="text-xs font-bold text-white truncate">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </p>

                <p class="text-[9px] text-white/30 uppercase font-semibold tracking-wide">
                    {{ Auth::user()->role->value ?? Auth::user()->role }}
                </p>
            </div>

            <i class="fa-solid fa-ellipsis-vertical ml-auto text-white/20 text-xs"></i>
        </div>
    </div>
</aside>