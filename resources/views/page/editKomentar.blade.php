@extends('layout.master')
@section('title')
Edit Komentar {{$review->barang->nama}}
@endsection 

@section('content')
<form method="POST" action="/review/{{$review->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Komentar</label>
        <textarea class="form-control"  rows="3" name="review">{{$review->komentar}}</textarea>
        @error('review')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row justify-content-start">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection