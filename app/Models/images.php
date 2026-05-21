<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\accomplishment;
class images extends Model
{
    use HasFactory;
    protected $fillable = [
        'accomplishment_id',
        'narrative_id',
        'path'
    ];

   
    public function accomplishment()
    {
        return $this->belongsTo(Accomplishment::class);
    }

    public function narrative()
    {
        return $this->belongsTo(Narratives::class);
    }
}