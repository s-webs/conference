<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    public function speakers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Speaker::class);
    }

    public function organizingCommitteeMembers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrganizingCommitteeMember::class);
    }

    public function sponsors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sponsor::class);
    }

    public function gallery(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function allPhotos()
    {
        return $this->gallery->flatMap(function ($gallery) {
            return $gallery->images;
        })->all();
    }
}
