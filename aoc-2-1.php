<?php

$input = file_get_contents(__DIR__ . '/input-aoc2.txt');

$input = trim($input);

$data = explode("\n", $input);

$valid = 0;


foreach ($data as $key => $value) {

    $line = explode(' ', $data[$key]);
    print_r($line);
    $policy = $line[0];
    $positions = explode('-', $policy);
    $position1 = $range[0];
    $position2 = $range[1];
    $letter = substr($line[1], 0, -1);
    $password = $line[2];

    // $count = substr_count($password, $letter);

    if ($position1 == strpos($password, $letter) + 1 xor $position2 == strpos($password, $letter, $position1)) {

        // if ($count >= $min && $count <= $max) {
        $valid++;
    }
}

echo $valid;