<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id', 
        'name', 
        'desc'
    ];
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function menu_items()
    {
        return $this->hasMany('App\MenuItem');
    }
}
