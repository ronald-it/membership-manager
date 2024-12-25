<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gebruiker extends Model
{
    protected $table = 'gebruikers';
    protected $fillable = ['email, gebruikersnaam, wachtwoord'];
}
