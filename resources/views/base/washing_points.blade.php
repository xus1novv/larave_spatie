@extends('base.base')
@section('title','Locations')

@section('content')

    <body>

        <div class="container py-5">
            <h2 class="mb-4">Xizmat tanlang va buyurtma bering</h2>
        
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        
            <form action="{{ route('buyurtma.store') }}" method="POST">
                @csrf
        
                <div class="mb-3">
                    <label class="form-label">Xizmatlar:</label><br>
                    @foreach ($services as $service)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="service_ids[]" value="{{ $service->id }}" id="service{{ $service->id }}">
                            <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }} ({{ $service->price }} so'm)</label>
                        </div>
                    @endforeach
                    @error('service_ids')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">Ism</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Familiya</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                </div>
        
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Telefon raqam</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>
        
                <div class="mb-3">
                    <label for="car_number" class="form-label">Avtomobil raqami</label>
                    <input type="text" class="form-control" name="car_number" required>
                </div>
        
                <div class="mb-3">
                    <label for="car_model" class="form-label">Avtomobil modeli</label>
                    <input type="text" class="form-control" name="car_model" required>
                </div>
        
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="booking_date" class="form-label">Sana</label>
                        <input type="date" class="form-control" name="booking_date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="booking_time" class="form-label">Vaqt (HH:MM)</label>
                        <input type="time" class="form-control" name="booking_time" required>
                    </div>
                </div>
        
                <button type="submit" class="btn btn-primary">Buyurtma berish</button>
            </form>
        </div>
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Washing Points</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Location</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
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
    </body>
@endsection