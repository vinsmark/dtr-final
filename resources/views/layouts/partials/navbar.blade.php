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

        @include('layouts.partials.notification')
        @auth
        <div class="relative" x-data="{ userOpen: false }">
            <button @click="userOpen = !userOpen"
                class="flex items-center gap-2 p-1.5 pr-3 bg-white border border-[#D4C4A8] rounded-xl hover:bg-[#FAF7F2] transition-all">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->first_name) }}&background=2C1A0E&color=A8C47A"
                    class="w-7 h-7 rounded-lg" alt="{{ Auth::user()->first_name }} Avatar">

                <span class="hidden sm:block text-xs font-semibold text-[#180C04]">
                    {{ Auth::user()->first_name }}
                </span>

                <i class="fa-solid fa-chevron-down text-[9px] text-[#A89070]"></i>
            </button>

            <div x-show="userOpen" @click.away="userOpen = false" x-cloak
                x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="absolute right-0 mt-3 w-60 bg-white rounded-2xl shadow-xl border border-[#D4C4A8] overflow-hidden">

                <div class="p-4 bg-[#180C04] text-white">
                    <p class="text-sm font-bold">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </p>

                    <p class="text-[10px] text-[#8AB85A] font-bold uppercase tracking-wider mt-0.5">
                        {{ Auth::user()->role->value ?? Auth::user()->role }}
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

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full text-left flex items-center px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition-all">
                            <i class="fa-solid fa-power-off mr-3 w-4"></i>
                            {{ __('Log out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endauth
    </div>
</header>