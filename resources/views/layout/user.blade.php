<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href={{ asset("/foody2-1.0.0/lib/animate/animate.min.css") }} rel="stylesheet">
<link href={{ asset("/foody2-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css") }} rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href={{ asset("/foody2-1.0.0/css/bootstrap.min.css") }} rel="stylesheet">
{{-- http://127.0.0.1:8000/foody2-1.0.0/img/carousel-1.jpg --}}
<!-- Template Stylesheet -->
<link href={{ asset("/foody2-1.0.0/css/style.css") }} rel="stylesheet">

{{-- batas styling --}}

    {{-- <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link">Home</a>
                <a href="/Product" class="nav-item nav-link">Products</a>
                <a href="/kategori" class="nav-item nav-link">Kategori</a>
                <a href="about.html" class="nav-item nav-link">About Us</a>
            </div>
            <div class="d-none d-lg-flex ms-1">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a>
                <div class="nav-item dropdown">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="#" data-bs-toggle="dropdown">
                        <small class="fa fa-user text-body"></small></a>
                        <div class="dropdown-menu mt-1">
                            <a href="testimonial.html" class="dropdown-item">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>
                </div>
            </div>
        </div>
    </nav> --}}
    @include('layout.navbar')

{{-- Content --}}
<div class="container-fluid page-header" id="body-content">
    <div class="container">
        @yield('content')
    </div>
</div>

{{-- Batas script --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src={{ asset("/foody2-1.0.0/lib/wow/wow.min.js") }}></script>
<script src={{ asset("/foody2-1.0.0/lib/easing/easing.min.js") }}></script>
<script src={{ asset("/foody2-1.0.0/lib/waypoints/waypoints.min.js") }}></script>
<script src={{ asset("/foody2-1.0.0/lib/owlcarousel/owl.carousel.min.js") }}></script>

<!-- Template Javascript -->
<script src={{ asset("/foody2-1.0.0/js/main.js") }}></script>