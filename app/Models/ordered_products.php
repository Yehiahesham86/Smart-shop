<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordered_products extends Model
{
    use HasFactory;
    protected $table="ordered_products";
    protected $primarykey="id";
    protected $fillable=[
         'id',
        'order_id',
        'product_id',
        'user_id',
        'qty',
        'price',
        
     
        
    ];
 
    public function product() 
    {
        return $this->belongsto(product::class);
    }
}
