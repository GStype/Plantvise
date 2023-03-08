<?php

session_start();


$session_is_logged = isset($_SESSION['session_logged']); //find if user is authenticated

if($session_is_logged)
{
    $session_username = $_SESSION['session_un'];
    $session_user_id = $_SESSION['session_id'];
    
    
    //if the username is "Admin" then mark this variable as true 
    //so we can grant his access to the dashboard page later.
    $session_is_admin = $_SESSION['session_isAdmin'];
    
}


?>

