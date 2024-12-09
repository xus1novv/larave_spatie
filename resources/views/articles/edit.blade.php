<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card shadow-sm p-4">
                        <form action="{{ route('articles.update', $article->id) }}" method="post">
                            @csrf
                        
                            <!-- Title Input -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    placeholder="Enter article title" 
                                    value="{{ old('title', $article->title) }}"
                                >
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <!-- Content Input -->
                            <div class="mb-4">
                                <label for="text" class="form-label fw-bold">Content</label>
                                <textarea 
                                    name="text" 
                                    id="text" 
                                    class="form-control" 
                                    placeholder="Enter the content here"
                                >{{ old('text', $article->text) }}</textarea>
                            </div>
                        
                            <!-- Author Input -->
                            <div class="mb-4">
                                <label for="author" class="form-label fw-bold">Author</label>
                                <input 
                                    type="text" 
                                    name="author" 
                                    id="author" 
                                    class="form-control @error('author') is-invalid @enderror" 
                                    placeholder="Enter the author name" 
                                    value="{{ old('author', $article->author) }}"
                                >
                                @error('author')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success w-100">Update</button>
                        </form>
                        
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>