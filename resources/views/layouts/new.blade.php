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
            background: rgba(4, 5, 3, 0.35);
            border-radius: 4px;
        }
    </style>
</head>

<body class="h-full antialiased" x-data="{ mobileMenu: false, notifOpen: false }">

    <div x-show="mobileMenu" x-cloak x-transition.opacity
        class="fixed inset-0 z-[60] bg-[#180C04]/50 backdrop-blur-sm lg:hidden" @click="mobileMenu = false"></div>

    @include('layouts.partials.sidebar')

    <div class="lg:ml-64 flex flex-col min-h-screen">

        @include('layouts.partials.navbar')

        <main class="flex-1 p-6 lg:p-10">
            {{ $slot }}
        </main>

    </div>


    @include('layouts.partials.mobile-notification')

    @livewireScripts()
</body>

</html>