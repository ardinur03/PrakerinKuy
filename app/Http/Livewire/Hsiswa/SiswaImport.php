<?php

namespace App\Http\Livewire\Hsiswa;

use App\Imports\SiswaImportFile;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class SiswaImport extends Component
{
    use WithFileUploads;

    public $fileSiswaCreate;

    protected $listeners = [
        'reloadTblSiswa' => '$refresh',
    ];

    protected $rules = [
        'fileSiswaCreate' => 'required|mimes:xlsx, xls'
    ];
    protected $messages = [
        'fileSiswaCreate.required' => 'File excsl harus terisi !!!',

        'fileSiswaCreate.mimes' => 'Jenis File haru berupa XLSX, XLS  !!!'
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

    public function insertfile()
    {
        $this->validate();

        Excel::import(new SiswaImportFile, $this->fileSiswaCreate);

        //untuk menutup POP-UP atau MODAL saat insert
        $this->dispatchBrowserEvent('closeModalImport');

        $this->emit('alert-success', [
            'icon'  => 'success',
            'title' => 'Apakah anda yakin ?',
            'text'  => "Data siswa berhasil di Import !!!",
            'type'  => 'success',
            'position' => 'center',
            'timer' =>  false,
            'showConfirmButton' => true,
        ]);
        // refresh table raltime
        $this->emit('reloadTblSiswa');
    }

    public function render()
    {
        return view('livewire.hubin.siswa.siswa-import');
    }

    // BUTTON DOWNLOAD
    public function import()
    {
        return response()->download(public_path('file/templates-excel-siswa-create.xlsx'));
    }

    public function cancel()
    {
        $this->initProperti();
        $this->fileSiswaCreate = null;
    }

    public function initProperti()
    {
        $this->resetErrorBag();
        $this->fileSiswaCreate = null;
    }
}
