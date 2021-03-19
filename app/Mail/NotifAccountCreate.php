<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifAccountCreate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama_siswa, $nis, $password)
    {
        $this->nama_siswa = $nama_siswa;
        $this->nis = $nis;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array(
            'nis' => $this->nis,
            'password ' => $this->password,
        );
        return $this->from('hi@siiprakerinkuy.com', 'Admin Prakerin Skuy SMK Negeri 11 Kota Bandung')->subject('INFO AKUN LOGIN ANDA !!! MOHON UNTUK GANTI PASSWORD SETELAH ANDA MENERIMA EMAIL INI !!!')->markdown('emails.sites.notifikasi', ['nama_siswa' => $this->nama_siswa, 'nis' => $this->nis, 'password' => $this->password]);
    }
}
