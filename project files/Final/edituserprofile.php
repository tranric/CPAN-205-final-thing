<?php
    session_start();
?>
<html>
<head><title>Edit Your User Profile</title>
    <link rel="stylesheet" type="text/css" href="styles/userprofilestyles.css">
    
    </head>

    <body bgcolor="#AAB6F1" text="#002DFF">
        
        <?php
            if(isset($_SESSION["username"])){
            $user = $_SESSION["username"];
            $fname = $_SESSION["firstname"];
            $lname = $_SESSION["lastname"];
                
            $username="root";
            $password="";
            $dsn = "mysql:host=localhost;dbname=mysql"; 
                
            $dbcon = new PDO($dsn, $username, $password);
                    $result = $dbcon->prepare("SELECT profilePic FROM members WHERE userID = \"$user\"");
                }

            $result->execute();
                $resultRecords = $result->fetchAll();
                if($resultRecords != null){
                    foreach($resultRecords as $row){
                        $imageURL = $row[0];
                    }
                }else{
                    
                $imageURL = "";
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
      echo "<li><a href=\"./userprofile.php?profileName=$user\">Profile</a></li>";
        echo "<li><a class=\"active\" href=\"./edituserprofile.php?profileName=$user\">Edit Profile</a></li>";
      echo "<li><a href=\"/Final/logout.php\">Logout</a></li>";
    
            }
          ?>
        </ul>
                <div id="profileHeader">
        <h1>Edit Your User Profile</h1>
                    <?php
                    if($imageURL == ""){
                echo "<img src=\"./images/profilePictures/profile.png\" height=200 />";
                    }else{
                        echo "<img src=".$imageURL." height=200 />";
                    }
                ?>
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            Select a new profile picture and upload it!
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" name="submit" value="Upload Image">
                </form>
                <br />
                    <?php
                        
                    echo "@$user";
                    ?>
        
        </div>
        <div id="mainFeed">
            <P><B>Please edit your user information below:</B></P>

            <form method="get" action="edit.php">
    <br />Username
        <p><input type="text" size="20" name="username"></p>
<br />First name
        <p><input type="text" size="20" name="first_name"></p>
<br />Last Name
        <p><input type="text" size="20" name="last_name"></p>
<br />Password
        <p><input type="password" size="10" name="password" value=""></p>
<br />Enter a new password (or leave blank to keep password the same)
        <p><input type="submit" name="submitbtn" value="Change User Profile"></p>

</form>
                
                    <h3>Delete Account</h3>
                    <a href="./deleteaccount.php"><input type="button" name="deletebtn" value="Delete Account"></a>
                                
        </div>
    </body>

</html>
