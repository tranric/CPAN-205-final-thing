<?php
    session_start();
?>
<html>
<head><title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="styles/userhomestyles.css">
    </head>

    <body bgcolor="#AAB6F1" text="#002DFF">
        <?php
            if(isset($_SESSION["username"])){
            $username = $_SESSION["username"];
            $fname = $_SESSION["firstname"];
            $lname = $_SESSION["lastname"];
            }else{
                echo "You must be logged in to view this page.You will be redirected in 5 seconds";
            header('Location: ./');
            }
            
        ?>
        
        <ul>
      <li><img src="images/snippits.png" alt="Home" style="height:50px;"></li>
            <span id="userInfo">
            <?php
            echo "<li>@$username \t\t $fname $lname</li>";
                ?>
            </span>
      <hr>
      <li><a class="active" href="./userHome.php">Home</a></li>
        <?php
      echo "<li><a href=\"./userprofile.php?profileName=$username\">Profile</a></li>";
          ?>
      <li><a href="./logout.php">Logout</a></li>
    </ul>
        
        <div id="mainFeed">
            <form method="post" action="createtweet.php">
                <textarea name="tweetContent" rows="3" cols="50" maxlength="150"></textarea>
                <button type="submit" name="tweet">Snip</button>
                </form>
            <table id="tweetstable">
                <?php
            
                    $user = "root";
                    $password = "";
                    $dsn = "mysql:host=localhost;dbname=mysql";
                try{
                    $dbcon = new PDO($dsn, $user, $password);
                    $result = $dbcon->prepare("SELECT * FROM tweets ORDER BY tweet_num DESC");
                    $result->execute();
                    $resultrecords = $result->fetchAll();
                    
                        if($resultrecords == null){
                            echo "Result is null.";
                        }else{
                            foreach($resultrecords as $row){
                                if($row[1] == "".$_SESSION["username"])
                                {
                                echo nl2br("<td width=\"420\" height='auto' class='styled-td'><a href=\"userprofile.php?profileName=$row[1]\">@$row[1]</a> \n $row[2] \n <a href=\"deleteSnip.php\?snipID=$row[0]\">Delete</a></td></tr>");
                                }else{
                                    echo nl2br("<td width=\"420\" height='auto' class='styled-td'><a href=\"userprofile.php?profileName=$row[1]\">@$row[1]</a> \n $row[2]</td></tr>");
                                }
                            }
                        }
                    }
                catch(PDOException $e){
                    echo $e;
                }
                
                ?>
            </table>
        </div>
    </body>

</html>
