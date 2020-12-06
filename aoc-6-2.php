<?php

$input = file_get_contents(__DIR__ . '/input-aoc6.txt');

$input = trim($input);

$groups = explode("\n\n", $input);


$groupsAnswers = [];

foreach ($groups as $group) {
    // compter le nombre de personnes
    $persons = explode("\n", $group);
    $personsCount = count($persons);

    $letters = [];

    $group = str_replace("\n", '', $group);

    for ($character = 0; $character < strlen($group); $character++) {
        $letter = substr($group, $character, 1);

        // compter combien de fois apparait la lettre dans le groupe
        $letterOccurrences = substr_count($group, $letter);

        // si la lettre apparait (nb de personnes) fois ET n'est pas encore dans letters : l'ajouter
        if ($letterOccurrences === $personsCount && !in_array($letter, $letters)) {
            $letters[] = $letter;
        }
    }

    $count = count($letters);
    $groupsAnswers[] = $count;

}

echo array_sum($groupsAnswers);
