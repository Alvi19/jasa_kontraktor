<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kontraktor()
    {
        return $this->belongsTo(Kontraktor::class);
    }
}
