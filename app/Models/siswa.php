<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class siswa extends Model
{
  use HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'siswa';                                     
  protected $guarded = [];


  public function __construct()
  {
    $this->builder = DB::table($this->table);
  } 

  public function getData() 
  {
    return $this->builder->leftJoin('jurusan', 'jurusan.id', '=', 'siswa.id')->get();
  }



}
