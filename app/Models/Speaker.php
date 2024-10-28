<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'conference_id',
        'photo',
        'name',
        'position',
        'country'
    ];

    public function conference(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conference::class);
    }
}
