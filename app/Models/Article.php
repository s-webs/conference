<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{

    protected $casts = [
        'gallery' => 'collection'
    ];

    protected $fillable = [
        'conference_id',
        'preview',
        'title_ru',
        'title_kz',
        'title_en',
        'text_ru',
        'text_kz',
        'text_en',
        'date',
        'slug',
        'views',
        'author',
    ];

    public function conference(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conference::class);
    }

    public function getShortDescription($limit = 200): string
    {
        return Str::limit(strip_tags($this->text_ru), $limit, '...');
    }
}
