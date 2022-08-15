<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Mail\BookingMail;
use Mail;
class FrontendController extends Controller
{
    public function index()
    {
       $services = Service::all();
       return view('frontend.index',compact('services'));
    }


    public function book(Request $request)
    {
        $this->validate(
            $request,
            [
                'booking_start_date' => 'required',
                'duration' => 'required',
                'car_number' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]
        );
        $customer = $this->checkCustomer($request->email,$request->name);
        $requestData = $request->all();
        $requestData['customer_id'] = $customer->id;
        $booking = Booking::create($requestData);
        $booking->services()->sync($request->services);
        $message = "You have successfully booked a car parking.";
        Mail::send(new BookingMail($booking,$message));
        return redirect()->back()->with('message',($message."Please check your email for your booking information"));

    }


    public function checkCustomer($email,$name)
    {
       $customer = Customer::where('email',$email)->first();
       if(!$customer){
        $customer = Customer::create(['email' => $email,'name' => $name]);
       }
       return $customer;
    }
}
