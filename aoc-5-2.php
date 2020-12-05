<?php

$input = file_get_contents(__DIR__ . '/input-aoc5.txt');

$input = trim($input);

$boardingPasses = explode("\n", $input);

$seatsIds = [];

/**
 * @param $boardingPass
 * @return float|int
 */
function boardingPassToSeatId($boardingPass)
{
    $rows = substr($boardingPass, 0, 7);
    $columns = substr($boardingPass, 7, 3);

    $rows = str_replace('F', '0', $rows);
    $rows = str_replace('B', '1', $rows);
    $row = bindec($rows);

    $columns = str_replace('L', '0', $columns);
    $columns = str_replace('R', '1', $columns);
    $column = bindec($columns);

    $seatId = $row * 8 + $column;
    return $seatId;
}

foreach ($boardingPasses as $boardingPass) {
    $seatId = boardingPassToSeatId($boardingPass);
    $seatsIds[] = $seatId;
}

// pour chaque row de 0 a 127
for ($planeRow = 0; $planeRow <= 127; $planeRow ++) {
    // pour chaque column
    for ($planeColumn = 0; $planeColumn <= 7; $planeColumn ++) {

        // générer l'ID de la place et celles autour
        $seat = $planeRow * 8 + $planeColumn;
        $previousSeat = $planeRow * 8 + $planeColumn - 1;
        $nextSeat = $planeRow * 8 + $planeColumn + 1;
        //  et voir si la place est dans la liste
        if (in_array($seat, $seatsIds) === false) {
            // si non :
            // si +1 existe et -1 existe : C'est ma place
            if (in_array($nextSeat, $seatsIds) === true && in_array($previousSeat, $seatsIds) === true) {
                echo "my seat = " . $seat;
            }
        }
    }
}

