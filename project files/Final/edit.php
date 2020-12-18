<?php
    session_start();

    $username="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=mysql";

    $dbcon = new PDO($dsn, $username, $password);
    
    $user = $_GET["username"];
    $pass = $_GET["password"];
    $fname = $_GET["first_name"];
    $lname = $_GET["last_name"];
    
    $currentUser = $_SESSION["username"];

        if(empty($user) == false){
            $result = $dbcon->prepare("SELECT * FROM members WHERE userID=\"$user\"");
            $result->execute();
            $resultRecords = $result->fetchAll();

            if($resultRecords == null){
            $sql = "UPDATE members SET userID=\"$user\" WHERE userID=\"$currentUser\"";
            $_SESSION["username"] = $user;
            $dbcon->exec($sql);
            $updatesnips = "UPDATE tweets SET tweet_author=\"$user\" WHERE tweet_author=\"$currentUser\"";
            $dbcon->exec($updatesnips);
            }else{
                echo "<script>
                alert('Username already in use!');
                window.location.href='./edituserprofile.php';
                </script>";
                break;
            }
        }else if(empty($pass) == false){
                $sql = "UPDATE members SET password=\"$pass\" WHERE userID=\"$currentUser\"";
                $_SESSION["password"] = $pass;
                $dbcon->exec($sql);    
            }else if(empty($fname) == false){
                $sql = "UPDATE members SET first_name=\"$fname\" WHERE userID=\"$currentUser\"";
                $_SESSION["firstname"] = $fname;
                $dbcon->exec($sql);    
            }else if(empty($lname) == false){
                $sql = "UPDATE members SET last_name=\"$lname\" WHERE userID=\"$currentUser\"";
                $_SESSION["lastname"] = $lname;
                $dbcon->exec($sql);    
            }else{
                echo "<script>
                alert('All fields were left blank. No updates made.');
                window.location.href='./edituserprofile.php';
                </script>";
            }
    
            echo "<script>
                alert('Profile Updated Successfully!');
                window.location.href='./edituserprofile.php';
                </script>";
    
?>