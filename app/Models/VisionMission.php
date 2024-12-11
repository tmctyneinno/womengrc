<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission', 
        'mission_img', 
        'vision',  
        'vision_img',
        'purpose',
        'purpose_img',
    ];
} 
