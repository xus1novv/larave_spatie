<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card shadow-sm p-4">
                        <form action="{{ route('service.update', $service->id) }}" method="post">
                            @csrf
                            @method('PATCH') <!-- Since this is an update form -->

                            <!-- Name Field -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Service Name</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter service name" 
                                    value="{{ old('name', $service->name) }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    placeholder="Enter service description"
                                >{{ old('description', $service->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Price Field -->
                            <div class="mb-4">
                                <label for="price" class="form-label fw-bold">Price</label>
                                <input 
                                    type="number" 
                                    name="price" 
                                    id="price" 
                                    step="0.01" 
                                    class="form-control @error('price') is-invalid @enderror" 
                                    placeholder="Enter price" 
                                    value="{{ old('price', $service->price) }}"
                                >
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Duration Field -->
                            <div class="mb-4">
                                <label for="duration" class="form-label fw-bold">Duration (minutes)</label>
                                <input 
                                    type="number" 
                                    name="duration" 
                                    id="duration" 
                                    class="form-control @error('duration') is-invalid @enderror" 
                                    placeholder="Enter duration in minutes" 
                                    value="{{ old('duration', $service->duration) }}"
                                >
                                @error('duration')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Is Active Field -->
                            <div class="mb-4">
                                <label for="is_active" class="form-label fw-bold">Active Status</label>
                                <select 
                                    name="is_active" 
                                    id="is_active" 
                                    class="form-control @error('is_active') is-invalid @enderror"
                                >
                                    <option value="1" {{ old('is_active', $service->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $service->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('is_active')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success w-100">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>