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
                            <p>About Us</p>
                            <h2>{{$about->title}}</h2>
                        </div>
                        <div class="about-content">
                            <p>
                                {{$about->description}}
                            </p>
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum cleaning</li>
                                <li><i class="far fa-check-circle"></i>Interior wet cleaning</li>
                                <li><i class="far fa-check-circle"></i>Window wiping</li>
                            </ul>
                            <a class="btn btn-custom" href="{{route('about')}}">Learn More</a>
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
            <p class="text-uppercase text-secondary mb-2">What We Do?</p>
            <h2 class="display-5 fw-bold text-dark">Premium Washing Services</h2>
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
                                <p>Service Points</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-user"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->engineers_workers}}</h3>
                                <p>Engineers & Workers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-users"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->happy_clients}}</h3>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-check"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">{{$about->projects_completed}}</h3>
                                <p>Projects Completed</p>
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
                    <p>Washing Plan</p>
                    <h2>Choose Your Plan</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <h3>Basic Cleaning</h3>
                                <h2><span>$</span><strong>25</strong><span>.99</span></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>Window Wiping</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" href="">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price-item featured-item">
                            <div class="price-header">
                                <h3>Premium Cleaning</h3>
                                <h2><span>$</span><strong>35</strong><span>.99</span></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-times-circle"></i>Window Wiping</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" href="">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="price-item">
                            <div class="price-header">
                                <h3>Complex Cleaning</h3>
                                <h2><span>$</span><strong>49</strong><span>.99</span></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                    <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                    <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                    <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                </ul>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" href="">Book Now</a>
                            </div>
                        </div>
                    </div>
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
                            <p>Washing Points</p>
                            <h2>Car Washing & Care Points</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Car Washing Point</h3>
                                        <p>123 Street, New York, USA</p>
                                        <p><strong>Call:</strong>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Car Washing Point</h3>
                                        <p>123 Street, New York, USA</p>
                                        <p><strong>Call:</strong>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Car Washing Point</h3>
                                        <p>123 Street, New York, USA</p>
                                        <p><strong>Call:</strong>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Car Washing Point</h3>
                                        <p>123 Street, New York, USA</p>
                                        <p><strong>Call:</strong>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="location-form">
                            <h3>Request for a car wash</h3>
                            <form>
                                <div class="control-group">
                                    <input type="text" class="form-control" placeholder="Name" required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" placeholder="Email" required="required" />
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" placeholder="Description" required="required"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit">Send Request</button>
                                </div>
                            </form>
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
                    <p>Meet Our Team</p>
                    <h2>Our Engineers & Workers</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/team-1.png" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Donald John</h2>
                                <p>Engineer</p>
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
                                <h2>Adam Phillips</h2>
                                <p>Engineer</p>
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
                                <h2>Thomas Olsen</h2>
                                <p>Worker</p>
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
                                <h2>James Alien</h2>
                                <p>Worker</p>
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
                    <p>Testimonial</p>
                    <h2>What our clients say</h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="img/testimonial-1.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-2.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-3.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/testimonial-4.jpg" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

    </body>

@endsection