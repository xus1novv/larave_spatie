@extends('base.base')

@section('title', 'Subscriptions')

@section('content')

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

@endsection