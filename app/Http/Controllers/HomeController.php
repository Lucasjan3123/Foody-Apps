<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function index(){
    $barang = barang::all(); 
    $kategori = kategori::all();
    return view('page.home', ['kategori'=>$kategori,'barang'=>$barang]);
    }
    
    public function home(){
        $barang = barang::all(); 
        $kategori = kategori::all();
        return view('page.home', ['kategori'=>$kategori,'barang'=>$barang]);

    }

}

