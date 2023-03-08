<?php

    require_once "db_config.php"; 
    require_once "session_data.php";

    if(isset($_POST['post_id']) && isset($_POST['user_id']))
    {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);

        mysqli_select_db($conn, DB_NAME);

        $sql = "SELECT id FROM saved_posts WHERE user_id = '$user_id' AND post_id = '$post_id'";

        $result = mysqli_query($conn, $sql);

        $has_saved = mysqli_num_rows($result) > 0;

        if(!$has_saved)
        {
            $sql = "INSERT INTO saved_posts VALUES(NULL, '$user_id', '$post_id')";


        }
        else
        {
            $sql = "DELETE FROM saved_posts WHERE(user_id = '$user_id' AND post_id = '$post_id')";
        }

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


        echo $user_id;
        echo $post_id;
        echo $result;
        
    }