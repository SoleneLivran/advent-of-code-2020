<?php

$input = file_get_contents(__DIR__ . '/input-aoc9.txt');
//$input = '35
//20
//15
//25
//47
//40
//62
//55
//65
//95
//102
//117
//150
//182
//127
//219
//299
//277
//309
//576';

$input = trim($input);

$numbers = explode("\n", $input);

$preamble = [];

// create the preamble :
for ($i = 0; $i < 25; $i++) {
    $currentNumber = $numbers[$i];
    $preamble[] = $currentNumber;
}

// iterate over all the numbers,
// from first number after initial preamble, to last number
for ($i = count($preamble); $i < count($numbers); $i++) {
    $currentNumber = $numbers[$i];

    if (!isNumberSumOfTwoArrayValues($preamble, $currentNumber)) {
        echo $currentNumber;
        die;
    }

    // actualise the preamble for next iteration
    array_shift($preamble);
    $preamble[] = $currentNumber;
}

function isNumberSumOfTwoArrayValues(array $preamble, int $number): bool
{
    foreach ($preamble as $key => $preambleNumber) {
        for ($i = $key+1; $i < count($preamble); $i++) {
            if ($preambleNumber + $preamble[$i] === $number) {
                return true;
            }
        }
    }
    return false;
}

