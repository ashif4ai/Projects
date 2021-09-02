<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'sql113.ultimatefreehost.in');
define('DB_USERNAME', 'ltm_29603136');
define('DB_PASSWORD', 'Ashif_5731ultimatefreehot');
define('DB_NAME', 'ltm_29603136_ashif_projects');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>