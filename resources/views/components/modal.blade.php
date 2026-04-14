@props(['name', 'title', 'subtitle' => null, 'maxWidth' => '5xl'])

@php
$maxWidthClass = [
'sm' => 'max-w-sm',
'md' => 'max-w-md',
'lg' => 'max-w-lg',
'xl' => 'max-w-xl',
'2xl' => 'max-w-2xl',
'5xl' => 'max-w-5xl',
][$maxWidth];
@endphp

<div x-data="{ open: @entangle($name) }" x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-[#180C04]/40 backdrop-blur-sm"
            @click="open = false"></div>

        <div x-show="open" x-transition.scale.95
            class="relative bg-white rounded-2xl shadow-2xl overflow-hidden w-full border border-[#EDE5D8] {{ $maxWidthClass }}">
            <div class="px-8 py-5 border-b border-[#EDE5D8] bg-[#FAF7F2] flex justify-between items-center">
                <div>
                    <h3 class="text-sm font-black uppercase tracking-widest text-[#180C04]">{{ $title }}</h3>
                    @if($subtitle)
                    <p class="text-[10px] text-[#A89070]">{{ $subtitle }}</p>
                    @endif
                </div>
                <button type="button" @click="open = false" class="text-[#A89070] hover:text-red-600 transition-colors">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-8 max-h-[70vh] overflow-y-auto bg-white">
                {{ $slot }}
            </div>

            @if(isset($footer))
            <div class="px-8 py-5 border-t border-[#EDE5D8] bg-[#FAF7F2] flex justify-end gap-3">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>