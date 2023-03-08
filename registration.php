<?php
   
require_once "db_config.php"; //executes db_config.php



mysqli_select_db($conn, DB_NAME);
$un = mysqli_real_escape_string($conn, $_POST['username']);
$pw = mysqli_real_escape_string($conn, $_POST['password']);
$rpw = mysqli_real_escape_string($conn, $_POST['repassword']);

$checkQuery = "select * from users where Username = '$un'";

$queryResult = mysqli_query($conn, $checkQuery);

$totalRows = mysqli_num_rows($queryResult);

if ($totalRows == 1)
{
    //echo 'This username already exists.';
    echo "<script type='text/javascript'>alert('This username already exists.'); window.location.href='register.php'</script>";
}
else if ($pw != $rpw)
{
    //$errorMsg = "The passwords you inserted do not match.";
    echo "<script type='text/javascript'>alert('The passwords you inserted do not match.');</script>";

    header("location: register.php?errorText=$errorMsg"); 

}
else if (strlen($un) < 4 || strlen($un) > 15)
{
    //$errorMsg = "Your username has to be 4-15 characters long.";
    //$error = $_SESSION["Your username has to be 4-15 characters long."];
    echo "<script type='text/javascript'>alert('Your username has to be 4-15 characters long.');</script>";

    header("location: register.php?errorText=$errorMsg"); 

}
else 
{
    $insertQuery = "insert into users(Username, Password) values ('$un', '$pw')";
    $queryResult = mysqli_query($conn, $insertQuery);
    header("location: login.php?regSucc=$un"); 
    //echo "Welcome $un";
}



/*
$username = $errorMessage = $password = $confirmPassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST["username"]))) //if username is empty
    {
        $errorMessage = "Please insert a username.";
    }
    else
    {
        $sql = "SELECT id from users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $error = "Username already exists"
                }
                else
                {
                    $username = trim($_POST[])
                }
            }
        }
    }
}*/

?>