<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        /* $id_user =auth()->user()->id; */
        $id_user =auth()->user()->name;

        return view('admin.index', compact('id_user'));
    }
}
