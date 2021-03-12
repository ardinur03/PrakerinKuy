<?php

namespace App\Http\Livewire\Hperusahaan;

use App\Exports\PerusahaanExport;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TblPerusahaan extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search;

    public $selectedIds = [];
    public $selectedAll = false;
    public $tombolDeleteSelected = true;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'reloadTblPerusahaan' => '$refresh',
        'perusahaanStoreSuccess' => 'handlePerusahaanCreate',
        'perusahaanStoreFail' => 'handleSiswaCreateFail',
        'DeletedSingle' => 'destroySingle',
        'selectedAll' => 'selectedAll',
        'destroyLIstPerusJs' => 'destroyListPerus'
    ];

    public function render()
    {
        $data = array(
            'title'      => 'Master Data Perusahaan',
            'perusahaan' => $this->search === null ?  Perusahaan::latest()->paginate($this->paginate) : Perusahaan::latest()->where('kode_perusahaan', 'like', '%' . $this->search . '%')->orWhere('nama_perusahaan', 'like', '%' . $this->search . '%')->paginate($this->paginate),
        );

        return view('livewire.hperusahaan.tbl-perusahaan', $data)->extends('layouts.After_Login.app_backend', $data)
            ->section('content', $data);
    }

    protected function updatedselectedAll()
    {
        if ($this->selectedAll) {
            $this->selectedIds = Perusahaan::pluck('kode_perusahaan');
        } else {
            $this->selectedIds = [];
        };
    }

    //proses eksekusi delete single
    public function destroySingle($kode_perusahaan)
    {
        //mengkosongkan selected perusahaan 1 = 1
        $this->selectedIds = [];
        //mengkosongkan selected perusahaan 1 = banyak
        $this->selectedAll = [];
        $this->tombolDeleteSelected = false;
        Perusahaan::find($kode_perusahaan)->delete();
        // untuk refresh
        $this->emit('reloadTblPerusahaan');
        $this->tombolDeleteSelected = true;
        $this->emit('reloadTblPerusahaan');
    }

    //proses confirm delete list
    public function deleteListSelectedPerusahaan()
    {
        $selectedAll = count($this->selectedIds);
        //panggil sweetalert sukses
        $this->emit('deleteConfirmSelected', [
            'id'   => $this->selectedIds,
            'method'   => 'destroyLIstPerusJs',
            'name'   => 'Perusahaan',
            'jmlhListSelected' => $selectedAll,
            'icon'  => 'warning',
            'title' => 'Apakah anda yakin ?',
            'text'  => "{$selectedAll} Perusahaan ini akan Dihapus Permanent !!!",
            'type'  => 'warning',
            'position' => 'center',
            'timer' =>  false,
            'showConfirmButton' => true,
        ]);
    }

    //proses eksekusi delete list selected
    public function destroyListPerus($kode_perusahaan)
    {
        //mengkosongkan selected perusahaan 1 = 1
        $this->selectedIds = [];
        //mengkosongkan selected perusahaan 1 = banyak
        $this->selectedAll = [];
        $this->tombolDeleteSelected = false;
        Perusahaan::destroy($kode_perusahaan);
        // untuk refresh
        $this->emit('reloadTblPerusahaan');
        $this->tombolDeleteSelected = true;
        $this->emit('reloadTblPerusahaan');
    }

    public function handlePerusahaanCreate($perusahaan)
    {
        //panggil sweetalert sukses
        $this->emit('alert-success', [
            'position' => 'top-end',
            'type'  => 'success',
            'icon'  => 'success',
            'title' => 'Berhasil !!!',
            'timer' => 1500,
            'showConfirmButton' => false,
            'text'  => 'Siswa ' . '<b>' . $perusahaan['nama_perusahaan'] . '</b>' . ' berhasil di Tambahkan !!!',
        ]);
    }

    public function handleSiswaCreateFail($data)
    {
        //panggil sweetalert sukses
        $this->emit('alert-success', [
            'position' => 'center',
            'type'  => 'error',
            'icon'  => 'error',
            'title' => 'error !!!',
            'timer' =>  false,
            'showConfirmButton' => true,
            'text'  => '<b>' . $data . '</b>',
        ]);
    }

    public function exportPerusahaan()
    {
        return Excel::download(new PerusahaanExport, 'Perusahaan.xlsx');
    }

    public function printpdf()
    {
    }
}
