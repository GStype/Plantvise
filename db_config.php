<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'plant_ws');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//checks if the connection to the database was successful.
if($conn === false)
{
    die('ERROR:' . mysqli_connect_error());
}
?>