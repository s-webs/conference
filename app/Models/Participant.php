<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'registration_type_id',
        'email',
        'additional_data',
        'email_verified_at'
    ];

    protected $casts = [
        'additional_data' => 'array',
        'email_verified_at' => 'datetime'
    ];

    public function isEmailVerified(): bool
    {
        return !is_null($this->email_verified_at);
    }


    public function registrationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RegistrationType::class);
    }
}
