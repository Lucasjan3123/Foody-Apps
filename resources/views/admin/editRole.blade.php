@extends('layout.admin')
@section('nav')
    Edit Role User {{$user->name}}
@endsection
@section('judul')
    Detail User
@endsection
@section('content')
<div class="row">
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5>
      </div>
      {{-- @forelse ($user as $user) --}}
      
      <div class="card-body">
            
        <form method="POST" action="/user/{{$user->id}}">
            @csrf
            @method('put')
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control text-muted" id="basic-default-name" readonly value="{{$user->name}}" />
              </div>
            </div>
          
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" id="basic-default-email" class="form-control " readonly value="{{$user->email}}"/>
               </div>
              </div>
          </div>
          <div class="row mb-3">
             <label class="col-sm-2 col-form-label">Role</label>
             <div class="col-sm-10">
             <select class="form-select" aria-label="Default select example" name="role">
              
              <option value="{{$user->role}}">--{{$user->role}}--</option>
              <option value="admin">Admin</option>
              <option value="penjual">Penjual</option>
              <option value="pembeli">Pembeli</option>              
               </select>
             </div>
          </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label text-muted" for="basic-default-phone">No Telpon</label>
              <div class="col-sm-10">
                <input type="text" id="basic-default-phone" class="form-control phone-mask" readonly name="no_telpon" value="{{$no_telpon}}"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label text-muted" for="basic-default-phone">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" id="basic-default-phone" class="form-control phone-mask" name="jenisKelamin" readonly value="{{$jenisKelamin}}"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label text-muted" for="basic-default-message" name="alamat">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" readonly>{{$alamat}}</textarea>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <a href="/user" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
          
        </div>
        {{-- @endforeach --}}
      {{-- @empty
       
      @endforelse --}}
    </div>
</div>
@endsection