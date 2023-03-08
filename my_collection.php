<?php

require_once "db_config.php"; 
require_once "session_data.php";

if(!$session_is_logged)
{
    echo "You must be logged in to continue";
    die();
}


mysqli_select_db($conn, DB_NAME);

$sql = "SELECT posts.id, image, name FROM posts INNER JOIN saved_posts ON saved_posts.post_id = posts.id WHERE saved_posts.user_id = '$session_user_id'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


while($row = mysqli_fetch_array($result))
{
    echo "<div class = \"gallery_item\" > ";
                    
    echo "<a href= \"display_post.php?post_id=". $row['id'] ."\" target=\"_blank\">";
    echo "<img src='images/" .  $row['image'] . "'>";
    echo "<center><button>" .$row['name'] . "</button></center>";
    echo "</a>";

    echo "</div>";

}


?>

<html>

<body>

<h1 class = "unDisplay"><?php echo $session_username;?>'s Collection</h1> 

<center><button class = "homeRe" onclick="location.href = 'index.php'"> Home </button></center> <!--"Home" button, redirects to index.php -->

<div class=container>
    
<style>


*
{
    box-sizing: border-box;
}

body
{
    margin: 0;
    /* background: #093014; */
    background: rgb(32,176,29);
    background: linear-gradient(90deg, rgba(32,176,29,1) 0%, rgba(3,55,7,1) 78%);

}

.container
{
   max-width: 1200px;
   margin: auto;
   overflow: auto;
}

.gallery_item
{
    margin: 5px;
    
    float: left;
    width: 390px;
}

.gallery_item img
{
    width: 100%;
    height: 50%;
}

.gallery_item button
{
    padding: 15px;
    text-align: center;
}

.unDisplay
{
    font-family: "Verdana", Sans-serif;
    top: 10px;
    right: 10px;
}

.homeRe
{
    background-color: #1BA696;
    border-radius: 8px;
    padding: 10px 20px;
    font-size: 16px;
    position: absolute;
    top: 20px;
    right: 0px;
}



</style>


</body>

</html>