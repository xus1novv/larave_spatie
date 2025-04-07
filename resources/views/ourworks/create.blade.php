<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Yangi ish qo‘shish') }}
            </h2>
            <a href="{{ route('admin.work.index') }}" class="btn btn-primary text-white px-4 py-2 rounded">
                Ro‘yxatga qaytish
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
                                <form action="{{ route('admin.work.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Sarlavha</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="before_image" class="form-label">Tozalanmagan rasm</label>
                                        <input type="file" class="form-control" id="before_image" name="before_image" required>
                                        @error('before_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="after_image" class="form-label">Tozalangan rasm</label>
                                        <input type="file" class="form-control" id="after_image" name="after_image" required>
                                        @error('after_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Tavsif</label>
                                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ish qo‘shish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>