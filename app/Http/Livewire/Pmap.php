<?php

namespace App\Http\Livewire;

use App\Models\Perusahaan;
use Livewire\Component;


class Pmap extends Component
{
    public $long, $lat;

    public $geoJson;

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
                    'locationId' => $location->id,
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
        return view('livewire.pmap');
    }
}
