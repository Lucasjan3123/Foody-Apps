<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class KategoriController extends Controller
{
    public $kategori_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = kategori::all();
        return view('Kategori.tampil', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        
    	$this->validate($request,[
    		 'nama' => 'required',
            'fotoBackground' => 'required|mimes:jpeg,jpg,png',
    	]);
 
        $imageName = time().'.'.$request ->fotoBackground ->extension();
        $request ->fotoBackground->move(public_path('image'), $imageName);
        kategori::create([
            'nama' => $request->nama,
            'fotoBackground' => $imageName
        ]);
      
        return redirect('/kategori');
     }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = kategori::find($id);
        return view('Kategori.edit', ['kategori' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nama' => 'required',
            'fotoBackground' =>' |mimes:jpeg,jpg,png',
        ]);
        $kategori = kategori::find($id);

        if ($request->has('fotoBackground')){
            $path = "image/";
            File::delete($path. $kategori->fotoBackground);
            $namaGambar= time().'.'.$request ->fotoBackground ->extension();
            $request ->fotoBackground->move(public_path('image'), $namaGambar);
            $kategori ->fotoBackground = $namaGambar;
            $kategori -> save();
        }
           $kategori ->nama = $request->nama;

           $kategori ->save();
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $kategori = kategori::find($id);

        $path ='image/'; 
        File::delete($path .$kategori->fotoBackground);
        $kategori->delete();
        return redirect('/kategori');
    }
}
