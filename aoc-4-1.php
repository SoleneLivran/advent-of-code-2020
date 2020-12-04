<?php

$input = file_get_contents(__DIR__ . '/input-aoc4.txt');

$input = trim($input);

$passwords = explode("\n\n", $input);
$valid = 0;

function checkBirthYear($string) {
    return strpos($string, 'byr:') !== false;
}

function checkIssueYear($string) {
    return strpos($string, 'iyr:') !== false;
}

function checkExpirationYear($string) {
    return strpos($string, 'eyr:') !== false;
}

function checkHeight($string) {
    return strpos($string, 'hgt:') !== false;
}

function checkHairColor($string)
{
    return strpos($string, 'hcl:') !== false;
}

function checkEyeColor($string) {
    return strpos($string, 'ecl:') !== false;
}

function checkPassportId($string) {
    return strpos($string, 'pid:') !== false;
}

foreach ($passwords as $password) {
    if (checkBirthYear($password)
        && checkIssueYear($password)
        && checkExpirationYear($password)
        && checkHeight($password)
        && checkHairColor($password)
        && checkEyeColor($password)
        && checkPassportId($password)) {
        $valid++;
    }
}

echo $valid;