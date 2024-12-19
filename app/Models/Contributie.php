<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contributie extends Model
{
    protected $table = 'contributies';
    protected $fillable = ['leeftijd', 'soort_lid', 'bedrag', 'boekjaar_id'];

    public function lidsoorten(): BelongsTo
    {
        return $this->belongsTo(Lidsoort::class, 'soort_lid');
    }
}
