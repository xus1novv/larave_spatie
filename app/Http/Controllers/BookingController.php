<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Subscription;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'car_number' => 'required|string|max:255',
            'car_model' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
            'booking_time' => 'required|date_format:Y-m-d H:i',
        ]);

        $user = Auth::user();
        $service = Service::findOrFail($request->service_id);
        $bookingTime = new \DateTime($request->booking_time, new \DateTimeZone(config('app.timezone', 'UTC')));
        $duration = $service->duration;
    

        $endTime = clone $bookingTime;
        $endTime->modify("+{$duration} minutes");

        $conflict = Booking::where('service_id', $request->service_id)
            ->where(function ($query) use ($bookingTime, $endTime) {
                $query->whereBetween('booking_time', [$bookingTime, $endTime])
                      ->orWhereBetween('end_time', [$bookingTime, $endTime])
                      ->orWhere(function ($query) use ($bookingTime, $endTime) {
                          $query->where('booking_time', '<=', $bookingTime)
                                ->where('end_time', '>=', $endTime);
                      });
            })
            ->exists();

        $subscription = \App\Models\Subscription::where('user_id', Auth::id())
        ->where('end_date', '>', now())
        ->first();
    

        if ($conflict) {
            return redirect()->back()->withErrors(['booking_time' => 'Bu vaqt oralig\'ida boshqa buyurtma mavjud.']);
        }
        $userBalance = $user->wallet;

        if (!$subscription) {
            $userBalance = $user->wallet;
        
            if ($userBalance->balance < $service->price) {
                return back()->with('error', 'Hisobingizda yetarli mablag‘ yo‘q. Iltimos, hisobingizni to‘ldiring.');
            }
        
            $userBalance->balance -= $service->price;
            $userBalance->save();
        } else {
            if ($subscription->car_model == $request->car_model && $subscription->car_number == $request->car_number) {
                $servicePrice = 0; 
            } else {
                $userBalance = $user->wallet;
        
                if ($userBalance->balance < $service->price) {
                    return back()->with('error', 'Hisobingizda yetarli mablag‘ yo‘q. Iltimos, hisobingizni to‘ldiring.');
                }
        
                $userBalance->balance -= $service->price;
                $userBalance->save();
            }
        }

        Booking::create([
            'user_id'=>auth()->id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'car_number' => $request->car_number,
            'car_model' => $request->car_model,
            'service_id' => $request->service_id,
            'booking_time' => $bookingTime,
            'end_time' => $endTime,
        ]);

        return redirect()->back()->with('success', 'Buyurtma muvaffaqiyatli qabul qilindi!');
    }

    public function getAvailableTimes(Request $request)
    {
        try {
            $serviceId = $request->query('service_id');
            $date = $request->query('date'); // Masalan: 2025-04-07
    
            if (!$serviceId || !$date) {
                return response()->json(['error' => 'Maʼlumotlar yetarli emas.'], 400);
            }
    
            $service = Service::findOrFail($serviceId);
            $bookings = Booking::where('service_id', $serviceId)
                ->whereDate('booking_time', $date)
                ->get();
    
            $events = $bookings->map(function ($booking) use ($service) {
                $start = Carbon::parse($booking->booking_time);
                $end = (clone $start)->addMinutes($service->duration);
                return [
                    'start' => $start->format('Y-m-d H:i'),
                    'end' => $end->format('Y-m-d H:i'),
                ];
            });
    
            return response()->json($events);
        } catch (\Throwable $e) {
            Log::error('getAvailableTimes ERROR: ' . $e->getMessage());
            return response()->json(['error' => 'Serverda xatolik'], 500);
        }
    }
    
    public function storeMultiple(Request $request)
    {
    $request->validate([
        'service_ids' => 'required|array',
        'service_ids.*' => 'exists:services,id',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'car_number' => 'required|string|max:20',
        'car_model' => 'required|string|max:255',
        'booking_date' => 'required|date',
        'booking_time' => 'required|string',
    ]);

    foreach ($request->service_ids as $serviceId) {
        Booking::create([
            'user_id'=>auth()->id(),
            'service_id' => $serviceId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'car_number' => $request->car_number,
            'car_model' => $request->car_model,
            'booking_time' => $request->booking_date . ' ' . $request->booking_time,
        ]);
    }

    return redirect()->back()->with('success', 'Buyurtma muvaffaqiyatli yuborildi!');
    }


    public function orders_list(Request $request)
{
    $date = $request->input('date');

    $bookings = Booking::with(['user', 'service'])
        ->when($date, function ($query) use ($date) {
            $query->whereDate('booking_time', $date);
        })
        ->latest()
        ->paginate(10);

    return view('orders.list', compact('bookings', 'date'));
}
}
