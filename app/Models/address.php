<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table="addresses";
    protected $primarykey="id";
    protected $fillable=[
        'id',
        'address',
        'city',
        'post_code',
        'state',
        'country',
        'user_id',
    ];
}
