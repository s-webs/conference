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
}
