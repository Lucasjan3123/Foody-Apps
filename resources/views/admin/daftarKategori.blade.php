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
  
  Swal.fire({
    title:'Apakah ingin menghapus Kategori ?',
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
         'Your category has been deleted.',
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
            <th>Nama Kategori</th>
            <th>jumlah Barang</th>
            
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">

            @forelse ($kategori as $key=>$category)
            {{-- @foreach ($profiles as $profile) --}}

            <tr>
              <td>{{$key+1}}</td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$category->nama}}</strong></td>
              <td>{{$category->barang->count()}}</td>
              {{-- <td>{{$profile->no_telpon}}</td> --}}            
              <td>
                
                <form action="/kategori/{{ $category->id }}" method="POST" id="hapus">
                  @csrf
                  @method('delete')
                  <a href="/kategori/create" class="btn btn-outline-primary">Tambah</a>
                  <a href="/kategori/{{ $category->id }}/edit" class="btn btn-outline-primary">Edit</a>                        
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
