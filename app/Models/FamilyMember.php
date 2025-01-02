<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyMember extends Model
{
    use HasFactory;
    protected $table = 'family_members';
    protected $fillable = ['family_id', 'name', 'date_of_birth', 'member_type_id'];
    public function families(): BelongsTo
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function memberTypes(): BelongsTo
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }
}
