<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Jurusan extends Model
{
  use HasFactory;

  protected $table = 'jurusan'; 
  protected $primaryKey = 'id';    
  public $timestamps = false;


  public function __construct()
  {
      $this->builder = DB::table($this->table);
  } 

  public function getDataJurusan() {
    return $this->builder->get();
  }

}
