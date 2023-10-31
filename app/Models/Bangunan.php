<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bangunan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function tagihan()
    {
        return $this->hasMany(BangunanTagihan::class);
    }

    public function kontraktor(): BelongsTo
    {
        return $this->belongsTo(Kontraktor::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function totalTagihan()
    {
        // sum dimana status menunggu
        return $this->tagihan()->where('status', 'menunggu')->sum('harga');
    }
}
