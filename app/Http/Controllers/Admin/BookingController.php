<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Mail\BookingMail;
use Mail;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookings = Booking::paginate(10);
        return view('backend.bookings.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $cutomers = Customer::pluck('email','id')->toArray();
        return view('backend.bookings.create',compact('services','cutomers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'booking_start_date' => 'required',
                'duration' => 'required',
                'car_number' => 'required',
                'customer_id' => 'required',
            ]
        );

        $requestData = $request->all();
        $booking = Booking::create($requestData);
        $booking->services()->sync($request->services);

        return redirect('/admin/bookings')->with('message',"Created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {   
        $services = Service::all();
        $cutomers = Customer::pluck('email','id')->toArray();
        return view('backend.bookings.edit',compact('booking','services','cutomers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $this->validate(
            $request,
            [
                'booking_start_date' => 'required',
                'duration' => 'required',
                'car_number' => 'required',
                'customer_id' => 'required',
            ]
        );
        $message = "You have successfully booked a car parking.";
        if($request->type == "paid"){
            $message = "You have successfully paid for your booking.";
        }
        $requestData = $request->all();
        $booking->fill($requestData)->save();
        $booking->services()->sync($request->services);
        
        Mail::send(new BookingMail($booking,$message));
        return redirect('/admin/bookings')->with('message',"Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->services()->detach();
        $booking->delete();
        return redirect()->back()->with('message',"Deleted!");
    }
}
