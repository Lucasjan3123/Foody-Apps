@extends('layout.master')
@section('title')
<h1>Halaman Edit Kategori </h1>
@endsection 
@section('content title')
 @endsection

 @section('subtitle')
 Edit Kategori 
 @endsection

@section('content')

<div>
   
    <form action="/kategori/{{$kategori->id}}"method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" value="{{$kategori->nama}}"name="nama"  placeholder="Masukkan Title">
                @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label >foto background</label>
                    <input type="file" class="form-control" name="fotoBackground"  >
                    @error('fotoBackgrorund')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>    
                
            <button type="submit" class="btn btn-primary">Update</button>
        <a href="/kategori" class="btn btn-secondary btn-sm">back</a>

        </form>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    @endsection