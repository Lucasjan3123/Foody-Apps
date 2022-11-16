@extends('layout.master')
@section('title')
Halamam Product 
@endsection 
@section('content title')
 @endsection

 @section('subtitle')

<h1 class="display-5 mb-3">Our Products</h1>
<p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                  
@endsection

@section('content')
<nav class="navbar navbar-light bg-light" >
    <form class="form-inline">
        <div class="row">
            <div class="col">
                <input class="form-control" style="width: 1200px" type="search" placeholder="Search" aria-label="Search">
                
            </div>
            <div class="col">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i>></i></button>
            </div>

        </div>
    </form>
  </nav>
<br>
<a class="btn btn-outline-primary border-2"  href='/Product/create'> Tambah</a>
<div class="row">
<div class="col" >
    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5" style="float: right">
        <li class ="nav-item me-2">
            <a class="btn btn-outline-primary border-2"  href='/Product'> Back</a>
        </li>
       
    </ul>
  
</div>
</div>
<div class="container-xxl py-5">
    <label style="font-weight: bold; font-size:50px;"  >{{ $kategori->nama }}</label><br><br>
    <div class="container">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @forelse ($kategori->barang as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $item ->kategori_id }}</div>
                                <img  src="{{ asset('image/' .$item ->foto) }}" alt="" width="500px" height="300px" >
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" >{{ $item ->nama }}</a>
                                <span class="text-primary me-1"> Rp{{ $item ->harga }} &ensp;</span>
                                <span class="text-primary me-1">Jumlah tersedia :{{ $item ->jumlah }}</span>

                            </div>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href="/Product/{{ $item->id }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                 <a  href='/Product/{{ $item->id }}/edit'class="btn btn-outline-warning border-2" >Edit </a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <form action="/kategori/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <input type="submit" value="Delete " class="btn btn-outline-danger border-2 " > 
                                    </form>
                            </small>
                        </div>
                    </div>
                    @empty
                    <h3>tidak ada Product lain</h3>  
                    @endforelse

                    
                </div>
            </div>
        </div>

    </div>
</div>
<br><br>
   

@endsection
