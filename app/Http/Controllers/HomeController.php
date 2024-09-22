<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function checkUserType()
    {
        if (!Auth::user()) {
            \Log::info('User not authenticated.');
            return redirect()->route('login');
        }
    
        $userType = Auth::user()->userType;
        \Log::info("User type: " . $userType);
    
        if ($userType !== 'ADMIN') {
            \Log::info("Redirecting to user dashboard");
            return redirect()->route('user.dashboard');
        }
    
        // If the user type is 'ADMIN'
        \Log::info("Redirecting to admin dashboard");
        return redirect()->route('admin.dashboard');
    }
}    
