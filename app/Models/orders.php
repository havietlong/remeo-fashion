<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id');
    }
}
