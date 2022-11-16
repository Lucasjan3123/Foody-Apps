<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    {{-- <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
    </div> --}}
    <nav class="navbar navbar-expand-lg navbar-light pt-lg-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/home" class="nav-item nav-link">Home</a>
                    
                <a href="/Product" class="nav-item nav-link">Products</a>
                

                @if(Auth::check()&&Auth::user()->role == 'Admin')
                <div class="nav-item dropdown">
                    <a class="nav-item nav-link" href="#" data-bs-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu mt-0">
                            <a href="/kategori" class="nav-item nav-link">Kategori</a>
                            <a href="/kategori/create" class="nav-item nav-link">Tambah Kategori</a>
                            </div>
                        </a>
                    </div> 
                    <a href="/user" class="nav-item nav-link">Daftar User</a>   
                @endif
                <a class="nav-item nav-link" href="#" data-bs-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu mt-0">
                            <a href="/kategori" class="nav-item nav-link">Kategori</a>
                            <a href="/kategori/create" class="nav-item nav-link">Tambah Kategori</a>
                            </div>
                        </a>
                    </div> 
                <a href="{{ route('cart.list') }}"class="nav-item nav-link">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    {{ Cart::getTotalQuantity()}}
                </a>
                {{-- <a href="contact.html" class="nav-item nav-link">Contact Us</a> --}}
                @if (Auth::check())
                <div class="d-none d-lg-flex ms-1">
                    <div class="nav-item dropdown">
                        <a class="nav-item nav-link" href="#" data-bs-toggle="dropdown">
                            <small class="fa fa-user text-body"></small></a>
                            <div class="dropdown-menu mt-1">
                                <a href="/profile/{{Auth::user()->id}}/edits" class="dropdown-item">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Log Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </a>
                        </div>
                    </div>
                    @else
                    <a href="/login" class="nav-item nav-link">Login</a>    
                    @endif

            </div>
            {{--  --}}
        </div>
    </nav>
</div>