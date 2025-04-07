<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseControllerClass;

class BaseController extends BaseControllerClass
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $settings = Setting::latest()->first();
        view()->share('settings', $settings);
    }
}
