@extends('base.base')

@section('title', 'Profile')

@section('content')

<body>

    <div class="container py-5">
        <div class="profile-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Salom, {{ $user->full_name }} 👋</h2>
                    <p class="text-muted mb-0">Profilingizga xush kelibsiz!</p>
                </div>
                <div class="text-end">
                    <h5 class="text-success mb-0">Balans:</h5>
                    <p class="fs-4 fw-bold text-success">{{ number_format($wallet->balance, 2) }} so'm</p>
                </div>
            </div>
        </div>
    
        <div class="mb-3">
            <h4>📦 Buyurtmalarim</h4>
        </div>
    
        @if ($bookings->isEmpty())
            <div class="alert alert-info">Sizda hali hech qanday buyurtma mavjud emas.</div>
        @else
            <div class="row g-3">
                @foreach ($bookings as $booking)
                    <div class="col-md-6">
                        <div class="order-card">
                            <h5 class="mb-2">{{ $booking->service->name }}</h5>
                            <p class="mb-1"><strong>Status:</strong> 
                                <span class="badge 
                                    @if($booking->status == 'completed') bg-success 
                                    @elseif($booking->status == 'pending') bg-warning 
                                    @else bg-danger @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </p>
                            <p class="mb-0"><strong>Sanasi:</strong> {{ \Carbon\Carbon::parse($booking->booking_time)->format('d.m.Y - H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
        </body>

@endsection