@extends('layout.master')
@section('title')
Add Kategori 
@endsection 
@section('content title')
 @endsection

 @section('subtitle')
 Add Kategori 
 @endsection

@section('content')

<div>
    <h2>Tambah kategori</h2>
    <form action="/kategori" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="nama"  placeholder="Masukkan Title">
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
                
            <button type="submit" class="btn btn-primary">Tambah</button>
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