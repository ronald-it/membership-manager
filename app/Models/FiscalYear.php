<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FiscalYear extends Model
{
    protected $table = 'fiscal_years';
    protected $fillable = ['year'];

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class, 'fiscal_year_id');
    }
}
