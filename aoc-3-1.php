<?php

$input = file_get_contents(__DIR__ . '/input-aoc3.txt');

$input = trim($input);

$data = explode("\n", $input);

$trees = 0;
$position = 0;

foreach ($data as $line) {
    $character = substr($line, $position, 1);
    if ($character === '#') {
        $trees ++;
    }
    $position = ($position + 3) % strlen($line);
}

echo $trees;