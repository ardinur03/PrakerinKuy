<?php

namespace App\Http\Livewire\Hsiswa;

use App\Models\Siswa;
use Livewire\Component;

class SiswaCreateAccount extends Component
{

    public $nis;
    public $nama_siswa;
    public $kelas;
    public $nama_jurusan; // => dari tabel jurusan
    public $alamat;
    public $kontak_siswa;
    public $angkatan;
    public $jk_siswa;

    public $password;
    public $confirm_password;

    protected $listeners = [
        'createAccount' => 'showModalCreateAccountSiswa'
    ];

    public function render()
    {
        return view('livewire.hubin.siswa.siswa-create-account');
    }

    public function __construct()
    {
        $this->SiswaModel = new Siswa();
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

    public function showModalCreateAccountSiswa(Siswa $siswa)
    {
        $this->nis  = $siswa->nis;
        $siswa = $this->SiswaModel->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
            ->select('siswa.*', 'jurusan.nama_jurusan')->find($this->nis);
        $this->nis = $siswa->nis;
        $this->nama_siswa   = $siswa->nama_siswa;
        $this->kelas        = $siswa->kelas;
        $this->nama_jurusan = $siswa->nama_jurusan;
        $this->alamat       = $siswa->alamat;
        $this->kontak_siswa = $siswa->kontak_siswa;
        $this->angkatan = $siswa->angkatan;
        $this->jk_siswa = $siswa->jk_siswa;
        $this->dispatchBrowserEvent('openModalCreateAccount', 'modal_account_create_siswa');
    }

    protected function rules()
    {
        return [
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password|min:8'
        ];
    }
    protected $messages = [
        'password.required' => 'Password harus di isi !!!',

        'password.min' => 'Password harus 8 character !!!',

        'confirm_password.required' => 'Ketik ulang Password harus di isi !!!',

        'confirm_password.same' => 'Ketik ulang Password harus sama !!!',
    ];
}
