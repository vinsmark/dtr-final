@props([
'label' => '',
'type' => 'text',
'placeholder' => '',
'icon' => null
])

<div class="space-y-1">
    @if($label)
    <label class="text-[10px] font-black uppercase tracking-widest text-[#180C04] ml-1">
        {{ $label }}
    </label>
    @endif

    <div class="relative">
        @if($icon)
        <i class="{{ $icon }} absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-[#A89070]"></i>
        @endif

        <input type="{{ $type }}" placeholder="{{ $placeholder }}" {{ $attributes->merge([
        'class' => 'h-9 w-full rounded-lg border border-[#D4C4A8] bg-white ' . ($icon ? 'pl-9' : 'px-3') . ' pr-3
        text-xs text-[#180C04] placeholder-[#C4B49A] outline-none focus:border-[#4A7A28] focus:ring-1
        focus:ring-[#4A7A28]/20 transition-all shadow-sm'
        ]) }}
        />
    </div>

    @error($attributes->get('wire:model'))
    <span class="text-[10px] text-red-600 font-bold mt-1 ml-1">{{ $message }}</span>
    @enderror
</div>