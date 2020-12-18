<?php
session_start();

    $username="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=mysql";

    $dbcon = new PDO($dsn, $username, $password);

    $currentUser = $_SESSION["username"];

    $sql = "DELETE FROM members WHERE userID=\"$currentUser\"";
    $dbcon->exec($sql);
    
    $sql = "DELETE FROM tweets WHERE tweet_author=\"$currentUser\"";
    $dbcon->exec($sql);

    echo "<script>
                alert('Account and snips have been successfully deleted. Thank you for using Snippets');
                window.location.href='./logout.php';
                </script>";
    

?>