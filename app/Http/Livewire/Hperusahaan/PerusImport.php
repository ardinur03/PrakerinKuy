<?php

namespace App\Http\Livewire\Hperusahaan;

use App\Imports\PerusahaanImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class PerusImport extends Component
{

    use WithFileUploads;

    public $filePerusCreate;
    public $isUploading = true;

    protected $listeners = [
        'reloadTblPerusahaan' => '$refresh',
    ];

    protected $rules = [
        'filePerusCreate' => 'required|mimes:xlsx, xls'
    ];
    protected $messages = [
        'filePerusCreate.required' => 'File excel harus terisi !!!',
        'filePerusCreate.mimes' => 'Jenis File harus berupa XLSX, XLS  !!!'
    ];

    // validasi real time
    public function updated($property, $value)
    {
        if (trim($value)) {
            $this->validateOnly($property);
        } else {
            $this->resetErrorBag($property);
        }
    }

    public function render()
    {
        return view('livewire.hperusahaan.perus-import');
    }
    // insertfileperus

    public function insertfileperus()
    {
        $this->validate();

        Excel::import(new PerusahaanImport, $this->filePerusCreate);


        //untuk menutup POP-UP atau MODAL saat insert
        $this->dispatchBrowserEvent('closeModalImportPerus');

        $this->emit('alert-success', [
            'icon'  => 'success',
            'title' => 'Berhasil !!!',
            'text'  => "Data perusahaan berhasil di Import !!!",
            'type'  => 'success',
            'position' => 'center',
            'timer' =>  false,
            'showConfirmButton' => true,
        ]);

        $this->initProperti();
        // refresh table raltime
        $this->emit('reloadTblPerusahaan');
    }

    public function cancel()
    {
        $this->initProperti();
        $this->filePerusCreate = null;
    }

    public function import()
    {
        return response()->download(public_path('file/templates-excel-perusahaan-create.xlsx'));
    }

    public function initProperti()
    {
        $this->resetErrorBag();
        $this->filePerusCreate = null;
    }
}
