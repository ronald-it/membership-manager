<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Familielid extends Model
{
    protected $table = 'familieleden';
    protected $fillable = ['familie_id', 'naam', 'geboortedatum', 'soort_lid'];
    public function families(): BelongsTo
    {
        return $this->belongsTo(Familie::class, 'familie_id');
    }
}
