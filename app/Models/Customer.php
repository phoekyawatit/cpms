<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Booking;
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "customers";
    protected $fillable = ["name","email"];

    public function bookings()
    {
       return $this->hasMany(Booking::class);
    }
}
