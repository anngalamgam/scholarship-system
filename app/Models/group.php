<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image; // Assuming you have a proper Image model

class Group extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class); // Assuming each group can have many images
    }
}

