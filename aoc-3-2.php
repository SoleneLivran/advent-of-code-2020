<?php

$input = file_get_contents(__DIR__ . '/input-aoc3.txt');

$input = trim($input);

$data = explode("\n", $input);

function calc($data, $right, $down) {
    $trees = 0;
    $position = 0;

    for ($i = 0; $i < count($data); $i += $down) {
        $line = $data[$i];
        $character = substr($line, $position, 1);
        if ($character === '#') {
            $trees ++;
        }
        $position = ($position + $right) % strlen($line);
    }

    return $trees;
}

$res = calc($data, 1, 1)
    * calc($data, 3, 1)
    * calc($data, 5, 1)
    * calc($data, 7, 1)
    * calc($data, 1, 2);

echo $res;