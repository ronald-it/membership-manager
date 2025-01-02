<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contribution extends Model
{
    protected $table = 'contributions';
    protected $fillable = ['age', 'member_type', 'amount', 'fiscal_year_id'];

    public function memberTypes(): BelongsTo
    {
        return $this->belongsTo(MemberType::class, 'member_type');
    }
}
