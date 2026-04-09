<div class="max-w-2xl mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-8 border border-gray-200">
        <h2 class="text-xl font-bold mb-4">Upload Employee Data</h2>

        @if (session()->has('message'))
            <div class="p-3 bg-green-200 text-green-800 rounded mb-4">{{ session('message') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="p-3 bg-red-200 text-red-800 rounded mb-4 text-xs">{{ session('error') }}</div>
        @endif

        <form wire:submit.prevent="uploadData">
            <div class="mb-4">
                <input type="file" wire:model="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('file') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled" class="w-full bg-blue-600 text-white py-2 rounded font-bold hover:bg-blue-700 disabled:opacity-50">
                <span wire:loading.remove>Process Upload</span>
                <span wire:loading>Please wait...</span>
            </button>
        </form>
    </div>
</div>