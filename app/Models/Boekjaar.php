<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boekjaar extends Model
{
    protected $table = 'boekjaren';
    protected $fillable = ['jaar'];

    public function contributies(): HasMany
    {
        return $this->hasMany(Contributie::class, 'boekjaar_id');
    }
}
