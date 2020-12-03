<?php

$input = file_get_contents(__DIR__ . '/input-aoc2.txt');

$input = trim($input);

$data = explode("\n", $input);

$valid = 0;


foreach ($data as $key => $value) {

    $line = explode(' ', $data[$key]);
    $policy = $line[0];
    $allowed_positions = explode('-', $policy);
    $letter = substr($line[1], 0, -1);

    // all letters of the password in an array
    $password = str_split($line[2]);

    // in the password array : find all occurrences of the letter
    $letter_positions = array_keys($password, $letter);

//    echo "letter positions : ";
//    print_r($letter_positions);

    $matching_positions = 0;

    foreach ($letter_positions as $position) {
        $position = $position +=1;

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

        if (in_array($position, $allowed_positions)) {
            $matching_positions ++;
//            echo "matching : " . $matching_positions . "\n";
        }
    }

    if ($matching_positions == 1) {
        $valid ++;
    }
}

echo "valid passwords : " . $valid;