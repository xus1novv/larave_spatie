<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Booking;
use App\Models\Wallet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    public function index()
    {
        // Auth::user() bilan foydalanuvchini olish
        $user = Auth::user();

        // Foydalanuvchining buyurtmalarini olish
        $bookings = Booking::with('service')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // Foydalanuvchining balansini olish
        $wallet = Wallet::where('user_id', $user->id)->first();

        // Agar balans mavjud bo'lmasa, yangi yaratish
        if (!$wallet) {
            $wallet = Wallet::create([
                'user_id' => $user->id,
                'balance' => 0
            ]);
        }

        return view('base.profile', compact('user', 'bookings', 'wallet'));
    }

        /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('base.profile_edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('user_profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
