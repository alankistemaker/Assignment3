<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id',
        'name',
        'phone',
    ];
}
