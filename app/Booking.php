<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id', 
        'name', 
        'desc',
        'tablesize',
        'staff_id',
        'customer_id',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
