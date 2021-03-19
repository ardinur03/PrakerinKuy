<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImportFile implements ToModel, WithHeadingRow, WithValidation
{

    public function rules(): array
    {
        return [
            'nis' => [
                'required', 'unique:siswa'
            ],
            'nama_siswa' => [
                'required'
            ],
            'kelas' => [
                'required'
            ],
            'email_siswa' => [
                'required', 'unique:siswa'
            ],
            // 'jk_siswa' => [
            //     'required'
            // ],
            // 'jurusan_id' => [
            //     'required'
            // ],
            // 'kontak_siswa' => [
            //     'required'
            // ],
            // 'alamat' => [
            //     'required'
            // ],
            // 'angkatan' => [
            //     'required'
            // ],
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'nis.required' => 'Baris ke :attribute harus terisi',
            'nis.unique' => 'Baris ke :attribute sudah terdaftar',
            'nama_siswa.required' => 'Baris ke :attribute harus terisi',
            // 'kelas.required' => ':attribute harus terisi',
            'email_siswa.required' => 'Baris ke :attribute harus terisi',
            'email_siswa.unique' => 'Baris ke :attribute sudah terdaftar',
            'jk_siswa.required' => 'Baris ke :attribute harus terisi',
            // 'jurusan_id.required' => ':attribute harus terisi',
            // 'kontak_siswa.required' => ':attribute harus terisi',
            // 'alamat.required' => ':attribute harus terisi',
            // 'angkatan.required' => ':attribute harus terisi',

        ];
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row['nis'],
            'nama_siswa' => $row['nama_siswa'],
            'kelas' => $row['kelas'],
            'email_siswa' => $row['email_siswa'],
            'jk_siswa' => $row['jenis_kelamin'],
            'jurusan_id' => $row['jurusan'],
            'kontak_siswa' => $row['kontak'],
            'alamat' => $row['alamat'],
            'angkatan' => $row['angkatan'],
            'created_by' => Auth::user()->id
        ]);
    }
}
