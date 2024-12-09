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
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="name" class="form-label fw-bold">Name</label>
                                <input 
                                    value="" 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter name" 
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
                                    value=""
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="Enter email" 
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
            
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input 
                                    value="{{ old('password') }}"
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="Enter password" 
                                >
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
            
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                                <input 
                                    value="{{ old('confirm_password') }}"
                                    type="password" 
                                    name="confirm_password" 
                                    id="confirm_password" 
                                    class="form-control @error('confirm_password') is-invalid @enderror" 
                                    placeholder="Confirm password" 
                                    
                                >
                                @error('confirm_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
            
                            <!-- Roles -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Roles</label>
                                <div class="row">
                                    @if ($roles->isNotEmpty())
                                        @foreach ($roles as $role)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input 
                                                        type="checkbox" 
                                                        id="role-{{$role->id}}" 
                                                        class="form-check-input rounded" 
                                                        name="role[]" 
                                                        value="{{$role->name}}">
                                                    <label for="role-{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success w-100">Save</button>
                        </form>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>