<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Service;
class AdminController extends Controller
{
    public function index()
    {
       $alluser = User::count();
       $allcustomer = Customer::count();
       $allservice = Service::count();
       $allbooking = Booking::count();
       return view('backend.index',compact('alluser','allcustomer','allservice','allbooking'));
    }
}
