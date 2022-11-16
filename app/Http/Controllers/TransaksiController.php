<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function tampilan()
    {
       return view ('layout.transaksi.tampilan');
    }
    }
