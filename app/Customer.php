<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id', 
        'name', 
        'phone',
        'email',
        'address1',
        'address2',
        'state',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}