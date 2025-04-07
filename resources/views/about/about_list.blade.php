<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('About Us List') }}
            </h2>
            <a href="{{ route('admin.about.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Create About
            </a>
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
                        <x-message></x-message>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Service Points</th>
                                                <th scope="col">Engineers & Workers</th>
                                                <th scope="col">Happy Clients</th>
                                                <th scope="col">Projects Completed</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($abouts->isNotEmpty())
                                                @foreach ($abouts as $about)
                                                    <tr>
                                                        <td>{{ $about->id }}</td>
                                                        <td>{{ $about->title }}</td>
                                                        <td>{{ $about->service_points }}</td>
                                                        <td>{{ $about->engineers_workers }}</td>
                                                        <td>{{ $about->happy_clients }}</td>
                                                        <td>{{ $about->projects_completed }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-success">
                                                                <i class="bi bi-pencil"></i> Edit
                                                            </a> 
                                                            <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this About Us entry?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">No About Us entries found.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>