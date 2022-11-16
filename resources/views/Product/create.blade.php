@extends('layout.master')
@section('title')
Add Product 
@endsection 
@section('content title')
 @endsection

 @section('subtitle')
 Add Product
 @endsection

@section('content')

<form action="/Product" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="form-group col-md-6">
        <label >Nama</label><br><br>
        <input type="text" name="nama" class="form-control">
        @error('nama')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
      </div>
        <div class="form-group col-md-6">
            <label >Jumlah</label><br><br>
                <div class="input-group">
                    <span class="input-group-btn">
                        <input type="button" class="btn btn-danger btn-number"  value="-" data-type="minus" data-field="jumlah"/>
                        <span class="glyphicon glyphicon-minus"></span>
                        </button>
                    </span>
                    <input type="text" name="jumlah" class="form-control input-number" value="10" min="1" max="100000">
                    <span class="input-group-btn">
                        <input type="button" class="btn btn-success btn-number" value="+" data-type="plus" data-field="jumlah"/>
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
        </div>
        
    </div>
            <div class="form-group mt-2">
                <label >Harga</label> <br><br>
                <input type="text" name="harga" class="form-control " style="width: 500px " >
                @error('harga')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mt-3">
                <div class="form-group col-md-4">
                    <label >Foto</label><br><br>
                    <input type="file" name="foto" class="form-control" >
                    @error('foto')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label >Kategori </label><br><br>
                    <select name="kategori_id" class="form-control" wire:model="kategori_id">
                    <option selected>...Pilih kategori...</option>
                    @forelse ($kategori as $item)
                        <option value="{{ $item ->id }}">{{ $item ->nama }}</option>
                    @empty
                    
                    <option>Tidak ada kategori di table kategori </option>
                    @endforelse
                    </select>
                    <br><br><br>
                </div>
           </div>
    

  
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
  <style>
    .center{
        width: 150px;
        margin: 40px auto;
    }
    
  </style>
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
