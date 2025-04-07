<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-message></x-message>

                <form action="{{ route('service.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Service Name</label>
                        <input type="text" name="name" id="name" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                        <textarea name="description" id="description" class="form-input w-full"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price ($)</label>
                        <input type="number" name="price" id="price" step="0.01" class="form-input w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="duration">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_active" value="1" class="form-checkbox">
                            <span class="ml-2">Active</span>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">
                            Create Service
                        </button>
                        <a href="{{ route('service.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
