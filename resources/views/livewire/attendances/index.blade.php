<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
    @if (session()->has('message'))
    <div class="bg-[#EEF5E4] border border-[#4A7A28] text-[#2E5A12] px-4 py-3 rounded-lg text-xs font-bold">
        <i class="fa-solid fa-circle-check mr-2"></i> {{ session('message') }}
    </div>
    @endif

    {{-- Import Form (no modal) --}}
    <div class="rounded-xl border border-[#D4C4A8] bg-white p-6">
        <p class="mb-4 text-[10px] font-black uppercase tracking-widest text-[#180C04]">
            <i class="fa-solid fa-file-import mr-2 text-[#4A7A28]"></i> Import Attendance Logs
        </p>

        <form wire:submit.prevent="saveImport" class="flex flex-col gap-4">
            <div
                class="group relative flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-[#D4C4A8] bg-[#FAF7F2] p-8 transition-colors hover:border-[#4A7A28]">
                <i class="fa-solid fa-file-csv mb-4 text-4xl text-[#A89070] group-hover:text-[#4A7A28]"></i>

                <label class="cursor-pointer text-center">
                    <span class="text-[10px] font-black uppercase tracking-widest text-[#180C04]">
                        Select .CSV or .TXT File
                    </span>
                    <input type="file" wire:model="file" class="hidden" accept=".csv,.txt" />
                </label>

                @if($file)
                <div
                    class="mt-4 flex items-center gap-2 rounded bg-white px-3 py-1 text-[10px] font-bold text-[#4A7A28] border border-[#4A7A28]">
                    <i class="fa-solid fa-file-lines"></i> {{ $file->getClientOriginalName() }}
                </div>
                @endif

                <div wire:loading wire:target="file" class="mt-4 text-[10px] font-bold text-blue-600">
                    <i class="fa-solid fa-spinner fa-spin mr-1"></i> Uploading...
                </div>
            </div>

            @error('file')
            <p class="text-[10px] font-bold text-red-500">
                <i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}
            </p>
            @enderror

            <div class="rounded-lg bg-[#F5EFE8] p-4">
                <p class="mb-2 text-[9px] font-black uppercase tracking-tighter text-[#A89070]">Format Requirement:</p>
                <code
                    class="block text-[10px] text-[#63594E]">TXT: ID [TAB] DateTime [TAB] State [TAB] DeviceID ...</code>
                <code class="block text-[10px] text-[#63594E]">CSV: ID, Date, Time, State, DeviceID, ...</code>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="rounded-lg bg-[#180C04] px-8 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-md transition-all hover:bg-black"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="saveImport">Start Processing</span>
                    <span wire:loading wire:target="saveImport">
                        <i class="fa-solid fa-spinner fa-spin mr-1"></i> Processing...
                    </span>
                </button>
            </div>
        </form>
    </div>

    {{-- Attendance Table --}}
    <x-table.container title="Attendance Logs" :count="$attendances->count()" :total="$attendances->total()">
        <x-slot:actions>
            <div class="relative w-full sm:w-48">
                <i
                    class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-[11px] text-[#A89070]"></i>
                <input wire:model.live="search" type="text" placeholder="Search Employee ID..."
                    class="h-8 w-full rounded-lg border border-[#D4C4A8] bg-white pl-9 pr-3 text-xs outline-none focus:border-[#4A7A28]" />
            </div>
        </x-slot:actions>
    </x-table.container>
</div>