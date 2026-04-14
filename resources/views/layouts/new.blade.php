<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #FAF7F2;
            color: #1A0E06;
        }

        .active-nav {
            background-color: #4A7A28;
            box-shadow: 0 0 18px rgba(74, 122, 40, 0.32);
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(74, 122, 40, 0.35);
            border-radius: 4px;
        }
    </style>
</head>

<body class="h-full antialiased" x-data="{ mobileMenu: false, notifOpen: false }">

    <div x-show="mobileMenu" x-cloak x-transition.opacity
        class="fixed inset-0 z-[60] bg-[#180C04]/50 backdrop-blur-sm lg:hidden" @click="mobileMenu = false"></div>


    <aside :class="mobileMenu ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-[70] w-64 bg-[#180C04] text-white transition-transform duration-300 lg:translate-x-0 flex flex-col">

        <div class="h-20 flex items-center px-6 border-b border-white/[0.07]">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-[#4A7A28] flex items-center justify-center shadow-lg flex-shrink-0">
                    <i class="fa-solid fa-seedling text-white text-sm"></i>
                </div>
                <div>
                    <p class="text-sm font-bold tracking-tight leading-tight">NEW ASIA OIL</p>
                    <p class="text-[9px] font-semibold text-[#8AB85A]/70 uppercase tracking-widest">HR Information
                        System</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">

            <a href="#" class="flex items-center px-4 py-2.5 text-sm font-semibold rounded-xl active-nav text-white">
                <i class="fa-solid fa-gauge-high mr-3 w-4 text-sm"></i> Dashboard
            </a>

            <p class="pt-6 pb-1.5 px-4 text-[9px] font-bold text-[#8AB85A]/40 uppercase tracking-widest">Workforce</p>

            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i class="fa-solid fa-users mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Employees
            </a>
            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i class="fa-solid fa-calendar-check mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Attendance
            </a>
            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i class="fa-solid fa-umbrella-beach mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Leave Requests
                <span class="ml-auto bg-[#C8823A] text-white text-[10px] font-bold px-2 py-0.5 rounded-full">5</span>
            </a>
            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i class="fa-solid fa-sitemap mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i> Org
                Chart
            </a>

            <p class="pt-6 pb-1.5 px-4 text-[9px] font-bold text-[#8AB85A]/40 uppercase tracking-widest">Compensation
            </p>

            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i class="fa-solid fa-peso-sign mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Payroll
            </a>
            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i
                    class="fa-solid fa-hand-holding-heart mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Benefits
            </a>

            <p class="pt-6 pb-1.5 px-4 text-[9px] font-bold text-[#8AB85A]/40 uppercase tracking-widest">Growth</p>

            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i
                    class="fa-solid fa-star-half-stroke mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Performance
            </a>
            <a href="#"
                class="group flex items-center px-4 py-2.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.06] rounded-xl transition-all">
                <i
                    class="fa-solid fa-person-chalkboard mr-3 w-4 text-sm transition-colors group-hover:text-[#8AB85A]"></i>
                Training
            </a>
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
                    A
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-white truncate">HR Administrator</p>
                    <p class="text-[9px] text-white/30 uppercase font-semibold tracking-wide">Full Access</p>
                </div>
                <i class="fa-solid fa-ellipsis-vertical ml-auto text-white/20 text-xs"></i>
            </div>
        </div>

    </aside>

    <div class="lg:ml-64 flex flex-col min-h-screen">

        <header
            class="h-16 sticky top-0 z-50 bg-[#FAF7F2]/90 backdrop-blur-md border-b border-[#D4C4A8]/50 px-6 lg:px-10 flex items-center justify-between">

            <button @click="mobileMenu = true" class="lg:hidden p-2 text-[#3A1E08]">
                <i class="fa-solid fa-bars-staggered text-xl"></i>
            </button>

            <h2 class="hidden md:block text-[10px] font-black text-[#A89070] uppercase tracking-widest">
                Control Panel
                <i class="fa-solid fa-chevron-right mx-2 text-[8px]"></i>
                <span class="text-[#180C04]">Real-time Analytics</span>
            </h2>

            <div class="flex items-center gap-2" x-data="{ userOpen: false }">

                <div class="relative">
                    <button @click="notifOpen = !notifOpen"
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-[#D4C4A8] text-[#A89070] hover:text-[#4A7A28] hover:border-[#4A7A28]/40 transition-all relative bg-white">
                        <i class="fa-solid fa-bell"></i>
                        <span
                            class="absolute top-2.5 right-2.5 w-2 h-2 bg-[#C8823A] rounded-full ring-2 ring-[#FAF7F2]"></span>
                    </button>

                    <div x-show="notifOpen" @click.away="notifOpen = false" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute right-0 mt-3 w-[22rem] bg-white rounded-2xl shadow-xl border border-[#D4C4A8] overflow-hidden hidden lg:block">

                        <div class="flex items-center justify-between px-4 py-3 bg-[#FAF7F2] border-b border-[#E8DECE]">
                            <span
                                class="text-[10px] font-black text-[#3A1E08] uppercase tracking-widest">Notifications</span>
                            <span class="text-[10px] font-bold text-[#4A7A28] cursor-pointer hover:underline">Mark all
                                as read</span>
                        </div>

                        <div
                            class="flex items-start gap-3 px-4 py-3.5 bg-[#F5F0E8]/60 border-b border-[#EDE5D8] hover:bg-[#F0E8DC]/60 transition-all cursor-pointer">
                            <div
                                class="w-9 h-9 rounded-xl bg-[#FBF0E2] flex items-center justify-center flex-shrink-0 mt-0.5">
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
                            <div
                                class="w-9 h-9 rounded-xl bg-[#EEF5E4] flex items-center justify-center flex-shrink-0 mt-0.5">
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

                        <div
                            class="flex items-start gap-3 px-4 py-3.5 hover:bg-[#FAF7F2] transition-all cursor-pointer">
                            <div
                                class="w-9 h-9 rounded-xl bg-[#FEF2F2] flex items-center justify-center flex-shrink-0 mt-0.5">
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

                <div class="relative">
                    <button @click="userOpen = !userOpen"
                        class="flex items-center gap-2 p-1.5 pr-3 bg-white border border-[#D4C4A8] rounded-xl hover:bg-[#FAF7F2] transition-all">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=2C1A0E&color=A8C47A"
                            class="w-7 h-7 rounded-lg" alt="Admin Avatar">
                        <span class="hidden sm:block text-xs font-semibold text-[#180C04]">Admin</span>
                        <i class="fa-solid fa-chevron-down text-[9px] text-[#A89070]"></i>
                    </button>

                    <div x-show="userOpen" @click.away="userOpen = false" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        class="absolute right-0 mt-3 w-60 bg-white rounded-2xl shadow-xl border border-[#D4C4A8] overflow-hidden">
                        <div class="p-4 bg-[#180C04] text-white">
                            <p class="text-sm font-bold">HR Administrator</p>
                            <p class="text-[10px] text-[#8AB85A] font-bold uppercase tracking-wider mt-0.5">Full Access
                            </p>
                        </div>
                        <div class="p-2 space-y-0.5">
                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium text-[#3A1E08] hover:bg-[#FAF7F2] rounded-xl transition-all">
                                <i class="fa-regular fa-id-badge mr-3 text-[#4A7A28] w-4"></i> My Profile
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium text-[#3A1E08] hover:bg-[#FAF7F2] rounded-xl transition-all">
                                <i class="fa-solid fa-gear mr-3 text-[#4A7A28] w-4"></i> Settings
                            </a>
                            <div class="border-t border-[#F0E8DC] my-1"></div>
                            <button
                                class="w-full text-left flex items-center px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                <i class="fa-solid fa-power-off mr-3 w-4"></i> Logout
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <main class="flex-1 p-6 lg:p-10">
            {{ $slot }}
        </main>

    </div>


    <div x-show="notifOpen" x-cloak class="fixed inset-0 z-[100] flex items-end lg:hidden">
        <div x-transition.opacity class="absolute inset-0 bg-[#180C04]/50 backdrop-blur-sm" @click="notifOpen = false">
        </div>
        <div x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="translate-y-full"
            x-transition:enter-end="translate-y-0"
            class="relative w-full bg-white rounded-t-[2rem] shadow-2xl border-t border-[#D4C4A8] overflow-hidden">
            <div class="px-6 pt-6 pb-4">
                <div class="w-10 h-1 bg-[#D4C4A8] rounded-full mx-auto mb-5"></div>
                <div class="flex items-center justify-between mb-1">
                    <h3 class="text-base font-bold text-[#180C04]">Notifications</h3>
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

    @livewireScripts()
</body>

</html>