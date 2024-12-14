<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Familielid extends Model
{
    use HasFactory;
    protected $table = 'familieleden';
    protected $fillable = ['familie_id', 'naam', 'geboortedatum', 'soort_lid'];
    public function families(): BelongsTo
    {
        return $this->belongsTo(Familie::class, 'familie_id');
    }

    public function lidsoorten(): BelongsTo
    {
        return $this->belongsTo(Lidsoort::class, 'lidsoort_id');
    }
}
