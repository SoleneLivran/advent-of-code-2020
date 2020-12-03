<?php

$input = file_get_contents(__DIR__ . '/input-aoc2.txt');

$input = trim($input);

$data = explode("\n", $input);

$valid = 0;


foreach ($data as $key => $value) {

    $line = explode(' ', $data[$key]);
    $policy = $line[0];
    $positions = explode('-', $policy);
    $position1 = $positions[0]; //1
    $position2 = $positions[1]; //3
    $letter = substr($line[1], 0, -1);
    $password = $line[2];

    if (substr($password, $position1 - 1, 1) === $letter xor substr($password, $position2 - 1, 1) === $letter) {
        $valid++;
    }

    // all letters of the password in an array
//    $password = str_split($line[2]);

    // in the password array : find all occurrences of the letter
//    $letter_positions = array_keys($password, $letter);

//    echo "letter positions : ";
//    print_r($letter_positions);

//    $matching_positions = 0;
//
//    foreach ($letter_positions as $position) {
//        $position = $position +=1;

//        echo "ligne : ";
//        print_r($line);
//        echo "\n";
//
//        echo "positions autorisées : ";
//        print_r($allowed_positions);
//        echo "\n";
//
//        echo "letter positions : ";
//        print_r($letter_positions);
//        echo "\n";
//
//        echo "position : " . $position . "\n";
//        echo "\n";

//        if (in_array($position, $allowed_positions)) {
//            $matching_positions ++;
////            echo "matching : " . $matching_positions . "\n";
//        }
//    }
//
//    if ($matching_positions == 1) {
//        $valid ++;
//    }
}

echo "valid passwords : " . $valid;