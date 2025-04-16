<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Subscription Plans') }}
            </h2>
            <a href="{{ route('admin.sub.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Create Plan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->id }}</td>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->duration_months }} months</td>
                                        <td>${{ number_format($plan->price, 2) }}</td>
                                        <td>{{ $plan->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <form action="{{ route('admin.sub.destroy', $plan->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this plan?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>