<?php

require_once "db_config.php"; //executes db_config.php

session_start();

mysqli_select_db($conn, DB_NAME);
$un = mysqli_real_escape_string($conn, $_POST['username']);
$pw = mysqli_real_escape_string($conn, $_POST['password']);

$checkQuery = "select * from users where Username = '$un' && Password = '$pw'";

$queryResult = mysqli_query($conn, $checkQuery);

$totalRows = mysqli_num_rows($queryResult);
if ($totalRows == 1) //checks if the username insterted by the user exists in the database.
{
    $findIDQuery = "select id from users where Username = '$un'";

    $queryResult = mysqli_query($conn, $findIDQuery);

    $userID = mysqli_fetch_row($queryResult)[0];

    $_SESSION['session_un'] = $un;
    $_SESSION['session_id'] = $userID;
    $_SESSION['session_logged'] = True;
    //if the username is "Admin" then mark this variable as true 
    //so we can grant his access to the dashboard page later.
    $_SESSION['session_isAdmin'] = ($un == "Admin") ? True : False; 
    header("location: index.php");

}
else
{
    header("location: login.php?unParam=$un"); //returns the user to the login screen, without deleting the username they inserted from the textbox.
}


?>