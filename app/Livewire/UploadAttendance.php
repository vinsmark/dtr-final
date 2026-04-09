<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadAttendance extends Component
{
    use WithFileUploads;

    public $uploadFile;

    public function upload()
    {
        dd($this->uploadFile);
    }

    public function render()
    {
        return view('livewire.upload-attendance');
    }
}