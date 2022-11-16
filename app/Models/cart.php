<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $primarykey="id";
    protected $fillable=[
        'id',
        'type',
        'color',
        'product_id',
        'user_id',
        'price',
        'discount',
        'total',
        'qty',
        'cover_path',
        'name',
    ];
}
