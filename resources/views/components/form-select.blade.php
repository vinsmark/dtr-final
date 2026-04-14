@props(['label' => ''])

<div class="space-y-1">
    @if($label)
    <label class="text-[10px] font-black uppercase tracking-widest text-[#180C04] ml-1">
        {{ $label }}
    </label>
    @endif

    <select {{ $attributes->merge([
        'class' => 'h-9 w-full rounded-lg border border-[#D4C4A8] bg-white px-3 text-xs text-[#180C04] outline-none
        focus:border-[#4A7A28] focus:ring-1 focus:ring-[#4A7A28]/20 transition-all shadow-sm'
        ]) }}>
        {{ $slot }}
    </select>
</div>