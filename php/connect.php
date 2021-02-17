<?php
$servername = "localhost";
$usern = "root";
$paord = "";
$dbname = "lesson";

// Create connection
$sonawap = new mysqli($servername, $usern, $paord, $dbname);

// Check connection
if ($sonawap->connect_error) {
    die("Connection failed: " . $sonawap->connect_error);
}
///echo "connect";

?> 