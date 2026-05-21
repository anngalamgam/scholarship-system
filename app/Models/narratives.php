<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\images;

class Narratives extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'leader',
        'implementing',
        'objective',
        'afund',
        'department',
        'link',
    ];

    
    
}
