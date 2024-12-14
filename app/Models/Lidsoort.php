<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lidsoort extends Model
{
    protected $table = 'lidsoorten';
    protected $fillable = ['omschrijving'];

    public function familieleden(): HasMany
    {
        return $this->hasMany(Familielid::class, 'lidsoort_id');
    }
}
