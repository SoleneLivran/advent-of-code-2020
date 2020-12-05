<?php

$input = file_get_contents(__DIR__ . '/input-aoc5.txt');

$input = trim($input);

$boardingPasses = explode("\n", $input);

$seatsIds = [];

foreach ($boardingPasses as $boardingPass) {
    $rows = substr($boardingPass, 0, 7);
    $columns = substr($boardingPass, 8, 3);

    $rows = str_replace('F', '0', $rows);
    $rows = str_replace('B', '1', $rows);
    $row = bindec($rows);

    $columns = str_replace('L', '0', $columns);
    $columns = str_replace('R', '1', $columns);
    $column = bindec($columns);

    $seatId = $row * 8 + $column;
    $seatsIds[] = $seatId;
}

$highestSeat = max($seatsIds);
echo $highestSeat;