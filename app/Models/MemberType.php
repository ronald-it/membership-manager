<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemberType extends Model
{
    protected $table = 'member_types';
    protected $fillable = ['description'];

    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class, 'member_type_id');
    }

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class, 'member_type');
    }
}
