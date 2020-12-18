<?php
    session_start();
if(isset($_SESSION["username"])){
            $user = $_SESSION["username"];
            $fname = $_SESSION["firstname"];
            $lname = $_SESSION["lastname"];
            }
?>
<html>
<head><title>User Homepage</title>
    <link rel="stylesheet" type="text/css" href="styles/userprofilestyles.css">
    </head>

    <body bgcolor="#AAB6F1" text="#002DFF">
        <?php 
            $username="root";
            $password="";
            $dsn = "mysql:host=localhost;dbname=mysql"; 
                
                $currentProfile = $_GET["profileName"];
                $currentProfile = str_replace(" ", '', $currentProfile);
                
            $imageURL = "./images/profilePictures/profile.png";  
        
            $dbcon = new PDO($dsn, $username, $password);
            $result = $dbcon->prepare("SELECT profilePic FROM members WHERE userID = \"$currentProfile\"");  
            $result->execute();
            $resultRecords = $result->fetchAll();
                
                if($resultRecords !== null){
                    foreach($resultRecords as $row){
                        $imageURL = $row[0];
                    }
                }else{
                    $imageURL = "./images/profilePictures/profile.png";
                }
        ?>
        
        <ul>
      <li><img src="images/snippits.png" alt="Home" style="height:50px;"></li>
            <?php
            if(isset($_SESSION["username"])){
            echo "<li>@$user \t\t $fname $lname</li>";
                }
                
      echo "<hr>";
            if(isset($_SESSION["username"]) == false){
            echo "<li><a class=\"active\" href=\"/Final/\">Home</a></li>";
                echo "<li><a href=\"create.php\">Create Account</a></li>"; 
                }
            if(isset($_SESSION["username"])){
    echo "<li><a href=\"./userhome.php\">Home</a></li>";   
      echo "<li><a class=\"active\" href=\"./userprofile.php?profileName=$user \">Profile</a></li>";
                if($currentProfile === $user){
      echo "<li><a href=\"./edituserprofile.php?profileName=$user\">Edit Profile</a></li>";
                }
      echo "<li><a href=\"./logout.php\">Logout</a></li>";
    
            }
          ?>
        </ul>
                <div id="profileHeader">
        
            <?php
                    echo "<img src=\"$imageURL\" height=200 />";
                ?>
                <br />
                    <?php
                    echo "@$currentProfile";
                    ?>
        
        </div>
        <div id="mainFeed">
            <table id="tweetstable">
                <?php
            
                    $user = "root";
                    $password = "";
                    $dsn = "mysql:host=localhost;dbname=mysql";
                try{
                        $dbcon = new PDO($dsn, $user, $password);
                        $result = $dbcon->prepare("SELECT * FROM tweets WHERE tweet_author = \"$currentProfile\" ORDER BY tweet_num DESC");
                        $result->execute();
                        $resultrecords = $result->fetchAll();
                        if($resultrecords == null){
                            echo "User has no snippets!";
                        }
                        else{
                            foreach($resultrecords as $row){
                                if($row[1] == $currentProfile)
                                    {
                                     echo nl2br("<td width=\"420\" height='auto' class='styled-td'><a href=\"userprofile.php?profileName=$row[1]\">@$row[1]</a> \n $row[2] \n <a href=\"deleteSnip.php\?snipID=$row[0]\">Delete</a></td></tr>");
                                    }else{
                                           echo nl2br("<td width=\"420\" height='auto' class='styled-td'><a href=\"userprofile.php?profileName=$row[1]\">@$row[1]</a> \n Content: $row[2]</td></tr>");
                                 }
                            }
                        }
                    }
                catch(PDOException $e){
                    echo $e;
                }
                
                function displayTweets(){
    echo "test";
        }
                ?>
            </table>
        </div>
    </body>

</html>
