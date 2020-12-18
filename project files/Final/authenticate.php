<?php
    session_start();
    
?>

<html>

<?php
    
    $username="root";
    $password="";
    $dsn = "mysql:host=localhost;dbname=mysql";
    
    $loginUser = $_POST["userID"];
    $loginPass = $_POST["password"];
       
    
    try{
        $dbcon = new PDO($dsn, $username, $password);
        $result = $dbcon->prepare("SELECT * FROM `members` WHERE userID = '".$loginUser."' AND password = '".$loginPass."'");
        $result->execute();
        $resultrecords = $result->fetchAll();
        
        if($resultrecords == null){
            echo "Username or Password mismatch. You will be redirected in 2 seconds";
            header('Refresh: 2; URL=./');
            
            
        }else{
            foreach($resultrecords as $row){
                $_SESSION["username"] = $row[0];
                $_SESSION["firstname"] = $row[2];
                $_SESSION["lastname"] = $row[3];
            }
            header('Location: ./userhome.php');
        }
    }
    catch(PDOException $e){
        echo $e;
    }
    
    
?>
    
</html>