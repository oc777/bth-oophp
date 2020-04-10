<?php 
require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

$game;
$res;

if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess();
}
$game = $_SESSION["game"];

require __DIR__ . "/view/guess-form.php";
