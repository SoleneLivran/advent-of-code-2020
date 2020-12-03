<?php

$input = file_get_contents(__DIR__ . '/input-aoc1.txt');

$input = trim($input);

$input = explode("\n", $input);

$numbers = [];


foreach ($input as $key => $value) {
    if (array_key_exists($key+1, $input)) {
        for ($i = ($key+1); $i < count($input); $i++) {
            $result = $value + $input[$i];
            if ($result == 2020) {
                $numbers[] = $value;
                $numbers[] = $input[$i];
            }
        }
    }
}


$expense = $numbers[0] * $numbers[1];

echo $expense;


// Solution avec array_slice

// foreach ($test_input as $key => $value1) {
//     $slice = array_slice($test_input, $key);
//     foreach($slice as $value2) {
//         $result = $value1 + $value2;
//         if ($result === 2020) {
//             echo $value1 * $value2;
//             die;
//         }
//     }
// }
