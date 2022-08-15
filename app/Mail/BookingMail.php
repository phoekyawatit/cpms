<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking,$title)
    {
        $this->booking = $booking;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        // can send different email template for admin and customer 
        // admin mail 
        $emails[] = env('MAIL_FROM_ADDRESS','');
        // customer mail 
        $emails[] = $this->booking->customer->email;

        return $this->from(env('MAIL_FROM_ADDRESS',''),env('MAIL_NAME', ''))
        ->subject("Booking Information @ Car Parking Management System")
        ->to($emails)->view('frontend.mail')
        ->with(['booking'=> $this->booking,'title'=> $this->title]);
    }
}
