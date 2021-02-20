<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubinController extends Controller
{
    public function __construct() {
      
    }

    public function index() {

        $data = array('title' => 'Dashboard | Hubin Admin', );

        return view('rolesViews/hubin/index_hubin', $data);
    }
}
