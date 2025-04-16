@extends('base.base')

@section('title', 'Profile')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Profilni tahrirlash</h4>
        </div>
        <div class="card-body">
            <!-- Profilni yangilash formasi -->
            <form method="post" action="{{ route('user_profile.update') }}" class="space-y-4">
                @csrf
                @method('patch')

                <!-- Ism -->
                <div class="mb-3">
                    <label for="name" class="form-label">Ism</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                    @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email manzili</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-sm text-muted">
                                {{ __('Sizning email manzilingiz tasdiqlanmagan.') }}

                                <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                                    {{ __('Tasdiqlash emailini qayta yuborish') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-success font-medium">
                                    {{ __('Yangi tasdiqlash havolasi email manzilingizga yuborildi.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Save button -->
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Saqlash</button>

                    @if (session('status') === 'profile-updated')
                        <p class="text-success mb-0">Profil muvaffaqiyatli saqlandi!</p>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Parolni yangilash</h4>
        </div>
        <div class="card-body">
            <!-- Parolni yangilash formasi -->
            <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                @method('put')

                <!-- Joriy parol -->
                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label">Joriy parol</label>
                    <input type="password" class="form-control" id="update_password_current_password" name="current_password" autocomplete="current-password" required>
                    @error('current_password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Yangi parol -->
                <div class="mb-3">
                    <label for="update_password_password" class="form-label">Yangi parol</label>
                    <input type="password" class="form-control" id="update_password_password" name="password" autocomplete="new-password" required>
                    @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Yangi parolni tasdiqlash -->
                <div class="mb-3">
                    <label for="update_password_password_confirmation" class="form-label">Yangi parolni tasdiqlash</label>
                    <input type="password" class="form-control" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password" required>
                    @error('password_confirmation')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Saqlash tugmasi -->
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-warning">Saqlash</button>

                    @if (session('status') === 'password-updated')
                        <p class="text-success mb-0">Parol muvaffaqiyatli yangilandi!</p>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <form method="post" action="{{ route('user_profile.destroy') }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Profilni o'chirish</button>
        </form>
    </div>    
</div>

<!-- Verification form (hidden) -->
<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

@endsection