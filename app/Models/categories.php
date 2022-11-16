<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    
    protected $table="categories";
    protected $primarykey="id";
    protected $fillable=[
        'id',
        'name',
        'status',
        'sub_categories',
        'photo',
    ];
}
