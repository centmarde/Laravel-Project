<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselItems extends Model
{
    use HasFactory;

  

    protected $table = 'carousel_items'; 

    protected $primaryKey = 'carousel_item_id';

    protected $fillable = [
        'carousel_name',
        'image_path',
        'description',
        'user_id',
    ];
}
