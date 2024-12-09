<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card shadow-sm p-4">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">User name</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Rol kiritish" 
                                    value="{{ old('name', $user->name) }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Rol kiritish" 
                                    value="{{ old('email', $user->email) }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                
                            </div>

                            <div class="grid grid-cols-4 mb-3">
                                @if ($roles->isNotEmpty())
                                    @foreach ($roles as $role)
                                        <div class="mt-3">
                                            <input {{  $hasRoles->contains($role->id) ? 'checked':'' }} type="checkbox" id="role-{{$role->id}}" class="rounded" name="role[]" value="{{$role->name}}">
                                            <label for="role-{{$role->id}}">{{$role->name}}</label>
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