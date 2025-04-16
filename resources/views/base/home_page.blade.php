@extends('base.base')
@section('title', 'Home Page')

@section('content')
    <body>
        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-1.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Tozalash & Bezash</h3>
                            <h1>Avtomobilingizni yangiroq saqlang</h1>
                            <p>
                                Avtomobilingiz uchun tozalash va bezash xizmatlarimiz orqali unga yangi ko‘rinish bering. Biz sifatli vositalar va tajribali mutaxassislar bilan xizmat ko‘rsatamiz.
                            </p>
                            <a class="btn btn-custom" href="">Ko'rish</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Tozalash & Bezash</h3>
                            <h1>Siz uchun sifatli xizmat</h1>
                            <p>
                                Har bir mijozimiz uchun individual yondashuv. Sizga qulay va ishonchli avtomobil xizmatlarini taqdim etamiz.
                            </p>
                            <a class="btn btn-custom" href="">Ko'rish</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Tozalash & Bezash</h3>
                            <h1>Tashqi va ichki qismlarni yuvish</h1>
                            <p>
                                Biz tashqi va ichki tozalashda eng yangi texnologiyalardan foydalanamiz. Sizning qulayligingiz va avtomobilingiz sarchasligi biz uchun muhim.
                            </p>
                            <a class="btn btn-custom" href="">Ko'rish</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

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
                            <a class="btn btn-custom" href="{{route('about')}}">Kirish</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
<!-- Service Start -->
<div class="service py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <p class="text-uppercase text-secondary mb-2">Biz nima qilamiz?</p>
            <h2 class="display-5 fw-bold text-dark">Premium tozalash servislari</h2>
        </div>

        <!-- Services Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @if ($services && $services->isNotEmpty())
                @foreach ($services as $service)
                    <div class="col">
                        <a href="{{ route('services') }}" class="text-decoration-none">
                            <div class="service-item bg-white rounded shadow p-4 text-center h-100 transition-all" style="transition: all 0.3s ease;">
                                <div class="mb-3">
                                    <!-- Bootstrap Icon o‘rniga Flaticon yoki Font Awesome ishlatish mumkin -->
                                    <i class="flaticon-car-wash text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h3 class="h5 fw-semibold text-dark mb-2">{{ $service->name }}</h3>
                                <p class="text-muted text-truncate-3-lines">{{ $service->description ?? 'No description available' }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center text-muted py-4">
                    <p>No services available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Custom CSS for hover effect and text truncation -->
            <style>
                .service-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
                }
                .text-truncate-3-lines {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
                .transition-all {
                    transition: all 0.3s ease;
                }
            </style>
        <!-- Service End -->
        
        
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
        
        
        <!-- Price Start -->

        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Obuna Rejalari</p>
                    <h2>Rejalardan birini tanlang va shuncha muddat xizmatlarimizdan foydalanish bepul</h2>
                </div>
        
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <div class="row">
                    @foreach($plans as $plan)
                        <div class="col-md-4">
                            <div class="price-item">
                                <div class="price-header">
                                    <h3>{{ $plan->name }}</h3>
                                    <h2><span></span><strong>{{ floor($plan->price) }}</strong><span>.{{ sprintf("%02d", ($plan->price - floor($plan->price)) * 100) }}</span></h2>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i>Davomiylik: {{ $plan->duration_months }} oy</li>
                                    </ul>
                                </div>
                                <div class="price-footer">
                                    <form action="{{ route('subscribe.user') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        
                                        <div class="mb-2 text-start">
                                            <label for="car_model_{{ $plan->id }}" class="form-label">Mashina modeli</label>
                                            <input type="text" id="car_model_{{ $plan->id }}" name="car_model" class="form-control" placeholder="Masalan: Malibu, Nexia" required>
                                        </div>
        
                                        <div class="mb-2 text-start">
                                            <label for="car_number_{{ $plan->id }}" class="form-label">Mashina raqami</label>
                                            <input type="text" id="car_number_{{ $plan->id }}" name="car_number" class="form-control" placeholder="Masalan: 01A123BC" required>
                                        </div>
        
                                        <button type="submit" class="btn btn-custom">Obuna bo'lish</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Price End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-header text-left">
                            <p>Bizning joylashgan joyimiz</p>
                            <h2>Avtomobil yuvish va parvarishlash punktlari</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Bizning joylashgan joyimiz</h3>
                                        <p>15 uy, Mustaqillik ko'cha, Urganch sh</p>
                                        <p><strong>Tel:</strong>+998934456568</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->


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
        
        
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header text-center">
                    <p>Fikrlar</p>
                    <h2>Bizning mijozlarimiz nima deyishadi</h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="img/testimonial-1.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Akbarjon M</h3>
                            <h4>Doimiy mijozimiz</h4>
                            <p>
                                Avtomoyka xizmati juda yaxshi. Mashinamni to'liq yuvib berishdi va ichki qismini ham toza qilishdi. Narxi ham maqbul                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-2.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Dilnoza R</h3>
                            <h4>Doimiy mijozimiz</h4>
                            <p>
                                Yangi xizmatni sinab ko'rishga qaror qildim, juda mamnunman. Tashqi va ichki yuvish juda sifatli amalga oshirilgan. Taklif qilaman!                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-3.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Jamshid T</h3>
                            <h4>Doimiy mijozimiz</h4>
                            <p>
                                Premium xizmatni tanladim, va natija juda a'lo darajada. Mashinamda hech qanday dog' qolmadi. Yuqori sifat, tavsiya qilaman.                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-4.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Olim B</h3>
                            <h4>Doimiy mijozimiz</h4>
                            <p>
                                Avtomoykaning xizmatlari juda mukammal. Mashinamni har safar shu yerda tozalataman. Xizmat hamda narxlar juda maqbul.                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

    </body>

@endsection