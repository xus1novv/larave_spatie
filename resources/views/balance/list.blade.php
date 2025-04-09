<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Mijozlar') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash xabarlar --}}
            <x-message />

            <div class="bg-white p-4 shadow-sm rounded mb-4">
                <h5 class="mb-3">💰 Mijoz balansini to‘ldirish</h5>
                <form action="{{ route('admin.clients.topup') }}" method="POST" class="row g-3 align-items-end">
                    @csrf
                    <div class="col-md-4">
                        <label for="user_id" class="form-label">Mijozni tanlang</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="">-- Tanlang --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="amount" class="form-label">Miqdor (so‘m)</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">To‘ldirish</button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-4 shadow-sm rounded">
                <h5 class="mb-3">📜 Mijoz buyurtma tarixi</h5>
                <form action="{{ route('admin.clients.history') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="history_user_id" class="form-label">Mijozni tanlang</label>
                        <select name="user_id" id="history_user_id" class="form-select" required>
                            <option value="">-- Tanlang --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Ko‘rish</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
