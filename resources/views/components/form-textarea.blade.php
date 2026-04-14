@props(['label' => ''])

<div class="space-y-1">
    @if($label)
    <label class="text-[10px] font-black uppercase tracking-widest text-[#180C04] ml-1">
        {{ $label }}
    </label>
    @endif

    <textarea {{ $attributes->merge([
        'class' => 'w-full rounded-lg border border-[#D4C4A8] bg-white p-3 text-xs text-[#180C04] placeholder-[#C4B49A] outline-none focus:border-[#4A7A28] focus:ring-1 focus:ring-[#4A7A28]/20 transition-all shadow-sm'
    ]) }}></textarea>
</div>