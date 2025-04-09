<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Sayt nomi')</title> {{-- FIXME --}}
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">
        <!-- Favicon -->
        <link href="{{asset('img/favicon.ico')}}" rel="icon">
        <!-- CSS Libraries -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link href="{{asset('lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
        <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                                <h1>{{ $settings->site_name ?? 'Default Site Name' }}</h1>
                                <!-- <img src="img/logo.jpg" alt="Logo"> -->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Ish vaqti</h3>
                                        <p>{{ $settings->working_hours ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Telfon raqamimiz</h3>
                                        <p>{{ $settings->phone_number ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email manzilimiz</h3>
                                        <p>{{ $settings->email ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav me-auto">
                            <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Bosh sahifa</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link {{ Route::is('about') ? 'active' : '' }}">Biz haqimizda</a>
                            <a href="{{ route('services') }}" class="nav-item nav-link {{ Route::is('services') ? 'active' : '' }}">Xizmatlarimiz</a>
                            <a href="{{ route('price') }}" class="nav-item nav-link {{ Route::is('price') ? 'active' : '' }}">Tariflarimiz</a>
                            <a href="{{ route('location') }}" class="nav-item nav-link {{ Route::is('location') ? 'active' : '' }}">Manzillarimiz</a>
                            <a href="{{ route('contact') }}" class="nav-item nav-link {{ Route::is('contact') ? 'active' : '' }}">Biz bilan aloqa</a>
                        </div>

                        <div class="custom-dropdown hidden sm:inline-block ms-6">
                            <button onclick="toggleDropdown()" class="custom-dropdown-button">
                                {{ Auth::user()->name }}
                            </button>
                            <div id="dropdownContent" class="custom-dropdown-content">
                                <a href="{{ route('user_profile.index') }}">Balans</a>
                                <a href="{{ route('user_profile.edit') }}">Yangilash</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Chiqish</button>
                                </form>
                            </div>
                        </div>
             
                        
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <main>
            @yield('content')
        </main>

             <!-- Footer Start -->
             <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-contact">
                                <h2>Bizning manzillar</h2>
                                <p><i class="fa fa-map-marker-alt"></i> {{ $settings->address ?? 'N/A' }}</p>
                                <p><i class="fa fa-phone-alt"></i> {{ $settings->phone_number ?? 'N/A' }}</p>
                                <p><i class="fa fa-envelope"></i> {{ $settings->email ?? 'N/A' }}</p>
                                <div class="footer-social">
                                    <a class="btn" href="{{$settings->instagram_url ?? ''}}"><i class="fab fa-twitter"></i></a>
                                    <a class="btn" href="{{$settings->instagram_url ?? ''}}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn" href="{{$settings->instagram_url ?? ''}}"><i class="fab fa-youtube"></i></a>
                                    <a class="btn" href="{{$settings->instagram_url ?? ''}}"><i class="fab fa-instagram"></i></a>
                                    <a class="btn" href="{{$settings->instagram_url ?? ''}}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-link">
                                <h2>Popular Links</h2>
                                <a href="">Biz haqimizda</a>
                                <a href="">Biz bilan aloqa</a>
                                <a href="">Xizmatlar</a>
                                <a href="">Manzillarimiz</a>
                                <a href="">Tariflarimiz</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-link">
                                <h2>Useful Links</h2>
                                <a href="">Terms of use</a>
                                <a href="">Privacy policy</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-newsletter">
                                <h2>Newsletter</h2>
                                <form>
                                    <input class="form-control" placeholder="Full Name">
                                    <input class="form-control" placeholder="Email">
                                    <button class="btn btn-custom">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Footer End -->
            
            <!-- Back to top button -->
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
            
            <!-- Pre Loader -->
            <div id="loader" class="show">
                <div class="loader"></div>
            </div>
    
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script src="//unpkg.com/alpinejs" defer></script>

            
            <script src="{{asset('lib/easing/easing.min.js')}}"></script>
            <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
            <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
            <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    
            <!-- Template Javascript -->
            <script src="{{asset('js/main.js')}}"></script>
            <script>
                function toggleDropdown() {
                    const dropdown = document.getElementById('dropdownContent');
                    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
                }
            
                // Dropdownni tashqarisiga bosilganda yopish
                document.addEventListener('click', function(event) {
                    const dropdown = document.getElementById('dropdownContent');
                    const button = document.querySelector('.custom-dropdown-button');
                    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.style.display = 'none';
                    }
                });
            </script>
            

            @stack('scripts')
        </body>
    </html>