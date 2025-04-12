<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = User::role('user')->with('wallet');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $users = $query->paginate(10);

        return view('balance.list', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('wallet', 'bookings'); 
        return view('balance.history', compact('user'));
    }

    public function topUpBalance(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $wallet = $user->wallet ?? Wallet::create(['user_id' => $user->id, 'balance' => 0]);
        $wallet->increment('balance', $request->amount);

        return redirect()->route('clients.show', $user->id)->with('success', 'Balance updated successfully.');
    }

}
