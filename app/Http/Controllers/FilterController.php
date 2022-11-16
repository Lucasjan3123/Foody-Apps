<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\kategori;


class FilterController extends Controller
{
    //
    public function show($id)
    {
        //
        $kategori=Kategori::find($id);
        return view('Product.show', [ 'kategori' =>$kategori]);
    }


}
