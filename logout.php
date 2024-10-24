<?php

//Resuming existing session
session_start();
//Deleting all session variables
session_unset();
//Destroying session data, basically logging the user out
session_destroy();

//Redirecting user to login page after logged out
header("Location: login.php");
//Making sure no further code is executed after redirect
exit();

?>