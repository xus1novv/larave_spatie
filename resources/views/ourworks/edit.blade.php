<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Ishni tahrirlash') }}
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
                                <form action="{{ route('admin.work.update', $work->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Sarlavha</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $work->title) }}" required>
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="before_image" class="form-label">Tozalanmagan rasm</label>
                                        <input type="file" class="form-control" id="before_image" name="before_image">
                                        @if ($work->before_image)
                                            <div class="mt-2">
                                                <p>Joriy tozalanmagan rasm:</p>
                                                <img src="{{ asset('storage/' . $work->before_image) }}" alt="{{ $work->title }} Before" class="img-fluid" style="max-width: 200px;">
                                            </div>
                                        @endif
                                        @error('before_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="after_image" class="form-label">Tozalangan rasm</label>
                                        <input type="file" class="form-control" id="after_image" name="after_image">
                                        @if ($work->after_image)
                                            <div class="mt-2">
                                                <p>Joriy tozalangan rasm:</p>
                                                <img src="{{ asset('storage/' . $work->after_image) }}" alt="{{ $work->title }} After" class="img-fluid" style="max-width: 200px;">
                                            </div>
                                        @endif
                                        @error('after_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Tavsif</label>
                                        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $work->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ishni yangilash</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>