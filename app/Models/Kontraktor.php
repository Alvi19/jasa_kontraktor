<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kontraktor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $table = "kontraktor";


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
