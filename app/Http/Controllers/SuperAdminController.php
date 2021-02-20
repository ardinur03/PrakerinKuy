<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function __construct() {
      
    }

    public function index() {


      return view('rolesViews.SuperAdmin.index_sadmin');
    }
}
