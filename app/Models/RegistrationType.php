<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationType extends Model
{
    protected $fillable = [
        'conference_id',
        'name_ru',
        'name_kz',
        'name_en',
    ];

    public function conference(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conference::class);
    }

    public function registrationFields(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RegistrationField::class);
    }

    public function participants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
