<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bangunan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kontraktor(): BelongsTo
    {
        return $this->belongsTo(Kontraktor::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
