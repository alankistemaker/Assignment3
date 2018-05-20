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
        'user_id',
        'menu_id',
    ];
    public function staff()
    {
        return $this->belongsTo('App\staff');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
