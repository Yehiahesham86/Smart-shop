<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    use HasFactory;
    protected $table="products";
    protected $primarykey="id";
    protected $fillable=[
        'id',
        'name',
       'categories_id',
     'discription',
      'price',
       'rate',
        'brand',
        'discount',
        'cover_path',
       'avalability',
       'type',
       'color'

    ];
 
  
}
