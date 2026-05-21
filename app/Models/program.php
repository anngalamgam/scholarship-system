<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'leader',
        'fund',
        'description',
        'location',
        'schedule',
        'scheduleend',
        'department',
        'file',
    ];

}
