<?php
    session_start();

    $tweetcontent = $_POST["tweetContent"];
    $user = $_SESSION["username"];
    
    $username="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=mysql";
    $tweetnum = 0;

    if(strpos($tweetcontent, '<' == false) || strpos($tweetcontent, '>') == false){
        try{
            $dbcon = new PDO($dsn, $username, $password);
            $result = $dbcon->prepare("SELECT MAX(tweet_num) FROM tweets");
            $result->execute();
            $tweetcount = $result->fetchAll();
            foreach($tweetcount as $row){
                $tweetnum = $row[0] + 1;
            }
            $insert = " INSERT INTO tweets VALUES (\"$tweetnum\",\"$user\",  \"$tweetcontent\")";
            $dbcon->exec($insert);
            header('Location: ./userhome.php');
        }
        catch(PDOException $e){
            echo $e;
        }
    }else{
        echo "<script>
            alert('Coding tags are not allowed. Refrain from using square brackets or <>');
            window.location.href='./userhome.php';
            </script>";
    }
?>