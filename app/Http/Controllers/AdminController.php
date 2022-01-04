<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:SuperAdmin');
    }

    public function delete()
    {
      return 'Halaman admin supaya bisa request delete';
    }

    public function update()
    {
      return 'Halaman admin untuk update';
    }
}
