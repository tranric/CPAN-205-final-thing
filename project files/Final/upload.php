<?php
    session_start();
    echo "test";
    $target_dir = "./images/profilePictures/";
    //Right here we are changing the name of the new image file
    $selectedFile = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($selectedFile,PATHINFO_EXTENSION);
    $renamedFile = ($target_dir.$_SESSION['username']."_profile".".".$imageFileType);
    $uploadOk = 1;
echo "test0";
    if(isset($_POST["submit"])) {
        echo "test1";
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        }else{
            $renamedFile = null;
        }
    }
    if ($uploadOk != 0) {
        echo "test2";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $renamedFile)) {
            $username="root";
            $password="";
            $dsn = "mysql:host=localhost;dbname=mysql"; 
            
            $dbcon = new PDO($dsn, $username, $password);
            $user = $_SESSION["username"];
            $sql = "UPDATE members SET profilePic = \"$renamedFile\" where userID = \"$user\"";
            $dbcon->exec($sql);
            
            echo "<script>
            alert('The file ". basename( $_FILES["fileToUpload"]["name"])." has been uploaded.');
            window.location.href='./edituserprofile.php';
            </script>";
        }
    }

?>
