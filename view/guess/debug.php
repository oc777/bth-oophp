<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?><hr>
<h3>Debug</h3>
<pre>
Session: <?= var_dump($_SESSION) ?>
GET: <?= var_dump($_GET) ?>
POST: <?= var_dump($_POST) ?>
</pre>
