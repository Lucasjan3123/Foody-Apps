@extends('layout.master')
@section('title')
{{$review->barang->nama}}
@endsection 

@section('content')
<p>

    {{$review->komentar}}
</p>
<div class="action">
    <a href="/Product/{{$barang}}"class="add-to-cart btn btn-dark">Kembali</a> 
</div>
@endsection