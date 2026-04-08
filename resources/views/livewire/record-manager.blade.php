<div class="p-6">
    @if(session()->has('message'))
        <div class="bg-green-200 p-2 mb-4 text-green-800 rounded">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="saveFile" class="mb-8 p-4 border rounded bg-gray-50">
        <div>
            <label class="block mb-1 font-bold">Select .DAT File</label>
            <input type="file" wire:model="dat_file" class="block w-full text-sm text-gray-500">
            
            @error('dat_file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <button type="submit" 
                    wire:loading.attr="disabled" 
                    wire:target="dat_file"
                    class="bg-blue-600 disabled:bg-gray-400 text-white px-6 py-2 rounded">
                <span wire:loading.remove wire:target="dat_file">Import Records</span>
                <span wire:loading wire:target="dat_file">Uploading File...</span>
            </button>
        </div>
    </form>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 p-2 text-left">ID</th>
                <th class="border border-gray-300 p-2 text-left">Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $record->custom_id }}</td>
                    <td class="border border-gray-300 p-2">{{ $record->entry_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>