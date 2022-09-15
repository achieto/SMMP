<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RpsController extends Controller
{
    public function list() {
        return view('admin.rps.list');
    }
}
