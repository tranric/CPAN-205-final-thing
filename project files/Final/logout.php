<!--"I pooped once" ~ Nickolaus-->
<?php
    session_start();
    echo "You have been logged out. Redirecting to login page in 5 seconds.";
    session_unset();
    session_destroy();
    header('Location: ./');
?>