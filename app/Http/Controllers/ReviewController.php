<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use App\Models\Review;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Product.review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    public function createReview(Request $request, $id)
    {
        $request->validate([
            'komentar'=>'required',
        ]);

        $idUser = Auth::id();

        $review = new Review;
        $review->user_id = $idUser;
        $review->barang_id = $id;
        $review->komentar = $request->komentar;

        $review->save();

        return redirect('Product/'. $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        $barang = $review->barang_id;
        return view('page.showKomentar',compact('review','barang'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        $barang = $review->barang_id;
        return view('page.editKomentar',compact('review','barang'));
        
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
            'review'=>'required',
        ]);
        
        //  $review = Review::where('id',$id)->update([
            //     'komentar' => $request['review'],
            // ]);
            $review = Review::find($id);
            // dd($review);
        $id_produk = $review->barang_id;
        $review->update([
                 'komentar' => $request['review'],
             ]);
            return redirect('Product/'. $id_produk);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
            $review = Review::where('id',$id)->delete();
            return redirect('Product/'.$review);
            // dd($review);
        }
        
    }

