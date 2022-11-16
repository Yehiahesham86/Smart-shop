<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_db extends Model
{
    use HasFactory;
    protected $table="home_dbs";
    protected $primarykey="id";
    protected $fillable=[
        'id',
        'section_name',
        'photo_path',
        'background_path',
        'headtitle',
        'discription',
        'price',
        'product_id',
        'note',

    ];
   
 
}
