<?php

declare(strict_types=1);

namespace App;
class StringHelper
{
    public static function firstNonRepeatingCharacter($input)
    {
        // Teile den Eingabe-String($input) in einzelne Zeichen auf und speichere sie als kleinbuchstaben in einem Array
        $characters = str_split(strtolower($input));

        // Erstelle ein leeres Array für später, um die Zeichenhäufigkeiten zu speichern
        $characterCounts = [];

        //Starte eine Schleif, die von 0 bis zur Anzahl der Zeichen im Eingabe-String($input) läuft
        for ($i = 0; $i < count($characters); $i++) {
            //Bei jedem Durchlauf der Schleife: Wähle das Zeichen an der aktuellen Position aus
            $character = $characters[$i];
            // Überprüfe, ob das Zeichen bereits im Array der Zeichenhäufigkeiten existiert
            if (!isset($characterCounts[$character])) {
                // Wenn das Zeichen noch nicht im Array existiert, setze die Anzahl auf 1
                $characterCounts[$character] = 1;
            } else {
                // Wenn das Zeichen bereits im Array existiert, erhöhe die Anzahl um 1
                $characterCounts[$character]++;
            }
        }

        //Starte eine Schleife und suche das erste Zeichen, das nur einmal vorkommt
        foreach ($characterCounts as $character => $count) {
            if ($count === 1) {
                //Wenn das Zeichen nur einmal vorkommt, wandele es in Kleinbuchstaben um und speichere es in $lowercaseInput
                $lowercaseInput = strtolower($input);
                // Finde die Position des Zeichens im Eingabe-String($input) (Kleinbuchstaben-Version)
                $position = strpos($lowercaseInput, $character);
                //Gebe das Zeichen aus dem ursprünglichen Eingabe-String($input) zurück
                return $input[$position];
            }
        }
        // Wenn kein solches Zeichen gefunden wurde, gib null zurück
        return null;
    }
}
