<?php

require_once( './file_a.php' );

$wrkr = new Worker();
echo '<p>This php file retrieved the greeting (from file_a.php)...</p>';
echo '<p>' . $wrkr->greet() . '</p>';
echo '<p>' . '...without displaying unwanted output from file_a.php'  . '</p>';
echo '<a href="./file_a.php">back</a>';

?>
