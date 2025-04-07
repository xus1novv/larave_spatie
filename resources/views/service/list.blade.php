<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Service') }}
            </h2>
            <a href="{{ route('service.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Create service
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
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example rows -->
                                    @if ($services->isNotEmpty())
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{$service->id}}</td>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->price}}</td>
                                        <td>
                                            @if ($service->is_active == 1)
                                                <span>Active</span>
                                            @else
                                                <span>Inactive</span>
                                            @endif
                                    </td>
                                        <td>
                                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a> 

                                            <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                        
                                    @endif

                                    <!-- Add your dynamic rows here -->
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>