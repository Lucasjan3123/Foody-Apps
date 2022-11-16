@extends('layout.master')

@section('judul')
      menambahkan transaksi
@endsection

@section('content')
        <div class="row">
          <div class="col-md-8">
            <div class="card text-left">
              <h6 class="card-header">Alamat pengiriman</h6>
              <div class="card-body">
                <p class="card-text" style="font-size: 80%">Jln bangbayang timur gang regol no 05 Rt 05 Rw 08 samping toko tari atau dekat pabrik tempe · Sekeloa, Coblong, Kota Bandung, Jawa Barat.</p>
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Ubah alamat pengiriman
                </button>
              </div>
            </div> <br> 
            <div class="card">
              <div class="card-header">
                 <h6>pesanan 1 dari 1</h6>
              </div>
              <div class="card-body">
                <p class="card-title" style="font-size: 75%">Pilihan Pengiriman</p>  <br>
                <div class="card border-success mb-3" style="max-width: 18rem;">
                  <div class="card-body text-success">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Rp.10.000 <br>
                      Standar Estimasi tiba ....
                    </button>
                  </div>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="{{asset('apel.jpg')}}" alt="..." style="width: 100%">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="card-text">If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.</p>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card">
              <a href="#" class="btn btn-primary">Buat pesanan sekarang</a> <br>
              <h6 class="card-header">pilih metode pengiriman</h6>
              <div class="card-body">
              </div>
            </div>
            
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            
         </div>
        </div>

            <div class="card mb-3" style="max-width: 540px;">
              
            </div>
@endsection