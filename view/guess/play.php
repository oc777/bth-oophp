<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><h1>Guess Number</h1>
<p>I'm thinking of number between 1 and 100...</p>

<form method="post" action="post-process">
<input type="text" name="guess" autocomplete="off" required>
<br>
<input type="submit" name="doGuess" value="guess">
<input type="submit" name="doCheat" value="cheat" formnovalidate>
<input type="submit" name="doStart" value="restart" formnovalidate>
</form>

<div class="info">
<?php if (isset($_SESSION["doGuess"])) : ?>
    <p><?=$_SESSION["res"] ?></p>
    <p>You have <?= $_SESSION["game"]->tries() ?> tries left</p>
<?php endif; ?>

<?php if (isset($_SESSION["doCheat"])) : ?>
    <p>The number is <?= $_SESSION["game"]->number() ?></p>
<?php endif; ?>

<?php if (isset($_SESSION["err"])) : ?>
    <p style="color:red;"><?=$_SESSION["err"] ?></p>
<?php endif; ?>

</div>
