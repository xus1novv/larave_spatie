<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            <a href="{{ route('articles.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Add article 
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
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example rows -->
                                    @if ($articles->isNotEmpty())
                                    @foreach ($articles as $article)
                                                                            <tr>
                                        <td>{{$article->id}}</td>
                                        <td class="col-6">{{$article->title}}</td>
                                        <td>{{$article->author}}</td>
                                        <td>{{\Carbon\Carbon::parse($article->created_at)->format('d M, Y')}}</td>
                                        <td>
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a> 

                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('O‘chirishni xohlaysizmi?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                        
                                    @endif

                                    <!-- Add your dynamic rows here -->
                                </tbody>
                            </table>
                        </div>
                        
                        {{$articles->links()}}
                    </div>

                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>