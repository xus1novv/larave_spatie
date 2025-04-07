<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        return view('base.base'); // base.blade.php ni ko‘rsatadi
    }

    public function home()
    {
        $services = Service::where('is_active', 1)->get();
        $about = About::first();
        return view('base.home_page',[
            'services' => $services,
            'about' => $about,
        ]);
    }

    public function about(){
        $abouts = About::all();
        $ourWorks = Work::all();
        return view('base.about',[
            'about' => $abouts,
            'works' => $ourWorks
        ]);
    }

    public function contact(){
        return view('base.contact');
    }

    public function services(){
        $services = Service::where('is_active', 1)->get();
        return view('base.service',[
            'services' => $services
        ]);
    }

    public function price() {
        return view('base.price');
    }

    public function location() {
        return view('base.washing_points');
    }

    public function show(Service $service)
    {
        $bookedTimes = Booking::where('service_id', $service->id)
            ->get()
            ->map(function ($booking) {
                return Carbon::parse($booking->booking_time)->toISOString();
            });
    
        return view('base.service',[
            'service' => $service,
            'bookedTimes'=>$bookedTimes
        ]);
    }
}
