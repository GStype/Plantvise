<?php

require_once "session_data.php";
require_once "db_config.php";



if(!$session_is_logged)
{
    echo "Access denied :(";
    die();
}

if(isset($_POST['uploadBtn']))
{
    $target = "images/" . basename($_FILES['imageInput']['name']);

    mysqli_select_db($conn, DB_NAME);

    $image = $_FILES['imageInput']['name'];
    $name = mysqli_real_escape_string($conn, $_POST['nameInput']); //avoid sql injection.
    $description = mysqli_real_escape_string($conn, $_POST['descriptionInput']);

    $sql = "INSERT INTO posts (image, name, description) VALUES ('$image', '$name', '$description')";

    $result = mysqli_query($conn, $sql);

    move_uploaded_file($_FILES['imageInput']['tmp_name'], $target);
    

}


?>

<html>
<h1>Hello admin</h1>

<body>
<form action="dashboard.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="size" value="100000">

<input type = "file" name="imageInput"></input>

<label for = "nameInput">Plant's name</label>

<input type = "text" name = "nameInput" required></input>


<label for = "descriptionInput">Plant's description:</label>

<textarea rows = "5" cols = "60" name = "descriptionInput">
</textarea><br>

<input type="submit" name="uploadBtn" value="Upload post">
    
</body>


</html>




