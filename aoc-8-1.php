<?php

$bootCode = file_get_contents(__DIR__ . '/input-aoc8.txt');

$bootCode = trim($bootCode);

$instructions = explode("\n", $bootCode);

$formattedInstructions = [];

foreach ($instructions as $instruction) {
    $instruction = explode(' ', $instruction);
    $formattedInstructions[] = $instruction;
}

$accumulator = 0;
$executedInstructions = [];

$i = 0;

while (!in_array($i, $executedInstructions)) {
        $executedInstructions[] = $i;
        if ($formattedInstructions[$i][0] === 'acc') {
            $accumulator += $formattedInstructions[$i][1];
            $i++;
            continue;
        } elseif ($formattedInstructions[$i][0] === 'jmp') {
            $i += $formattedInstructions[$i][1];
            continue;
        } elseif ($formattedInstructions[$i][0] === 'nop') {
            $i++;
            continue;
        }
}

var_dump($accumulator);
