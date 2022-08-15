<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer;
use App\Models\Service;
class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "bookings";
    protected $fillable = ["booking_start_date","duration","car_number","notes","customer_id","user_id"];


    public function customer()
    {
       return $this->belongsTo(Customer::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
