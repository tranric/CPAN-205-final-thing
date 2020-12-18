<html>

    <head>
    
        <title>Account Created</title>
        
    </head>

    
    <body>
        <?php
        
            $username="root";
            $password="";
            $dsn = "mysql:host=localhost;dbname=mysql";    
        
            $user = $_POST['userID'];
            $pass = $_POST["password"];
            $firstName = $_POST["fname"];
            $lastName = $_POST["lname"]; 
        
        try{
            $dbcon = new PDO($dsn, $username, $password);
            $result = $dbcon->prepare("SELECT * FROM `members` WHERE userID = '".$user."'");
            $result->execute();
            $resultRecords = $result->fetchAll();
            if($resultRecords != null){
                echo "<script>
            alert('Account name is already in use. Please choose a different name.');
            window.location.href='./create.php';
            </script>";
            }else{
            $insert = " INSERT INTO members VALUES (\"$user\", \"$pass\",\"$firstName\",\"$lastName\", \"./images/profilePictures/profile.png\")";
            
            $dbcon->exec($insert);        
            echo "<script>
            alert('Account successfully created!');
            window.location.href='./';
            </script>";
            }
    }
    catch(PDOException $e){
        echo $e;
    }
            
        
        
    ?>
    
    
    </body>

</html>