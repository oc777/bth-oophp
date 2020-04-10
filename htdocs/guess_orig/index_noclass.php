<?php 
require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

$min = 1;
$max = 100;
$rounds = 5;

$number = $_POST["number"] ?? null;
$tries = $_POST["tries"] ?? null;
$guess = $_POST["guess"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doStart = $_POST["doStart"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;

if ($doStart || $number === null) {
    $number = rand($min, $max);
    $tries = $rounds;
} elseif ($doGuess) {
    $tries -= 1;
    if ($guess === $number) {
        $res = "CORRECT";
    } elseif ($guess < $number) {
        $res = "TOO LOW";
    } else {
        $res = "TOO HIGH";
    }
}

require __DIR__ . "/view/guess-form.php";
