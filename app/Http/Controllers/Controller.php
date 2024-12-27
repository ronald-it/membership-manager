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

    // Functie die op elke pagina uitgevoerd wordt om nieuwe boekjaren en contributies toe te voegen en het soort lid per familielid te updaten
    public function updateData() {
        $huidigJaar = Carbon::now()->year;
        $boekjaar = Boekjaar::where('jaar', '=', $huidigJaar)->first();

        if (!$boekjaar) {
            Boekjaar::create([
                'jaar' => $huidigJaar,
            ]);

            $nieuwe_boekjaar = Boekjaar::where('jaar','=', $huidigJaar)->first();
            $contributiesVorigJaar = Contributie::where('boekjaar_id', '=', $nieuwe_boekjaar->id-1)->get();

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
        $contributiesEersteJaar = Contributie::where('boekjaar_id', '=', 1)->get();
        
        foreach ($familieleden as $familielid) {
            $leeftijd = Carbon::parse($familielid->geboortedatum)->age;
            $lidsoort_id = 0;

            // De juiste id van het soort lid wordt gevonden door de leeftijd van de familielid te vergelijken met de contributies die bij de aanmaak in volgorde van de leeftijd klassen staan
            foreach ($contributiesEersteJaar as $contributieEersteJaar) {
                if ($leeftijd < $contributieEersteJaar->leeftijd) {
                    $lidsoort_id = $contributieEersteJaar->soort_lid;
                    break;
                }
            };
            
            $lidsoort = Lidsoort::find($lidsoort_id);
            $familielid->update(['lidsoort_id' => $lidsoort->id]);
        }
    }
}
