<?php

namespace App\Http\Livewire\Hsiswa;

use App\Mail\NotifAccountCreate;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public $email_siswa;

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
        $this->email_siswa = $siswa->email_siswa;
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

    public function storeAccountStudent()
    {

        $this->validate();
        $siswa = $this->SiswaModel->leftjoin('jurusan', 'siswa.jurusan_id', '=', 'jurusan.id')
            ->select('siswa.*', 'jurusan.nama_jurusan')->find($this->nis);
        try {
            $defaultPassword =  Hash::make($this->password);

            if ($siswa->user_id == null) {
                User::create([
                    'username' => $this->nis,
                    'email' => $this->email_siswa,
                    'password' => $defaultPassword,
                ]);

                //kirim email
                \Mail::to($this->email_siswa)->send(new NotifAccountCreate($this->nama_siswa, $this->nis, $this->password));

                $this->dispatchBrowserEvent('closeModalCreateAccount');
                // untuk refresh
                $this->emit('reloadTblSiswa');
                //memanggil alert sukses
                $this->emit('siswaCreateAccountSuccess', $this->nama_siswa);

                $this->initialisasiProperti();
            } else {
                $this->emit('siswaStoreAccountFail', $this->nama_siswa);
            }
        } catch (\Throwable $th) {
            // dd('Ops..', $th->getMessage());
            $this->emit('siswaStoreFail', $th->getMessage());
        }
    }

    public function initialisasiProperti()
    {
        $this->password = null;
        $this->confirm_password = null;
    }
}
