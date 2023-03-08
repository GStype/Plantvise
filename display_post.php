<?php

require_once "db_config.php"; 
require_once "session_data.php";

$post_id = $post_name = $post_desc = $post_img = $guest_style = "";

if($session_is_logged)
{
    $$guest_style = "style='display:none'";
}

if (isset($_GET['post_id']))
{
    $post_id = $_GET['post_id'];

    mysqli_select_db($conn, DB_NAME);
                
    $sql = "select * from posts where id = '$post_id'";

    $result = mysqli_query($conn, $sql);
    


    while($row = mysqli_fetch_assoc($result))
    {        
        $post_name = $row['name'];
        $post_desc = $row['description'];
        $post_image = $row['image'];
    }

}
else
{
    echo "404 Not Found";
    die();
}

?>

<html>

    <body>

    <?php
        echo "<center><h1>" .$post_name . "</h1></sdfgfdgsdfgcenter>";
        echo "<h3 class = \"descDisplayed\">" .$post_desc . "</h3>";
        
        echo "<img class = \"imgDisplayed\" src='images/" .  $post_image . "'>";



        $sql = "SELECT id FROM saved_posts WHERE user_id = '$session_user_id' AND post_id =" . $post_id;

        $status = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $has_saved = mysqli_num_rows($status) > 0;





        $button_text = ($has_saved == true) ? "Remove from my saved plants" : "Save to my plants";

        echo "<button onclick = \"SavePlantPost(". $post_id . "," . $session_user_id . ")\">" . $button_text . "</button>";
    ?>


    <script>

            function SavePlantPost(postID, userID)
            {

                
                let XHR = new XMLHttpRequest();
                XHR.addEventListener( 'load', function(event) 
                {
                  window.location.reload();
                    
                } );
                let formData = new FormData();
                

                formData.append("post_id", postID);
                formData.append("user_id", userID);

                XHR.open('POST', 'save_plant.php');



                XHR.send(formData);

                
            }	

    </script>
    
    <style>
        body
        {
            margin: 0;
            /* background: #093014; */
            background: rgb(0,0,0);
            background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(11,61,25,1) 100%);

        }   

        Button
        {
            background-color: #1BA696;
            position: absolute;
            border-radius: 4px;
            top: 600px;
            right: 310px;
        }

        .imgDisplayed
        {
            width: 20%;
            height: 50%;
        }

        .descDisplayed
        {
            /* font-family: "Times New Roman", serif; */
        }
        
    



    </style>



    </body>

</html>