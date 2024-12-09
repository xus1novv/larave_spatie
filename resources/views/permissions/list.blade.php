<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a href="{{ route('permissions.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Permission qo'shish
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example rows -->
                                    @if ($permissions->isNotEmpty())
                                    @foreach ($permissions as $permission)
                                                                            <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{\Carbon\Carbon::parse($permission->created_at)->format('d M, Y')}}</td>
                                        <td>
                                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a> 

                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline-block;">
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
                        
                        {{$permissions->links()}}
                    </div>

                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>