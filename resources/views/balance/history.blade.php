<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ $user->name }} - Info
            </h2>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary px-4 py-2 rounded">← Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <h4><strong>Name:</strong> {{ $user->name }}</h4>
                <h4><strong>Balance:</strong> {{ $user->wallet->balance ?? 0 }} UZS</h4>

                <form method="POST" action="{{ route('clients.topup', $user->id) }}" class="my-4">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="number" name="amount" class="form-control" placeholder="Enter amount to top up" step="0.01" required>
                        <button type="submit" class="btn btn-success">Top Up</button>
                    </div>
                    @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>

                <hr class="my-4">

                <h5>Booking History</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Service</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->service->name ?? '-' }}</td>
                                    <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                                    <td>{{ $booking->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
