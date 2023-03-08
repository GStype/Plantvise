<?php

require_once "db_config.php"; 
require_once "session_data.php";
 
if(!$session_is_logged)
{
    echo "You need to be logged in to access the website."; //In order to access the site, one has to log in.
    die();
}

?>

<html>

    <head>
        
    </head>

    <body>
    <h1>Welcome, <?php echo $session_username;?></h1>
    
    <center><img class = "logo" src="images/logo.png"></center>

    <p class = "weatherReminder"> 
        Make sure you check your local<br>
        weather before you take care of<br>
        your plants!
    </p>

		<button class = "logoutButton" onclick="location.href = 'logout.php'"> Log out </button>


    <!-- Weather API that fetches your loaction's weather -->
    <iframe class = "api" src="https://www.meteoblue.com/en/weather/widget/daily?geoloc=detect&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&spot=1&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 216px; height: 420px"></iframe><div><!-- DO NOT REMOVE THIS LINK --></div>


        <div class=container>

        <button class = "collButton" onclick="location.href='my_collection.php'" type="button">
         View my collection</button>

            <!-- Display all posts -->
            <?php

                mysqli_select_db($conn, DB_NAME);
                
                $sql = "select * from posts";

                $result = mysqli_query($conn, $sql);

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

        </div>
        

    <style>


        *
        {
            box-sizing: border-box;
        }

        body
        {
            margin: 0;
            /* background: #093014; */
            /* background-image: linear-gradient(rgb(0,100,0), rgb(34,139,34)); */
            background: rgb(9,48,20);
            background: linear-gradient(90deg, rgba(9,48,20,1) 0%, rgba(33,152,61,1) 52%, rgba(0,255,25,1) 100%);   
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

        .collButton
        {
            background-color: #1BA696;
            border-radius: 8px;
            padding: 10px 25px;
            font-size: 16px;
            position: absolute;
            top: 0px;
            right: 0px;
        }

        .weatherReminder
        {
            font-family: "Verdana", Sans-serif;
        }

        .logoutButton
        {
            background-color: #303226;
            border-radius: 2px;
            padding: 8px 20px;
            font-size: 16px;
            position: absolute;
            top: 50px;
            right: 0px;
        }

    </style>

    </body>

</html>