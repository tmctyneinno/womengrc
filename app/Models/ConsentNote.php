<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];
    protected $table = 'consent_notes';
    public $timestamps = false;
    protected $casts = [
        'content' => 'string',
    ];
}
