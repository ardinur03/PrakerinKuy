<?php

namespace App\Http\Livewire\Hperusahaan;

use Livewire\Component;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class PerusCreate extends Component
{
    use WithFileUploads;
    public $long;
    public $lat;
    public $image;

    public $geoJson;

    public $kode_perusahaan;
    public $nama_perusahaan;
    public $pimpinan_perusahaan;
    public $email_perusahaan;
    public $website_perusahaan;
    public $kontak_perusahaan;
    public $jenis_perusahaan;
    public $alamat_perusahaan;
    public $kota_perusahaan;
    public $kode_pos;
    public $deskripsi_perusahaan;

    protected $rules = [
        'nama_perusahaan'   => 'required',
        'pimpinan_perusahaan' => 'required',
        'email_perusahaan'  => 'required',
        // 'website_perusahaan'=> 'required',
        'kontak_perusahaan' => 'required',
        'jenis_perusahaan'  => 'required',
        'alamat_perusahaan' => 'required',
        'kota_perusahaan' => 'required',
        'image' => 'image|max:2024',
        // 'kode_pos'          => 'required',
    ];

    protected $messages = [
        'kode_perusahaan.required'      => 'Kode jurusan harus di isi !!!',
        'nama_perusahaan.required'   => 'Nama perusahaan harus di isi !!!',
        'pimpinan_perusahaan.required' => 'Pimpinan harus di isi !!!',
        'email_perusahaan.required'  => 'Email harus di isi !!!',
        // 'website_perusahaan.required'=> 'Website harus di isi !!!',
        'kontak_perusahaan.required' => 'Kontak perusahaan harus di isi !!!',
        'jenis_perusahaan.required'  => 'Jenis perusahaan harus di isi !!!',
        'alamat_perusahaan.required' => 'Alamat perusahaan harus di isi !!!',
        'kota_perusahaan.required' => 'Kota perusahaan harus di isi !!!',
        // 'kode_pos.required'          => 'Kode Pos harus ',
    ];

    protected $listeners = [
        'kosongLagLat' => 'kosongLagLat',
        'reloadModal' => '$refresh'
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

    private function loadLocations()
    {
        $locations = Perusahaan::orderBy('created_at', 'desc')->get();

        $customLocations = [];

        foreach ($locations as $location) {
            $customLocations[] = [
                'type' => 'features',
                'geometry' => [
                    'coordinates' => [$location->long, $location->lat],
                    'type' => 'Point'
                ],
                'properties' => [
                    'locationId' => $location->kode_perusahaan,
                    'title' => $location->nama_perusahaan,
                    'image' => $location->image,
                    'description' => $location->deskripsi_perusahaan
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $customLocations
        ];

        $geoJson = collect($geoLocation)->toJson();
        $this->geoJson = $geoJson;
    }

    public function render()
    {
        $this->loadLocations();
        // $this->emit('reloadModal');
        return view('livewire.hperusahaan.perus-create');
    }

    // insert perusahaan single
    public function storePerus()
    {
        $this->validate();

        $this->kode_perusahaan = Str::random(5);
        $imageName = md5($this->image . microtime()) . '.' . $this->image->extension();

        Storage::putFileAs(
            'public/image/perusahaan',
            $this->image,
            $imageName
        );

        try {
            $perusahaan = Perusahaan::create([
                'kode_perusahaan' =>  $this->kode_perusahaan,
                'nama_perusahaan' => $this->nama_perusahaan,
                'pimpinan_perusahaan' => $this->pimpinan_perusahaan,
                'email_perusahaan' => $this->email_perusahaan,
                'website_perusahaan' => $this->website_perusahaan,
                'kontak_perusahaan' => $this->kontak_perusahaan,
                'jenis_perusahaan' => $this->jenis_perusahaan,
                'alamat_perusahaan' => $this->alamat_perusahaan,
                'kota_perusahaan' => $this->kota_perusahaan,
                'deskripsi_perusahaan' => $this->deskripsi_perusahaan,
                'kode_pos' => $this->kode_pos,
                'long' => $this->long,
                'lat' => $this->lat,
                'image' => $imageName,
            ]);
            $this->loadLocations();
            $this->dispatchBrowserEvent('locatonAdded', $this->geoJson);

            // untuk refresh
            $this->emit('reloadTblPerusahaan');

            //untuk menutup POP-UP atau MODAL saat insert
            $this->dispatchBrowserEvent('closeModalPerusahaan');

            //memanggil alert sukses
            $this->emit('perusahaanStoreSuccess', $perusahaan);

            //untuk menkosongkan form saat isert selesai
            $this->initialisasiModalPerus();
        } catch (\Throwable $th) {
            DB::rollback();
            $this->emit('perusahaanStoreFail', $th->getMessage());
        }
        DB::commit();
    }

    public function cancel()
    {
        $this->initialisasiModalPerus();
    }

    public function initialisasiModalPerus()
    {
        $this->long = '';
        $this->lat = '';
        $this->kode_perusahaan = '';
        $this->kode_jurusan = '';
        $this->nama_perusahaan = '';
        $this->pimpinan_perusahaan = '';
        $this->email_perusahaan = '';
        $this->website_perusahaan = '';
        $this->kontak_perusahaan = '';
        $this->jenis_perusahaan = '';
        $this->alamat_perusahaan = '';
        $this->kota_perusahaan = '';
        $this->kode_pos = '';
        $this->image = '';
    }

    public function kosongLagLat()
    {
        $this->initialisasilonglat();
    }

    public function initialisasilonglat()
    {
        $this->long = null;
        $this->lat = null;
    }
}
