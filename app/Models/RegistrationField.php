<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationField extends Model
{
    protected $fillable = [
        'registration_type_id',
        'label',
        'type',
        'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function registrationType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RegistrationType::class);
    }
}
