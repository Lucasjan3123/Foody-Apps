@extends('layout.admin')
@push('styling')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/sc-2.0.7/datatables.min.css"/>
@endpush
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/sc-2.0.7/datatables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
  
  function hapus(){
    event.preventDefault();
    var form = event.target.form;
  
    Swal.fire({
    title:'Apakah ingin menghapus user ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus!',
   }).then((result) => {
     if (result.isConfirmed) {
       form.submit();
       Swal.fire(
         'Deleted!',
         'Your file has been deleted.',
         'success'
         )
        }
      });
    }
  </script>

@endpush
@section('judul')
    Daftar User
@endsection
@section('content')
<!-- Bootstrap Table with Header - Dark -->
<div class="card">
    <h5 class="card-header">Table User</h5>
    <div class="table-responsive text-nowrap">
      <table class="table" id="table_id">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">

            @forelse ($users as $key=>$user)
            {{-- @foreach ($profiles as $profile) --}}

            <tr>
              <td>{{$key+1}}</td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->name}}</strong></td>
              <td>{{$user->email}}</td>
              {{-- <td>{{$profile->no_telpon}}</td> --}}
              @if (!$user->role)
              <td><span class="badge bg-label-danger me-1">Tidak Memiliki role</span></td>
              @else
              <td><span class="badge bg-label-primary me-1">{{$user->role}}</span></td>
              @endif
              <td>
                
                <form action="/user/{{$user->id}}" method="POST" id="hapus">
                  @csrf
                  @method('delete')
                    <a href="/user/{{$user->id}}/edit" class="btn btn-outline-primary">Edit</a>
                    <button type="submit" class="btn btn-outline-danger" onclick="hapus()">Delete</button>
                </form>
              
                  </td>
            </tr>
            {{-- @endforeach  --}}
            @empty
                Tidak Ada Data User 
            @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
