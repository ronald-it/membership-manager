<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Familie extends Model
{
    protected $table = 'families';
    protected $fillable = ['naam', 'adres'];
    public function familieleden(): HasMany
    {
        return $this->hasMany(Familielid::class, 'familie_id');
    }
}
