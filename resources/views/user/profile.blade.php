@extends('layout.master')
@section('title')
    Profile {{$user->name}}
@endsection
@section('subtitle')
    Form Detail User
@endsection
@push('styling')
   
@endpush
@section('content')
<div class="card my-1" style="width: 10rem;">
  <img src="{{ asset('image/' .$foto) }}" class="card-img-top" alt="...">
</div>
<div class="row">
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form</h5>
      </div>
      
      
      <div class="card-body">
            
        <form method="POST" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="{{$user->name}}" />
                    @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
              </div>
            </div>
          
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="email" class="form-control " name="email" value="{{$user->email}}" />
                  @error('email')
                  <div class="alert alert-danger">
                     {{ $message }}
                 </div>
                  @enderror
               </div>
              </div>
          </div>
          <div class="row mb-3">
             <label class="col-sm-2 col-form-label" >Role</label>
             <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <input type="text"  class="form-control" name="peran" value="{{$user->role}}" readonly/>
                 </div>
             </div>
          </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">No Telpon</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control phone-mask" name="no_hp" value="{{$no_telpon}}"/>
                  @error('no_hp')
                  <div class="alert alert-danger">
                      {{ $message }}
                  </div>
                   @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" >Jenis Kelamin</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select" name="jenis_kelamin">
                      <option value="{{$jenisKelamin}}">--{{$jenisKelamin}}--</option>
                      <option value="laki_laki">Laki-Laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Foto profile</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="foto_profile"/>
              @error('fotoProfile')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
               @enderror
            </div>
          </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="address">{{$alamat}}</textarea>
                @error('address')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                 @enderror
              </div>
            </div>
            {{-- Ganti Password --}}
            {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="password">Password Baru</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control"/>
                 </div>
                </div>
            </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-email">Ulangi Password Baru</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input type="text" id="basic-default-email" class="form-control @error('password') is-invalid @enderror" name="password">

                    <span class="invalid-feedback" role="alert">
                    @error('password')
                        <span>{{ $message }}</span>
                    </span>
                    @enderror
                 </div>
                </div>
            </div> --}}
            <div class="row justify-content-end">
              <div class="col-sm-10">
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