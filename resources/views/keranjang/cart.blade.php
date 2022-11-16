@extends('layout.master')
@section('title')
Halamam Product 
@endsection 
@section('content title')
 @endsection

 @section('subtitle')

<h1 class="display-5 mb-3">Our Products</h1>
<p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                  
@endsection

@section('content')



  <main class="my-8">
      <div class="container ">
          <div class="flex justify-center my-6">
              <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div> 
                @endif
                  <h3 class="text-3xl text-bold">Cart List</h3> <br>
                  <a href="/home" class="btn btn-primary" style="color: white; float: right; margin-right:30px;">back </a>
                  <a href="/Product" class="btn btn-primary" style="color: white; float: right; margin-right:30px;">Tambah list </a>

                
                <div class="flex-1">
                  <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                      <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <th class="text-left">Name</th><br>
                        <th class="text-left">ID Barang</th><br>
                        <th class="pl-5 text-left lg:text-right lg:pl-0">
                          <span class="hidden lg:inline">Quantity</span>
                        </th>
                        <th class="hidden text-right md:table-cell"> price</th> 
                        <th></th>
                        <th class="hidden text-right md:table-cell">Remove </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                      <tr >
                        <td class="hidden pb-4 md:table-cell">
                          <a href="#" >
                            <img src="{{asset("image/" .$item->attributes->foto )}}"   alt="Thumbnail" style="width: 300px; height:300px">
                          </a>
                        </td>
                        <td>
                          <a href="#">
                            <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                            
                          </a>
                        </td>
                        <td>
                          <a href="#">
                            <input type="text" readonly name="barang_id" value="{{ $item->id }}">
                          </a>
                        </td>
                        
                        <td class="justify-center mt-6 md:justify-end md:flex">
                          <div class="h-10 w-28">
                            <div class="relative flex flex-row w-full h-8">
                              
                              <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id}}" >
                              <input type="number" name="quantity" value="{{ $item->quantity }}" 
                              class="w-6 text-center bg-gray-300" />
                              <button type="submit" class="btn btn-primary" style="color: white">update</button>
                              </form> 
                              </form> 
                            </div>
                          </div>
                        </td>
                        <td class="hidden text-right md:table-cell">
                          <span class="text-sm font-medium lg:text-base">
                              ${{ $item->price }}
                          </span>
                        </td>
                        <td>
                        </td>
                        <td class="hidden text-right md:table-cell">
                          <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="btn btn-warning" style="color:black">x</button>
                        </form>
                          
                        </td>
                      </tr>
                      @endforeach
                       
                    </tbody>
                  </table>
                  <div>
                   Total: ${{ Cart::getTotal() }}
                  </div>
                  <div>
                    <form action="{{ route('cart.clear') }}" method="POST">
                      @csrf
                      <button class="btn btn-danger " style="color:black;" >Remove All Cart</button>
                    </form>
                  </div>
  
                
                </form>
  
                </div>
              </div>
            </div>
      </div>
  </main>
          
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
