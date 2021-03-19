<?php

namespace App\Imports;

use App\Models\Perusahaan;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;

class PerusahaanImport implements ToModel, WithHeadingRow, WithValidation
{

    public function rules(): array
    {
        return [
            'nama_perusahaan' => [
                'required', 'unique:perusahaan'
            ],
            'pimpinan_perusahaan' => [
                'required'
            ],
            'email_perusahaan' => [
                'required'
            ],
            'kontak_perusahaan' => [
                'required'
            ],
            'jenis_perusahaan' => [
                'required'
            ],
            'alamat_perusahaan' => [
                'required'
            ],
            'kota_perusahaan' => [
                'required'
            ],
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'nama_perusahaan.required' => ':attribute harus terisi',
            'nama_perusahaan.unique' => ':attribute sudah terdaftar',

            'nama_perusahaan.required' => ':attribute harus terisi',
            'pimpinan_perusahaan.required' => ':attribute harus terisi',
            'email_perusahaan.required' => ':attribute harus terisi',
            'kontak_perusahaan.required' => ':attribute harus terisi',
            'jenis_perusahaan.required' => ':attribute harus terisi',
            'alamat_perusahaan.required' => ':attribute harus terisi',
            'kota_perusahaan.required' => ':attribute harus terisi',

        ];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $kodePerus = Str::random(5);
        Perusahaan::create([
            'kode_perusahaan' => $kodePerus,
            'nama_perusahaan' => $row['nama_perusahaan'],
            'pimpinan_perusahaan' => $row['pimpinan_perusahaan'],
            'email_perusahaan'    => $row['email_perusahaan'],
            'website_perusahaan'  => $row['website_perusahaan'],
            'kontak_perusahaan'   => $row['kontak_perusahaan'],
            'jenis_perusahaan'  => $row['jenis_perusahaan'],
            'alamat_perusahaan' => $row['alamat_perusahaan'],
            'kota_perusahaan'   => $row['kota_perusahaan'],
            'kode_pos' => $row['kode_pos'],
        ]);
    }
}
