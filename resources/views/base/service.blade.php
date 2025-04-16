@extends('base.base')

@section('title', 'Service')

@section('content')
<div class="service py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-uppercase text-secondary mb-2">Biz nima qilamiz?</p>
            <h2 class="display-5 fw-bold text-dark">Premium tozalash servislari</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Xato xabari (yangi qo'shilgan qism) -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validatsiya xatolari -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            @if ($services && $services->isNotEmpty())
                @foreach ($services as $service)
                    <div class="col">
                        <div class="service-item bg-white rounded shadow p-4 text-center h-100 transition-all">
                            <div class="mb-3">
                                <i class="flaticon-car-wash text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="h5 fw-semibold text-dark mb-2">{{ $service->name }}</h3>
                            <p class="text-muted text-truncate-3-lines">{{ $service->description ?? 'No description available' }}</p>
                            <div class="d-flex justify-content-start">
                                <p class="fw-bold text-dark mt-2" style="font-size: 0.875rem;">Narxi: {{ $service->price ?? 'N/A' }} so'm</p>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="text-muted" style="font-size: 0.875rem;">Davomiyligi: {{ $service->duration ?? 'Unknown' }} min</p>
                            </div>
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#serviceModal{{ $service->id }}">
                                Buyurtma berish
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="serviceModal{{ $service->id }}" tabindex="-1" aria-labelledby="serviceModalLabel{{ $service->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="serviceModalLabel{{ $service->id }}">{{ $service->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <i class="flaticon-car-wash text-primary" style="font-size: 3rem;"></i>
                                    </div>
                                    <p>{{ $service->description ?? 'No description available' }}</p>
                                    @if ($service->price)
                                        <p class="mt-3"><strong>Price:</strong> {{ $service->price }} so'm</p>
                                    @endif
                                    @if ($service->duration)
                                        <p><strong>Duration:</strong> {{ $service->duration }} minutes</p>
                                    @endif

                                    <!-- Booking Form -->
                                    <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm{{ $service->id }}">
                                        @csrf
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        <input type="hidden" name="booking_time" id="booking_time_input{{ $service->id }}" required>

                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">Ism</label>
                                            <input type="text" name="first_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Familiya</label>
                                            <input type="text" name="last_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Telefon raqami</label>
                                            <input type="text" name="phone_number" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_number" class="form-label">Avtomobil raqami</label>
                                            <input type="text" name="car_number" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_model" class="form-label">Avtomobil modeli</label>
                                            <input type="text" name="car_model" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date_picker{{ $service->id }}" class="form-label">Sanani tanlang</label>
                                            <input type="text" class="form-control" id="date_picker{{ $service->id }}" placeholder="Sanani tanlang" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Vaqtni tanlang</label>
                                            <div id="time_buttons{{ $service->id }}" class="d-flex flex-wrap gap-2"></div>
                                            @error('booking_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Buyurtma berish</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
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

<!-- Custom CSS -->
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
    .flatpickr-calendar {
        z-index: 9999 !important;
    }
    .time-btn {
        width: 120px;
        padding: 8px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .time-btn.available {
        background-color: #28a745; /* Yashil */
        color: white;
    }
    .time-btn.booked {
        background-color: #dc3545; /* Qizil */
        color: white;
        cursor: not-allowed;
    }
    .time-btn.selected {
        background-color: #007bff; /* Ko‘k - tanlangan holat */
        color: white;
        border: 2px solid #0056b3; /* Qalinroq chegara */
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($services as $service)
            var modal{{ $service->id }} = document.getElementById('serviceModal{{ $service->id }}');
            var datePicker{{ $service->id }};

            modal{{ $service->id }}.addEventListener('shown.bs.modal', function () {
                document.getElementById('booking_time_input{{ $service->id }}').value = '';

                if (!datePicker{{ $service->id }}) {
                    datePicker{{ $service->id }} = flatpickr('#date_picker{{ $service->id }}', {
                        dateFormat: 'Y-m-d',
                        minDate: 'today',
                        defaultDate: new Date(),
                        onChange: function(selectedDates, dateStr) {
                            updateTimeButtons(dateStr, {{ $service->id }}, {{ $service->duration }});
                        }
                    });
                }

                updateTimeButtons(datePicker{{ $service->id }}.selectedDates[0].toISOString().split('T')[0], {{ $service->id }}, {{ $service->duration }});
            });

            modal{{ $service->id }}.addEventListener('shown.bs.modal', function () {
    document.getElementById('booking_time_input{{ $service->id }}').value = '';

    if (!datePicker{{ $service->id }}) {
        datePicker{{ $service->id }} = flatpickr('#date_picker{{ $service->id }}', {
            dateFormat: 'Y-m-d',
            minDate: 'today',
            defaultDate: new Date(),
            onChange: function(selectedDates, dateStr) {
                updateTimeButtons(dateStr, {{ $service->id }}, {{ $service->duration }});
            }
        });
    }

    // 👉 Har safar ochilganda selectedDate ni tekshirish
    const selected = datePicker{{ $service->id }}.selectedDates[0];
    if (selected) {
        const dateStr = selected.toISOString().split('T')[0];
        updateTimeButtons(dateStr, {{ $service->id }}, {{ $service->duration }});
    } else {
        const today = new Date();
        const dateStr = today.toISOString().split('T')[0];
        datePicker{{ $service->id }}.setDate(today);
        updateTimeButtons(dateStr, {{ $service->id }}, {{ $service->duration }});
    }
});

            function updateTimeButtons(selectedDate, serviceId, duration) {
                // To‘liq URL ishlatish
                var url = '{{ url('/') }}/bookings/times?service_id=' + serviceId + '&date=' + selectedDate;
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(bookings => {
                        var timeButtonsContainer = document.getElementById('time_buttons' + serviceId);
                        timeButtonsContainer.innerHTML = '';

                        var startHour = 8;
                        var endHour = 18;
                        var interval = duration;

                        for (var hour = startHour; hour < endHour; hour += interval / 60) {
                            (function() {
                                var startMinutes = Math.floor((hour % 1) * 60);
                                var startHourInt = Math.floor(hour);
                                var endHourInt = Math.floor(hour + (interval / 60));
                                var endMinutes = (startMinutes + interval) % 60;

                                var startTimeStr = String(startHourInt).padStart(2, '0') + ':' + String(startMinutes).padStart(2, '0');
                                var endTimeStr = String(endHourInt).padStart(2, '0') + ':' + String(endMinutes).padStart(2, '0');
                                var fullStartTime = selectedDate + ' ' + startTimeStr;

                                var isBooked = bookings.some(booking => {
                                    var bookingStart = new Date(booking.start);
                                    var bookingEnd = new Date(booking.end);
                                    var currentStart = new Date(fullStartTime);
                                    var currentEnd = new Date(selectedDate + ' ' + endTimeStr);
                                    return (currentStart < bookingEnd && currentEnd > bookingStart);
                                });

                                var button = document.createElement('button');
                                button.type = 'button';
                                button.className = 'time-btn ' + (isBooked ? 'booked' : 'available');
                                button.textContent = startTimeStr + ' - ' + endTimeStr;
                                button.disabled = isBooked;

                                if (!isBooked) {
                                    button.addEventListener('click', function() {
                                        var buttons = timeButtonsContainer.getElementsByClassName('time-btn');
                                        for (var btn of buttons) {
                                            btn.classList.remove('selected');
                                        }
                                        button.classList.add('selected');
                                        document.getElementById('booking_time_input' + serviceId).value = fullStartTime;
                                    });
                                }

                                timeButtonsContainer.appendChild(button);
                            })();
                        }
                    })
                    .catch(error => {
                        console.error('Band vaqtlarni olishda xato:', error);
                        document.getElementById('time_buttons' + serviceId).innerHTML = '<p class="text-danger">Vaqtlar yuklanmadi, qayta urinib ko‘ring.</p>';
                    });
            }
        @endforeach
    });
</script>
@endpush