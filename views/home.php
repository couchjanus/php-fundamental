<?php
require_once realpath(__DIR__).'/includes/head.php';

    echo "<h1>Hello Home Page</h1>";
    echo "<h2>".$posts[0]["title"]."</h2>";
    echo "<p>".$posts[0]["content"]."</p>";

require_once realpath(__DIR__).'/includes/footer.php';
?>