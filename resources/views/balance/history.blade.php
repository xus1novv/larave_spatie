<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ $user->name }} — {{ __('Buyurtma tarixi') }}
            </h2>
            <a href="{{ route('admin.clients.actions') }}" class="btn btn-secondary">
                ← Orqaga
            </a>
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm rounded-lg">
                @if ($bookings->isEmpty())
                    <p class="text-gray-600">Bu foydalanuvchida buyurtmalar mavjud emas.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Xizmat</th>
                                    <th>Sanasi</th>
                                    <th>Vaqti</th>
                                    <th>Holati</th>
                                    <th>To‘lov</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->service->name ?? '—' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->date)->format('d.m.Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $booking->status === 'completed' ? 'success' : ($booking->status === 'cancelled' ? 'danger' : 'warning') }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td>{{ number_format($booking->price, 0, ',', ' ') }} so‘m</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
