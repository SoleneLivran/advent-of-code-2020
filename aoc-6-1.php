<?php

$input = file_get_contents(__DIR__ . '/input-aoc6.txt');

$input = trim($input);

$groups = explode("\n\n", $input);


$groupsAnswers = [];

foreach ($groups as $group) {
    $letters = [];

    $group = str_replace("\n", '', $group);

    for ($character = 0; $character < strlen($group); $character++) {
        $letter = substr($group, $character, 1);
//        echo "letter num " . $character . " = " . $letter . "\n";
        if (!in_array($letter, $letters)) {
            $letters[] = $letter;
        }
    }

    $count = count($letters);
    $groupsAnswers[] = $count;

}

echo array_sum($groupsAnswers);
