<?php

define('EENHEDEN', [5000, 2000, 1000, 500, 200, 100, 50, 20, 10, 5]); // definities
try {
    if ($argc == 1) { // argc = arg count, telt argumenten. bij geen argumenten = 1, dus bij 1 arg zegt hij geen wisselgeld duh
        throw new Exception("Verkeerd aantal argumenten");
    }

    $geldgeef = round(floatval($argv[1]) * 20) * 5; // zet input om naar centen, bijv 5.34*20=106.8, round naar 107 en dan *5 = 535 centen
    //argv 1 want locatie van executie argument 0, je invoer is de 2e argument en dat is 1

    if ($argv[1] == 0) {
        throw new Exception("Geen bedrag meegegeven");
    }

    if (!is_numeric($argv[1])) {
        throw new Exception("ongeldig bedrag meegegeven");
    }

    if ($geldgeef <= 0) { // controleer negatief
        throw new Exception("negatief bedrag meegegeven");
    }

    foreach (EENHEDEN as $eenheid) { // ga door alle eenheden
        if ($geldgeef >= $eenheid) { // check grootte
            $count = floor($geldgeef / $eenheid); // bereken aantal keer / hoevaak gaat eenheid in geldgeef en dat antwoord gaat naar count
            if ($eenheid >= 100) { // check voor euro
                echo "$count x " . $eenheid / 100 . " euro\n"; // geef euro
            } else { // in centen
                echo "$count x " . $eenheid . " cents\n"; // geef cent
            }
            $geldgeef = $geldgeef % $eenheid; // // gaat door elke eenheid, groter of gelijk, zo niet dan gaat ie naar volgende eenheid, door foreach loop gaat die door alles
        }
    }
} catch (Exception $ex) {
    echo "Error opgevangen: " . $ex->getMessage();
} finally {
}

?>
