<html>
    <head>
        <title>Create Account</title>
        <link rel="stylesheet" type="text/css" href="styles/createstyles.css">
    </head>
    
    <body bgcolor="#90BEFF" text="#FFFFFF">
        <div id="createUser">
            <form method="post" action="created.php">
                    <fieldset>
                          <legend>Create New Account</legend>
                            <b>Username</b>
                            <input id="userID" type="text" name="userID" value="">
                            <br><br>
                            <b>Password</b>
                            <input id="password" type="password" name="password" value="">
                            <br />
                            <b>First Name:</b>
                            <input id="fname" type="text" name="fname" value="">
                            <br />
                            <b>Last Name:</b>
                            <input id="lname" type="text" name="lname" value="">
                            <br />
                            <br />
                            <button type="submit" name="createButton">Create Account</button>
                        <a href="./"><button type="button" name="homeButton">Home</button></a>
                      </fieldset>
                
                </form>


        </div>
    
    </body>


</html>