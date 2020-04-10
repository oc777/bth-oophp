<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init game & redirect to Play game.
 */
$app->router->get("guess/init", function () use ($app) {
    // session init
    $game = new OC\Guess\Guess();
    $_SESSION["game"] = $game;
    return $app->response->redirect("guess/play");
});



/**
 * Play game.
 */
$app->router->get("guess/play", function () use ($app) {
    // echo "Some debugging information";
    $title = "Guess Game";
    $data = [
        "who" => "moi",
    ];



    $app->page->add("guess/play", $data);
    $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * POST process
 */
$app->router->post("guess/post-process", function () use ($app) {
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
        $_SESSION["game"] = new OC\Guess\Guess();
    }

    // doGuess
    if ($doGuess && ($game->tries() > 0)) {
        try {
            $res = $guess . " is " . $game->makeGuess($guess);
            $_SESSION["doGuess"] = $doGuess;
            $_SESSION["res"] = $res;
        } catch (OC\Guess\GuessException $e) {
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

    return $app->response->redirect("guess/play");
});
