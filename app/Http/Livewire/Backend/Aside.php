<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Aside extends Component
{

    public $nama_siswa;

    public function mount($dataUser)
    {
        $this->nama_siswa = $dataUser[0]->nama_siswa;
    }

    public function render()
    {
        return view('livewire.adminLTE.aside');
    }
}
