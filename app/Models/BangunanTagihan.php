<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangunanTagihan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bangunan()
    {
        return $this->belongsTo(Bangunan::class);
    }
}
