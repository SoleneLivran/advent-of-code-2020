<?php

$input = file_get_contents(__DIR__ . '/input-aoc7-example2.txt');

$input = trim($input);

$instructions = explode("\n", $input);

// build an array with parent => children

$colors = [];

// For each instruction...
foreach ($instructions as $instruction) {
    //...extract the colors :
    preg_match_all(
        "/(?P<color>[a-z ]+) bag(s?)/",
        $instruction,
        $instructionColors
    );

    // the containing color is the first found color
    $parentColor = $instructionColors['color'][0];

    if (!array_key_exists($parentColor, $colors)) {
        $colors[$parentColor] = [];
    }

    // the contained colors are the other found colors
    // for each contained color...
    for ($childrenColorIndex = 1; $childrenColorIndex <= count($instructionColors['color']); $childrenColorIndex ++) {
        if (array_key_exists($childrenColorIndex, $instructionColors['color'])) {
            $currentColor = trim($instructionColors['color'][$childrenColorIndex]);

//            // if it's not already in $colors[]
//            if (!array_key_exists($currentColor, $colors)) {
//                //add it to $colors (as $colors[color] = [])
//                $colors[$currentColor] = [];
//            }

            // if the containing color is not in color at the index of the current color...
            if (!in_array($currentColor, $colors[$parentColor])) {
                // ...add it as a containing color for the current color
                $colors[$parentColor]['child_color'] = $currentColor;
                $colors[$parentColor]['child_count'] = 2;
            }
        }
    }
}

var_dump($colors);

function calculateBags(array $colors, string $color): int {
    $nbBags = 1;

    if (!isset($colors[$color])) {
        return $nbBags;
    }

    foreach ($colors[$color] as $containedColor) {
        $nbBags += calculateBags($colors, $containedColor);
    }

    return $nbBags;
}
