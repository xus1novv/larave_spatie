<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
{
    $clients = User::role('user')->get();
    return view('balance.list', compact('clients'));
}

public function topup(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric|min:100',
    ]);

    $wallet = Wallet::firstOrCreate(['user_id' => $request->user_id]);
    $wallet->balance += $request->amount;
    $wallet->save();

    return back()->with('success', 'Balans muvaffaqiyatli to‘ldirildi!');
}

public function history(Request $request)
{
    $user = User::findOrFail($request->user_id);
    $bookings = $user->bookings()->latest()->get(); // aloqasi kerak: User → bookings

    return view('balance.history', compact('user', 'bookings'));
}

}
