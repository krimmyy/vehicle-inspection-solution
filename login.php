<?php
//starting session
session_start();

// connecting to MySQL database
$servername = "localhost";
$username = "cl47-app5";
$password = "4hqXz!JhJ";
$dbname = "cl47-app5";

//create the connection with database
$conn = new mysqli( $servername, $username, $password, $dbname );

//checking connection and if there are any errors displaying the error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //retrieving and sanitizing username and password which was entered into the login form
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    //SQL query to retrieve hashed password from the database depending on what login information was used
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    //Checking if the user with the username that was entered exists in the database
    if ($result->num_rows > 0) {
        //Fetching the user information from database
        $user = $result->fetch_assoc();
        $storedHashedPassword = $user['password'];

        //Debugging: used for outputting the password and hashed password to see if it works as it should
        echo "Entered Password: $password<br>";
        echo "Stored Hashed Password: $storedHashedPassword<br>";

    //Verify the hashed password against the one stored in the database
    if (password_verify($password, $storedHashedPassword)) {
        //Password verified successfully


    //Save user information to the session
    $_SESSION['username'] = $user['username'];
    $_SESSION['accesslevel'] = $user['accesslevel'];

    // Redirect based on access level
    // Access levels dont function properly as it would not redirect me anywhere when I tried logging in
    // I have had to change the form action to truckInfo.php to send the user through no matter what login information they use
    // if it was functioning properly I would have admin login information which would send you to access level 2 to allow for editing tables etc
    // and if a user with acccess level 1 would login they would only be able to see the end of day report
    if ($user['accesslevel'] == 1) {
        header("Location: login_level1.php");
        exit();
    } elseif ($user['accesslevel'] == 2) {
        header("Location: login_level2.php");
        exit();
    } elseif ($user['accesslevel'] == 0) {
        header("Location: login.php");
        exit();
    }
    } else {
        //Username or password reficiation failed display error message
        $error_message = "Invalid username or password";
    }
}
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- embedding the header and navigation files -->
        <?php include_once 'header.php'; ?>

        <h1>Welcome to JJ Keller Autos!</h1>
        <h2>Please Login</h2>

        <!-- code for login form -->
        <div class="login">
            <form action="truckInfo.php" method="post">
                <!-- Username input field -->
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <!-- Password input field -->
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <!-- Login button to start login process -->
                <input type="submit" value="Login">
            </form>
        </div>
        
        <!-- embedding footer file -->
        <?php include_once 'footer.php'; ?>
    </body>
</html>
