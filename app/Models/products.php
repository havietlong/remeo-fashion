<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'image_link',
        'description',
        'product_type_id',
        'product_categories_id', // Add any other fields you want to allow mass assignment here
        // 'field_name_1',
        // 'field_name_2',
        // ...
    ];
}
