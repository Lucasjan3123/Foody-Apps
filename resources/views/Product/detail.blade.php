@extends('layout.master')
@section('title')
Halaman Detail 
@endsection 
@section('content title')
 @endsection

 @section('subtitle')
 Detail
 @endsection

@section('content')


<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    
                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="{{ asset('image/' .$barang ->foto) }}" /></div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $barang ->nama }} &nbsp;       kategori : {{ $barang ->kategori->nama }}  </h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">{{$barang->review->count()}} Review </span>
                    </div>
                    <h4 class="price">Harga: <span>Rp{{ $barang ->harga }}</span></h4>
                    <h4 class="price">Jumlah Tersedia <span>{{ $barang ->jumlah }}</span></h4>

                    {{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
                   
                    <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                    <h4 class="mt-3">Komentar</h4>
                    @forelse ($barang->review as $item)

                    <div class="d-flex mt-1 border border-dark">
                      {{-- <div class="flex-shrink-0 ">
                          <img src="{{asset('image/' .$barang->review->user_id->foto)}}" alt="Sample Image" id="profileImage">
                      </div> --}}
                      <div class="flex-grow-1 ms-2 mr-1" >
                          <h5>{{$item->user->name}} <small class="text-muted"><i style="margin-right:8px;">Last Update {{$item->updated_at}}</i></small></h5>
                          <p id="komentar">{{Str::limit($item->komentar,150)}}</p>
                          <form action="/review/{{$item->id}}" method="POST">
                          <div class="action  justify-content-end d-none d-lg-flex ms-2 mb-1">
                              @csrf
                              @method('delete')
                              <a class="btn-sm-square bg-secondary rounded-circle" style="margin-right: 8px;" href="/review/{{$item->id}}">
                                <small class="fa fa-eye" style="color:#eee"></small></a>
                                @if (Auth::user()->id == $item->user->id)
                                    
                                <a class="btn-sm-square bg-primary  rounded-circle" style="margin-right: 8px;" href="/review/{{$item->id}}/edit" >
                                  <small class="fa fa-edit" style="color:#eee"></small></a>
                                  <button type="submit" class="btn-sm-square rounded-circle" style="margin-right: 8px; background-color: #b8140f">
                                    <small class="fa fa-trash" style="color:#eee"></small></button>
                                @endif
                                  </div>
                                </form>
                      </div>
                  </div>

                    @empty
                        <h5>Tidak ada komentar</h5>
                    @endforelse
                    <hr>

                    <form action="/reviewBarang/{{$barang->id}}" method="POST">
                      @csrf
                      <textarea name="komentar" class="form-control my-2" cols="30" rows="10" placeholder="Tulis Review"></textarea>
                      @error('komentar')
                      <div class="alert alert-danger">
                        {{$message}}
                      </div>
                      @enderror
                      <input type="submit"class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
  
#profileImage{
  
  width: 120px;
  height: 160px
} 
p #komentar{
  width: 445px;
  height:72px
}

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */
</style>

@endsection