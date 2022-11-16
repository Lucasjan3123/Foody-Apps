@extends('layout.master')
@section('title')
Welcome 
@endsection 
@section('content title')
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam est provident voluptas facere quae. Exercitationem magnam, quo id sunt dolorem, facere possimus vero amet dolores aut reprehenderit, quisquam at iure.  SanberBook
 @endsection
 @section('subtitle')
 

  Home


 @endsection
 

@section('content')
<br><br>
<div class=" mx-auto  text-start mb-5 " data-wow-delay="0.1s" >
  <h1 class="display-5 mb-3">kategori</h1>
  <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
   </div>
   <br><br>
<div class="container">
  <div class="row">

      @forelse ($kategori as $item)
          <div class="col-3">
            <div class="card" >
              <img src="{{ asset('image/' .$item ->fotoBackground) }}" class="card-img-top" alt="" width="300px" height="200px">
                <div class="card-body">
                    <a href ="/Product/filter/{{ $item ->id }}" style="font-size:x-large;color:black; " class="card-title stretched-link">{{ $item->nama }}</a>
                    
                  </div>
                </div>
                <div class="row mt-3">
                  <form action="/kategori/{{ $item->id }}" method="POST">
                    @csrf
                    @method('delete')
                  <input type="submit" value="Delete Per Kategori" class="btn btn-danger btn-sm " > 
                    </form>

                </div>
            
            <br><br><br><br>
          </div>  
    
                
      @empty
        <h3>tidak ada kategori lain</h3>  
      @endforelse
              
 </div>
</div>
<br><br>
<div class="  text-start mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" >
<h1 class="display-5 mb-3">Our Products</h1>
<p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
</div>
<br><br>              
<br>
<div class="row">
<div class="col" >
    @forelse ($kategori as $item)
    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5" style="float: right">
        <li class ="nav-item me-2">
            <a class="btn btn-outline-primary border-2"  href='/Product/filter/{{ $item ->id }}'> {{ $item ->nama }}</a>
        </li>
       
    </ul>
        
    @empty
        
    @endforelse
</div>
</div>
<div class="container-xxl py-5">
    <label style="font-weight: bold; font-size:50px;"  >All Kategori</label><br><br>
    <div class="container">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @forelse ($barang as $item)
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
                            <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                    <a class="text-body" href="/Product/{{ $item->id }}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                </small>
                                <small class="w-50 text-center py-2">
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <input type="hidden" value="{{ $item->nama }}" name="name">
                                        <input type="hidden" value="{{ $item->harga }}" name="price">
                                        <input type="hidden" value="{{$item ->foto }}"  name="foto">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="text-body"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</button>
                                    </form>
                                    
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







