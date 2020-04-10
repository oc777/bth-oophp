<?php 
require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

// clean up session
$_SESSION["doGuess"] = null;
$_SESSION["doCheat"] = null;
$_SESSION["res"] = null;
$_SESSION["err"] = null;

// get the game obj from session
$game = $_SESSION["game"];

// get data from POST
$guess = $_POST["guess"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doStart = $_POST["doStart"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;

// game restart
if ($doStart) {
    $_SESSION["game"] = new Guess();
    $game = $_SESSION["game"];
}

// doGuess
if ($doGuess && ($game->tries() > 0)) {
    try {
        $res = $guess . " is " . $game->makeGuess($guess);
        $_SESSION["doGuess"] = $doGuess;
        $_SESSION["res"] = $res;
    } catch (GuessException $e) {
        $_SESSION["err"] = "Got exception: " . $e->getMessage(); //get_class($e);
    }
} else {
    $res = "You are out of tries";
    $_SESSION["doGuess"] = $doGuess;
    $_SESSION["res"] = $res;
}

if ($doCheat) {
    $_SESSION["doCheat"] = $doCheat;
}

// Redirect to a result page.
$url = "index.php";
header("Location: $url");
