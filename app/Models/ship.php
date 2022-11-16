<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ship extends Model
{
    use HasFactory;
    protected $table="ships";
    protected $primarykey="id";
    protected $fillable=[
        'id',
        'price',
        'name',
        'duration',
    ];
}
