<?php

namespace App\Http\Livewire\Hcharts;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class Hchart extends Component
{

    public $siswaCount, $perusahaanCount;
    public $pengajuan = 0;

    protected $listeners = [
        'reloadCharts' => '$refresh',
    ];

    public function mount($siswaCount, $perusahaanCount, $jurusanCount)
    {
        $this->siswaCount = $siswaCount;
        $this->perusahaanCount = $perusahaanCount;
        $this->jurusanCount = $jurusanCount;
    }

    public function render()
    {

        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Banyak')
            ->addColumn('Siswa', $this->siswaCount, '#28A745')
            ->addColumn('Perusahaan', $this->perusahaanCount, '#17A2B8')
            ->addColumn('Pengajuan', $this->pengajuan, '#FFC107')
            ->addColumn('Jurusan', $this->jurusanCount, '#DC3545');

        $pieChartModel = (new PieChartModel())
            ->setTitle('Banyak')
            ->addSlice('Siswa', $this->siswaCount, '#28A745')
            ->addSlice('Perusahaan', $this->perusahaanCount, '#17A2B8')
            ->addSlice('Pengajuan', $this->pengajuan, '#FFC107')
            ->addSlice('Jurusan', $this->jurusanCount, '#DC3545');

        // $this->emit('reloadCharts');
        return view('livewire.hcharts.hchart')->with([
            'columnChartModel' => $columnChartModel,
            'pieChartModel' => $pieChartModel
        ]);
    }
}
