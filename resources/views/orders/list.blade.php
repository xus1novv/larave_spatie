<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('All Bookings') }}
            </h2>
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Filter --}}
                <form method="GET" action="{{ route('bookings.index') }}" class="mb-4 row">
                    <div class="col-md-4">
                        <input type="date" name="date" class="form-control" value="{{ $date }}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Clear</a>
                    </div>
                </form>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Car</th>
                                <th>Booking Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->user->name ?? $booking->first_name . ' ' . $booking->last_name }}</td>
                                    <td>{{ $booking->phone_number }}</td>
                                    <td>{{ $booking->service->name ?? '-' }}</td>
                                    <td>{{ $booking->car_model }} ({{ $booking->car_number }})</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('d M Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $bookings->withQueryString()->links() }}

            </div>
        </div>
    </div>
</x-app-layout>
