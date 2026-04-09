<div>

   <form wire:submit.prevent="upload" enctype="multipart/form-data">

    <input 
        type="file"
        wire:model="uploadFile"
        wire:key="uploadFile"
    >

    @error('uploadFile') 
        <span>{{ $message }}</span> 
    @enderror

    <button type="submit">Upload</button>

</form>
</div>