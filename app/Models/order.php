<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $primarykey="id";
    protected $fillable=[
         'id',
        'payment_id',
        'address_id',
        'status',
     
        
    ];
  
       
       public function payment()
       {
           return $this->belongsto(payment::class);
       }
       public function user()
       {
           return $this->belongsto(User::class);
       }
    
}
