<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitatorEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_description',
        'event_type',
        'event_date_time',
        'event_location',
    ];
}
 