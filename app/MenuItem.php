<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id',
        'name',
        'instock',
        'item_description',
        'cost',
        'price',
        'menu_id',
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    // Menu_item belongs to many orders - order belongs to many menu_items
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_menu_item')->as('menu_item');
    }
}
