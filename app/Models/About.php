<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory; 

    protected $fillable = [
        'title', 'content', 'image', 'header_image', 'banner_one', 'banner_two', 'banner_three'
    ];
}
