<?php

namespace App\Http\Livewire\Hsiswa;

use App\Models\{Siswa, Jurusan};
use Livewire\{Component, WithPagination};

class TblSiswa extends Component
{

    use WithPagination;
    public $paginate = 10;
    public $search;
    protected $paginationTheme = 'bootstrap';
    // protected $queryString = ['search']; => untuk link aktif

    protected $listeners = [
        'reloadTblSiswa' => '$refresh',
        'siswaStoreSuccess'    => 'handleSiswaCreateSuccess',
        'siswaUpdateSuccess'   => 'handleSiswaUpdateSuccess',
        'siswaStoreFail'     => 'handleSiswaCreateFail',
        'DeleteSiswa'     => 'destroy'
    ];

    public function __construct()
    {
        $this->SiswaModel = new Siswa();
        $this->JurusanModel = new Jurusan();
    }
    public function render()
    {
        $data = array(
            // 'siswa' => $this->SiswaModel->getData(),
            'siswa' => $this->search === null ?  Siswa::latest()->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
                ->select('siswa.*', 'jurusan.nama_jurusan')->paginate($this->paginate) : Siswa::latest()->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
                ->select('siswa.*', 'jurusan.nama_jurusan')->where('nama_siswa', 'like', '%' . $this->search . '%')->orWhere('nis', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'title' => 'Master data | Siswa',
            'jurusan' => $this->JurusanModel->getDataJurusan(),
        );
        $this->emit('destroy');
        return view('livewire.hubin.siswa.tbl-siswa', $data)
            ->extends('layouts.After_Login.app_backend', $data)
            ->section('content', $data);
    }

    public function getDelete($nis)
    {
        //hapus
        $this->destroy($nis);
    }

    public function destroy($nis)
    {
        Siswa::find($nis)->delete();
    }

    public function handleSiswaCreateSuccess($siswa)
    {
        //panggil sweetalert sukses
        $this->emit('alert-success', [
            'position' => 'top-end',
            'type'  => 'success',
            'icon'  => 'success',
            'title' => 'Success !!!',
            'timer' => 1500,
            'showConfirmButton' => false,
            'text'  => 'Siswa ' . '<b>' . $siswa['nama_siswa'] . '</b>' . ' berhasil di Tambahkan !!!',
        ]);
    }

    public function handleSiswaUpdateSuccess($siswa)
    {
        //panggil sweetalert sukses
        $this->emit('alert-success', [
            'position' => 'top-end',
            'type'  => 'info',
            'icon'  => 'info',
            'title' => 'info !!!',
            'timer' => 1500,
            'showConfirmButton' => false,
            'text'  => 'Siswa ' . '<b>' . $siswa['nama_siswa'] . '</b>' . ' berhasil di Update !!!',
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
}
