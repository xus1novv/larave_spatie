@extends('base.base')

@section('title','About')

@section('content')
    <body>
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Biz haqimizda</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/about.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>Biz haqimizda</p>
                            <h2>{{$about->title}}</h2>
                        </div>
                        <div class="about-content">
                            <p>
                                {{$about->description}}
                            </p>
                            <ul>
                                <li><i class="far fa-check-circle"></i>Tashqi tozalash</li>
                                <li><i class="far fa-check-circle"></i>Ichki tozalash</li>
                                <li><i class="far fa-check-circle"></i>O'rindiqlarni yuvish</li>
                                <li><i class="far fa-check-circle"></i>G'ildiraklarni tozalash</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
        
        <!-- Facts Start -->
        <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->service_points}}</h3>
                                <p>Manzillarimiz soni</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-user"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->engineers_workers}}</h3>
                                <p>Muhandis va ishchilar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-users"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->happy_clients}}</h3>
                                <p>Hursand mijozlarimiz</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-check"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->projects_completed}}</h3>
                                <p>Bajarilgan loyihalar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->


        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Bizning jamoa</p>
                    <h2>Bizning muhandis va ishchilarimiz</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-1.png" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Elomon Jumanazarov</h2>
                                <p>Muhandis</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-1.png" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Odiljonov Maqsadbek</h2>
                                <p>Muhandis</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-1.png" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Xusinov Og'abek</h2>
                                <p>Ishchi</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-1.png" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Allanazarov Mirzohid</h2>
                                <p>Ishchi</p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

<!-- Our Works Start -->
<div class="our-works py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <p class="text-uppercase text-primary mb-2 fw-semibold animate__animated animate__fadeIn">Bizning ishlarimiz</p>
            <h2 class="display-5 fw-bold text-dark animate__animated animate__fadeIn" style="letter-spacing: 1px;">Bajarilgan loyihalarimiz</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @if ($works && $works->isNotEmpty())
                @foreach ($works as $work)
                    <div class="col">
                        <div class="work-item bg-white rounded shadow-lg overflow-hidden">
                            <div class="row g-0">
                                <!-- Tozalanmagan holati (Before) -->
                                <div class="col-6 work-img position-relative overflow-hidden">
                                    <img src="{{ $work->before_image ? asset('storage/' . $work->before_image) : asset('img/work-default.jpg') }}" alt="{{ $work->title }} Before" class="img-fluid w-100" style="object-fit: cover; height: 200px; transition: transform 0.5s ease;">
                                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5); opacity: 0; transition: opacity 0.5s ease;">
                                        <a href="{{ $work->before_image ? asset('storage/' . $work->before_image) : asset('img/work-default.jpg') }}" data-lightbox="work-image-{{ $work->id }}-before" class="text-white fs-3">
                                            <i class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 w-100 text-center text-white bg-dark bg-opacity-75 py-1">
                                        Tozalanmagan holati
                                    </div>
                                </div>
                                <!-- Tozalangan holati (After) -->
                                <div class="col-6 work-img position-relative overflow-hidden">
                                    <img src="{{ $work->after_image ? asset('storage/' . $work->after_image) : asset('img/work-default.jpg') }}" alt="{{ $work->title }} After" class="img-fluid w-100" style="object-fit: cover; height: 200px; transition: transform 0.5s ease;">
                                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5); opacity: 0; transition: opacity 0.5s ease;">
                                        <a href="{{ $work->after_image ? asset('storage/' . $work->after_image) : asset('img/work-default.jpg') }}" data-lightbox="work-image-{{ $work->id }}-after" class="text-white fs-3">
                                            <i class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 w-100 text-center text-white bg-dark bg-opacity-75 py-1">
                                        Tozalangan holati
                                    </div>
                                </div>
                            </div>
                            <div class="work-text text-center p-4">
                                <h3 class="h5 fw-semibold text-dark">{{ $work->title }}</h3>
                                <p class="text-muted">{{ $work->description ?? 'Tavsif mavjud emas.' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center text-muted py-4">
                    <p>Hozirda loyihalar mavjud emas.</p>
                </div>
            @endif
        </div>
    </div>
</div>
    </body>
@endsection