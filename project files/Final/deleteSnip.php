<?php
    $username="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=mysql"; 

    $dbcon = new PDO($dsn, $username, $password);
    
    $sql="DELETE FROM tweets WHERE tweet_num = \"".$_GET["snipID"]."\"";
    $dbcon->query($sql);
    header('Location: ../userHome.php');
?>