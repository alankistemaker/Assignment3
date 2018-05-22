<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id',
        'staff_id',
        'customer_id',
        'takeaway',
    ];

    // staff belong to many orders - order belongs to one staff
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    // order belongs to one customer - customer belongs to many orders
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    
    // Order belongs to many menu_items - menu_item belongs to many orders
    public function menu_items()
    {
        return $this->belongsToMany('App\MenuItem', 'order_menu_items')->as('order');
    }
}
