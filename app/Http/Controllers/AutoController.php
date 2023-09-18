<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Szin;


class AutoController extends Controller
{
    public $motorTipusok = ['E' => "Elektromos",
                            "D" => "Diesel",
                            "B" => "Benzin",
                            "H" => "Hibrid"];

    public $meghajtasok = ["E" => "Első kerék",
                           "H" => "Hátsó kerék",
                           "O" => "Összkerék"];
    
    public function listaz(){
        $autok = Auto::all();
        return view('lista',["autok" => $autok,"motorTipusok" => $this->motorTipusok,"meghajtasok" => $this->meghajtasok]);
    }

    public function felvetel(){
        $szinek = Szin::all();

        return view('felvetel',["motorTipusok" => $this->motorTipusok,"meghajtasok" => $this->meghajtasok,"szinek" => $szinek]);
    }

    public function autoRogzites(Request $req){
        $req->validate(
            [
                "rendszam" => "required|min:6|max:10|alpha_num:ascii",
                "motor_tipus" => "required",
                "szin_id" => "required|min:1",
                "meghajtas" => "required"
            ],
            [
                "rendszam.required" => "A mező kitöltése kötelező",
                "rendszam.min" => "Minimum 6 karakter adj meg",
                "rendszam.max" => "Maximum 10 karaktert adj meg",
                "rendszam.alpha_num" => "Csak a-Z és 0-9",

                "motor_tipus.required" => "Válassz motor típust",
                
                "szin_id.required" => "Válassz színt!",
                "szin_id.min" => "Válassz színt!",

                "meghajtas.required" => "Váláassz meghatási módot!"
                
            ]
        );

        $auto = new Auto;
        $auto->rendszam = $req->input('rendszam');
        $auto->szin_id = $req->input('szin_id');
        $auto->meghajtas = $req->input('meghajtas');
        $auto->motor_tipus = $req->input('motor_tipus');
        $auto->save();

        return redirect()->route('felvetel')->with("felvetelKesz",'1');

    }

    public function modositas($aid){
        $auto = Auto::find($aid);
        $szinek = Szin::all();

        return view('felvetel',["auto" => $auto ,"motorTipusok" => $this->motorTipusok,"meghajtasok" => $this->meghajtasok,"szinek" => $szinek]);
    }
}
