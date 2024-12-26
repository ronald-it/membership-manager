<?php

namespace App\Http\Controllers;

use App\Models\Boekjaar;
use App\Models\Contributie;
use App\Models\Familielid;
use App\Models\Lidsoort;
use Carbon\Carbon;

abstract class Controller
{
    public function __construct() {
        $this->updateData();
    }

    public function updateData() {
        $huidigJaar = Carbon::now()->year;
        $boekjaar = Boekjaar::where('jaar', '=', $huidigJaar)->first();

        if (!$boekjaar) {
            Boekjaar::create([
                'jaar' => $huidigJaar,
            ]);

            $nieuwe_boekjaar = Boekjaar::where('jaar','=', $huidigJaar)->first();
            $contributiesVorigJaar = Contributie::where('boekjaar', '=', $huidigJaar-1)->get();

            foreach ($contributiesVorigJaar as $contributieVorigJaar) {
                Contributie::create([
                    'leeftijd' => $contributieVorigJaar->leeftijd,
                    'soort_lid' => $contributieVorigJaar->soort_lid,
                    'bedrag' => $contributieVorigJaar->bedrag,
                    'boekjaar_id' => $nieuwe_boekjaar->id
                ]);
            }
        }

        $familieleden = Familielid::all();
        
        foreach ($familieleden as $familielid) {
            $leeftijd = Carbon::parse($familielid->geboortedatum)->age;
            $omschrijving = match (true) {
                $leeftijd < 8 => 'jeugd',
                $leeftijd < 12 => 'aspirant',
                $leeftijd < 17 => 'junior',
                $leeftijd < 51 => 'senior',
                default => 'oudere',
            };
            
            $lidsoort = Lidsoort::where('omschrijving', '=', $omschrijving)->first();
            $familielid->update(['lidsoort_id' => $lidsoort->id]);
        }
    }
}
