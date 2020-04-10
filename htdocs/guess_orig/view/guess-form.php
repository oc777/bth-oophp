<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Guess Number</h1>
<p>I'm thinking of number between 1 and 100...</p>

<form method="post" action="post-process.php">
<input type="text" name="guess" autocomplete="off" required>
<br>
<input type="submit" name="doGuess" value="guess">
<input type="submit" name="doCheat" value="cheat" formnovalidate>
<input type="submit" name="doStart" value="restart" formnovalidate>
</form>

<div class="info">
<?php if (isset($_SESSION["doGuess"])) : ?>
    <p><?=$_SESSION["res"] ?></p>
    <p>You have <?= $game->tries() ?> tries left</p>
<?php endif; ?>

<?php if (isset($_SESSION["doCheat"])) : ?>
    <p>The number is <?= $game->number() ?></p>
<?php endif; ?>

<?php if (isset($_SESSION["err"])) : ?>
    <p style="color:red;"><?=$_SESSION["err"] ?></p>
<?php endif; ?>

</div>

<!-- <div class="debug">
GET: <?= var_dump($_GET) ?>
<br>
POST: <?= var_dump($_POST) ?>
<br>
Session: <?= var_dump($_SESSION) ?>
</div> -->


</body>
</html>


