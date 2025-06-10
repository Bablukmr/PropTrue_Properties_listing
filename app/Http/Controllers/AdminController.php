<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
 public function dashboard()
{
    $totalListedProperties = Property::count();
    $totalEnquiries = Enquiry::count();
    $totalEnquiriesSell = Enquiry::where('enquiry_type', 'sell')->count();
    $totalEnquiriesContact = Enquiry::where('enquiry_type', 'contact')->count();
    $totalUsers = User::count();
    $TodayEnquiries = Enquiry::whereDate('created_at', now())->count();
    $TodaytotalListedProperties = Property::whereDate('created_at', now())->count();

    // Properties added in last 30 days
    $propertiesChartData = [
        'labels' => [],
        'data' => []
    ];

    for ($i = 29; $i >= 0; $i--) {
        $date = now()->subDays($i)->format('M d');
        $count = Property::whereDate('created_at', now()->subDays($i))->count();

        $propertiesChartData['labels'][] = $date;
        $propertiesChartData['data'][] = $count;
    }

    // Enquiries in last 30 days
    $enquiriesChartData = [
        'labels' => [],
        'data' => []
    ];

    for ($i = 29; $i >= 0; $i--) {
        $date = now()->subDays($i)->format('M d');
        $count = Enquiry::whereDate('created_at', now()->subDays($i))->count();

        $enquiriesChartData['labels'][] = $date;
        $enquiriesChartData['data'][] = $count;
    }

    // Property status data
    $propertyStatusData = [
        'available' => Property::where('property_status', 'Available')->count(),
        'sold' => Property::where('property_status', 'Sold')->count(),
        'rented' => Property::where('property_status', 'Rented')->count(),
        'maintenance' => Property::where('property_status', 'Under Maintenance')->count(),
    ];

    return view('admin.dashboard', compact(
        'totalListedProperties',
        'totalEnquiries',
        'totalEnquiriesSell',
        'totalEnquiriesContact',
        'TodayEnquiries',
        'TodaytotalListedProperties',
        'propertiesChartData',
        'enquiriesChartData',
        'propertyStatusData'
    ));
}
    public function ourteam()
    {
        return view('admin.ourteam');
    }
    public function form()
    {
        return view('admin.form');
    }
    public function table()
    {
        return view('admin.table');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->role != 'admin') {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Unautherise user, credentials');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function register()
    {
        $user = new User();
        $user->name = 'Student';
        $user->role = 'student';
        $user->email = 'student@gmail.com';
        $user->password = Hash::make('register123');
        $user->save();
    }
}
