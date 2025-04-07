<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Edit About Us') }}
            </h2>
            <a href="{{ route('admin.about.index') }}" class="btn btn-primary text-white px-4 py-2 rounded">
                Back to List
            </a>
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-message></x-message>
                    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $about->title) }}" required>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $about->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if ($about->image)
                                <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" class="img-fluid mt-2" style="max-width: 200px;">
                            @endif
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="service_points" class="form-label">Service Points</label>
                                <input type="number" class="form-control" id="service_points" name="service_points" value="{{ old('service_points', $about->service_points) }}" required>
                                @error('service_points')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="engineers_workers" class="form-label">Engineers & Workers</label>
                                <input type="number" class="form-control" id="engineers_workers" name="engineers_workers" value="{{ old('engineers_workers', $about->engineers_workers) }}" required>
                                @error('engineers_workers')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="happy_clients" class="form-label">Happy Clients</label>
                                <input type="number" class="form-control" id="happy_clients" name="happy_clients" value="{{ old('happy_clients', $about->happy_clients) }}" required>
                                @error('happy_clients')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="projects_completed" class="form-label">Projects Completed</label>
                                <input type="number" class="form-control" id="projects_completed" name="projects_completed" value="{{ old('projects_completed', $about->projects_completed) }}" required>
                                @error('projects_completed')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>