<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table="payments";
    protected $primarykey="id";
    protected $fillable=[
      'id',
            'payment_id',
          'payer_id',
       'payer_email',
        'amount',
       'currency',
 'payment_status',
 'user_id',
        
    ];
  
   
    public function order(){
        return $this->hasOne(order::class);

    }
}
