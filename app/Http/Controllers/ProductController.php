<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

use App\Models\kategori;
use File;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('penjual')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword =$request->keyword;
        // $barang = barang::all();
        $barang =barang::where('nama', 'LIKE', '%' .$keyword. '%') 
        ->orwhere('harga', 'LIKE', '%' .$keyword. '%')
        ->get();
        $kategori = kategori::all();

        return view('Product.tampil', ['barang' => $barang, 'kategori' =>$kategori]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = kategori::all();
        return view('Product.create', ['kategori' =>$kategori]);
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
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png',
       ]);

       $imageName = time().'.'.$request ->foto ->extension();
       $request ->foto->move(public_path('image'), $imageName);
       barang::create([
           'kategori_id' => $request->kategori_id,
           'nama' => $request->nama,
           'harga' => $request->harga,
           'jumlah' => $request->jumlah,
           'foto' => $imageName
       ]);
     
       return redirect('/Product');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         //
         $barang = barang::find($id);
         return view('Product.detail', ['barang' => $barang]);
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
        $barang = barang::find($id);
        $kategori = kategori::all();

        return view('Product.edit', ['barang' => $barang, 'kategori' =>$kategori]);
    
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
        //
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'foto' =>' |mimes:jpeg,jpg,png',
        ]);
        $barang = barang::find($id);

        if ($request->has('foto')){
            $path = "image/";
            File::delete($path. $barang->foto);
            $namaGambar= time().'.'.$request ->foto ->extension();
            $request ->foto->move(public_path('image'), $namaGambar);
            $barang ->foto = $namaGambar;
            $barang -> save();
        }
           $barang ->kategori_id = $request->kategori_id;
           $barang ->nama = $request->nama;
           $barang ->harga = $request->harga;
           $barang ->jumlah = $request->jumlah;

           $barang ->save();
        return redirect('/Product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $barang = barang::find($id);

        $path ='image/'; 
        File::delete($path .$barang->foto);
        $barang->delete();
        return redirect('/Product');
    }
}
