<?php

namespace App\Http\Livewire\Hsiswa;

use App\Models\{Siswa, Jurusan};
use Livewire\{Component, WithPagination};

class TblSiswa extends Component
{

    use WithPagination;
    public $paginate = 10;
    public $search;

    public $selected = [];
    public $tombolListHapus = true;

    protected $paginationTheme = 'bootstrap';
    // protected $queryString = ['search']; => untuk link aktif

    protected $listeners = [
        'reloadTblSiswa' => '$refresh',
        'siswaStoreSuccess'    => 'handleSiswaCreateSuccess',
        'siswaUpdateSuccess'   => 'handleSiswaUpdateSuccess',
        'siswaStoreFail'     => 'handleSiswaCreateFail',
        'DeleteSiswa'     => 'destroy',
        'destroyLIstSiswaJs'     => 'destroyLIstSiswa'
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

    //initialisasi data key untuk confirm
    public function deleteListSiswa()
    {
        $jumlahListSiswaSelected = count($this->selected);
        //panggil sweetalert sukses
        $this->emit('deletesiswaSelected', [
            'nis'   => $this->selected,
            'jmlhListSiswa' => $jumlahListSiswaSelected,
            'icon'  => 'warning',
            'title' => 'Apakah anda yakin ?',
            'text'  => "{$jumlahListSiswaSelected} Siswa ini akan Dihapus Permanent !!!",
            'type'  => 'warning',
            'position' => 'center',
            'timer' =>  false,
            'showConfirmButton' => true,
        ]);
    }

    //execute delete selected siswa
    public function destroyLIstSiswa($nisList)
    {
        $this->selected = null;
        $this->tombolListHapus = false;
        // //hapus selected siswa
        Siswa::destroy($nisList);;

        $this->emit('reloadTblSiswa');
        $this->tombolListHapus = true;
        $this->emit('reloadTblSiswa');
    }

    public function getDelete($nis)
    {
        //hapus
        $this->destroy($nis);
    }

    public function destroy($nis)
    {
        $this->selected = null;
        $this->tombolListHapus = false;

        Siswa::find($nis)->delete();

        $this->emit('reloadTblSiswa');
        $this->tombolListHapus = true;
        $this->emit('reloadTblSiswa');
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
