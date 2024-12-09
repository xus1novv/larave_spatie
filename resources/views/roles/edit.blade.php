<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rollar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card shadow-sm p-4">
                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Rol nomi</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Rol kiritish" 
                                    value="{{ old('name', $role->name) }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                @if ($permissions->isNotEmpty())
                                    @foreach ($permissions as $permission)
                                        <div class="mt-3">
                                            <input {{  $hasPermissions->contains($permission->name) ? 'checked':'' }} type="checkbox" id="permission-{{$permission->id}}" class="rounded" name="permission[]" value="{{$permission->name}}">
                                            <label for="permission-{{$permission->id}}">{{$permission->name}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success w-100">Saqlash</button>
                        </form>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>