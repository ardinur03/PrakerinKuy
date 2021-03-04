<?php

namespace App\Http\Livewire\Hsiswa;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SiswaUpdate extends Component
{

    public $jurusan;

    public $jurusan_id;

    public $id;
    public $nis;
    public $nama_siswa;
    public $kelas;
    public $alamat;
    public $kontak_siswa;
    public $angkatan;
    public $jk_siswa;

    protected $listeners = [
        'updateSiswa' => 'showModal'
    ];

    protected $messages = [
        'jurusan_id.required' => 'Jurusan tidak boleh kosong !!!',
        'nis.required'        => 'NIS tidak boleh kosong !!!',
        'nis.unique'          => 'NIS sudah terdaftar !!!',
        'nis.min'          => 'NIS minimal 10 angka !!!',
        'nis.max'          => 'NIS maximal 11 angka !!!',
        'nama_siswa.required' => 'Nama tidak boleh kosong !!!',
        'kelas.required'      => 'Kelas tidak boleh kosong !!!',
        'alamat.required'     => 'Alamat tidak boleh kosong !!!',
        'kontak_siswa.required' => 'kontak tidak boleh kosong !!!',
        'angkatan.required' => 'Angkatan tidak boleh kosong !!!',
        'jk_siswa.required' => 'Jeis kelamin tidak boleh kosong !!!',
    ];

    public function __construct()
    {
        $this->JurusanModel = new Jurusan();
    }

    public function render()
    {
        return view('livewire.hubin.siswa.siswa-update', [
            'jurusanlist' => $this->JurusanModel->getDataJurusan()
        ]);
    }

    // metod ini otomatis di jalankan
    public function mount()
    {
        //panggil metod 
        $this->initializedProperties();
    }

    // validasi real time
    public function updated($property, $value)
    {
        if (trim($value)) {
            $this->validateOnly($property);
        } else {
            $this->resetErrorBag($property);
        }
    }

    public function showModal(Siswa $siswa)
    {
        $this->id = $siswa->id;
        $this->jurusan_id = $siswa->jurusan_id;
        $this->nis     = $siswa->nis;
        $this->nama_siswa = $siswa->nama_siswa;
        $this->kelas  = $siswa->kelas;
        $this->alamat = $siswa->alamat;
        $this->kontak_siswa = $siswa->kontak_siswa;
        $this->angkatan = $siswa->angkatan;
        $this->jk_siswa = $siswa->jk_siswa;

        $this->dispatchBrowserEvent('openModal', 'modal_update_siswa');
    }

    public function update()
    {
        $this->validate();
        try {
            $siswa = Siswa::find($this->id);
            $siswa->update([
                'nis'         => $this->nis,
                'jurusan_id'  => $this->jurusan_id,
                'nama_siswa'  => $this->nama_siswa,
                'kelas'       => $this->kelas,
                'alamat'      => $this->alamat,
                'kontak_siswa' => $this->kontak_siswa,
                'angkatan' => $this->angkatan,
                'jk_siswa' => $this->jk_siswa,
            ]);

            //untuk menutup POP-UP atau MODAL saat insert
            $this->dispatchBrowserEvent('closeModal');

            // untuk refresh
            $this->emit('reloadTblSiswa');

            //untuk refresh sekaligus mengirim pesan
            $this->emit('siswaUpdateSuccess', $siswa);

            //untuk menkosongkan form saat isert selesai
            $this->initializedProperties();
        } catch (\Throwable $th) {
            DB::rollback();
            // dd('Ops..', $th->getMessage());
            $this->emit('siswaStoreFail', $th->getMessage());
        }
        DB::commit();
    }

    public function cancel()
    {
        $this->initializedProperties();
    }

    public function initializedProperties()
    {
        $this->jurusan = null;
        $this->nis     = null;
        $this->nama_siswa = null;
        $this->kelas  = null;
        $this->alamat = null;
        $this->kontak_siswa = null;
        $this->angkatan = null;
        $this->jk_siswa = null;
    }

    protected function rules()
    {
        return [
            'nis'         => 'required|min:10|max:11|unique:siswa,nis,' . $this->id,
            'jurusan_id'  => 'required',
            'nama_siswa'  => 'required',
            'kelas'       => 'required',
            'alamat'      => 'required',
            'kontak_siswa' => 'required',
            'angkatan' => 'required',
            'jk_siswa' => 'required',
        ];
    }
}
