<?php

namespace App\Http\Controllers;

use App\Models\SubPlans;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:sub_plans,id',
            'car_model' => 'required|string|max:255',
            'car_number' => 'required|string|max:255',
        ]);
    
        $plan = SubPlans::findOrFail($request->plan_id);
        $user = Auth::user();
    
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addMonths($plan->duration_months);
        $userWallet = $user->wallet;
        $userBalance = $userWallet->balance;


        if ($userBalance >= $plan->price) {

            $hasSubscription = Subscription::where('user_id', $user->id)
            ->where('end_date', '>=',Carbon::today())->first();

            if ($hasSubscription) {
                return redirect()->back()->with('success', 'Sizda faol obuna mavjud');

            } else {
                $userWallet->balance -= $plan->price;
                $userWallet->save();
                
                Subscription::create([
                    'user_id' => Auth::id(),
                    'subscription_plan_id' => $plan->id,
                    'car_model' => $request->car_model,
                    'car_number' => $request->car_number,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ]);
                return redirect()->back()->with('success', 'Muvaffaqiyatli obuna bo\'ldingiz!');
            }
        }

        return redirect()->back()->with('success', 'Hisobingizda mablag\' yetarli emas!');

        }
    

public function sub_list()
{
    $plans = SubPlans::latest()->get();
    return view('subscription.list', compact('plans'));
}

public function create()
{
    return view('subscription.create');
}

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'duration_months' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    SubPlans::create([
        'name' => $request->name,
        'duration_months' => $request->duration_months,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.sub.index')->with('success', 'Plan created successfully.');
}

public function destroy(SubPlans $plan)
{
    $plan->delete();
    return redirect()->route('admin.sub.index')->with('success', 'Plan deleted successfully.');
}
}
