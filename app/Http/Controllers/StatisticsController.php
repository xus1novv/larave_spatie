<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index() 
    {
        $usersCount = User::count();
        $servicesCount = Service::count();
    
        return view('dashboard', [
            'usersCount' => $usersCount,
            'servicesCount' => $servicesCount
        ]);
    }
}
