<?php
$input = file_get_contents(__DIR__ . '/input-aoc1.txt');

$input = trim($input);

$input = explode("\n", $input);

$numbers = [];


foreach ($input as $key => $value) {
    if (array_key_exists($key+1, $input)) {
        for ($i = ($key+1); $i < count($input); $i++) {
            for ($j = ($i+1); $j < count($input); $j++) {
                $result = $value + $input[$i] + $input[$j];
                if ($result == 2020) {
                    $numbers[] = $value;
                    $numbers[] = $input[$i];
                    $numbers[] = $input[$j];
                }
            }
        }
    }
}


$expense = $numbers[0] * $numbers[1] * $numbers[2];

echo $expense;
