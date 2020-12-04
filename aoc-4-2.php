<?php

$input = file_get_contents(__DIR__ . '/input-aoc4.txt');

$input = trim($input);

$valid = 0;

$passports = explode("\n\n", $input);

function formatPassport($passportData)
{
    $passport = str_replace("\n", ' ', $passportData);
    $passport = explode(' ', $passport);

    $formattedPassport = [];
    foreach($passport as $field) {
        $parts = explode(':', $field);
        $formattedPassport[$parts[0]] = $parts[1];
    }

    return $formattedPassport;
}

// For each passport
foreach ($passports as $passport) {
    $passport = formatPassport($passport);

    // Check if all required fields are present
    if (array_key_exists('byr', $passport) === false
        || array_key_exists('iyr', $passport) === false
        || array_key_exists('eyr', $passport) === false
        || array_key_exists('hgt', $passport) === false
        || array_key_exists('hcl', $passport) === false
        || array_key_exists('ecl', $passport) === false
        || array_key_exists('pid', $passport) === false) {
        echo "KO because missing field\n";
        continue;
    }

    // Check birth year
    if ($passport['byr'] < 1920 || $passport['byr'] > 2002) {
        echo "KO because " . $passport['byr'] . " is not between 1920 and 2002\n";
        continue;
    }

    // Check issue year
    if ($passport['iyr'] < 2010 || $passport['iyr'] > 2020) {
        echo "KO because " . $passport['iyr'] . " is not between 2010 and 2020\n";
        continue;
    }

    // Check expiration year
    if ($passport['eyr'] < 2020 || $passport['eyr'] > 2030) {
        echo "KO because " . $passport['eyr'] . " is not between 2020 and 2030\n";
        continue;
    }

    // Check height
    if (substr($passport['hgt'], 3, 2) === 'cm') {
        if (substr($passport['hgt'], 0, 3) < 150 || substr($passport['hgt'], 0, 3) > 193) {
            echo "KO because " . $passport['hgt'] . " is not between 150cm and 193cm\n";
            continue;
        }
    } elseif (substr($passport['hgt'], 2, 2) === 'in') {
        if (substr($passport['hgt'], 0, 2) < 59 || substr($passport['hgt'], 0, 2) > 76) {
            echo "KO because " . $passport['hgt'] . " is not between 59in and 76in\n";
            continue;
        }
    } else {
        echo "KO because " . $passport['hgt'] . " is not in or cm\n";
        continue;
    }

    // Check hair color
    if (preg_match('/^#[0-9a-f]{6}$/', $passport['hcl']) === 0) {
        echo "KO because " . $passport['hcl'] . " is not ^#[0-9a-f]{6}$\n";
        continue;
    }

    // Check eye color
    if (! in_array($passport['ecl'], ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'])) {
        echo "KO because " . $passport['ecl'] . " is not in ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth']\n";
        continue;
    }

    // Check passport ID
    if (preg_match('/^[0-9]{9}$/', $passport['pid']) === 0) {
        echo "KO because " . $passport['pid'] . " is not ^[0-9]{9}$\n";
        continue;
    }

    $valid ++;
}
echo $valid;
