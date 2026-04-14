@props(['title', 'count' => null, 'total' => null])

<div class="w-full relative flex flex-col overflow-hidden rounded-xl border border-[#EDE5D8] bg-white shadow-sm">
    <div
        class="flex flex-col gap-4 border-b border-[#EDE5D8] bg-[#FAF7F2] px-4 py-4 sm:px-6 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex flex-col gap-1">
            <h2 class="text-xs font-black uppercase tracking-widest text-[#180C04]">{{ $title }}</h2>
            @if($count !== null)
            <p class="text-[10px] text-[#A89070]">Displaying <b>{{ $count }}</b> out of <b>{{ $total }}</b> records</p>
            @endif
        </div>

        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-end sm:flex-1">
            {{ $actions ?? '' }}
        </div>
    </div>

    <div class="w-full overflow-x-auto custom-scrollbar bg-white">
        <table class="w-full min-w-[900px] table-fixed border-collapse text-left">
            {{ $slot }}
        </table>
    </div>

    @if(isset($footer))
    <div class="border-t border-[#EDE5D8] bg-[#FAF7F2] px-4 py-3 sm:px-6">
        {{ $footer }}
    </div>
    @endif
</div>