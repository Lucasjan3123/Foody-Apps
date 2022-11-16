@extends('layout.master')
@section('title')
Welcome 
@endsection 
@section('content title')
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam est provident voluptas facere quae. Exercitationem magnam, quo id sunt dolorem, facere possimus vero amet dolores aut reprehenderit, quisquam at iure.  SanberBook
 @endsection

 @section('subtitle')
   Kategori
 @endsection

@section('content')
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
      <ul class="nav nav-pills d-inline-flex justify-content-end mb-5" style="float:right">
          <li class="nav-item me-2">
            <a class="btn btn-outline-primary border-2"  href='/kategori/create'> Tambah</a>
          </li>
          <li class="nav-item me-2">
            <a  href='/kategori/{{ $item->id }}/edit'class="btn btn-outline-warning border-2" >Edit </a>
          </li>
          <li class="nav-item me-0">
            <form action="/kategori/{{ $item->id }}" method="POST">
              @csrf
              @method('delete')
            <input type="submit" value="Delete " class="btn btn-outline-danger border-2 " > 
              </form>
          </li>
      </ul>

@endsection