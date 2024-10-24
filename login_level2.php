<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Access Level 2</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- embedding the header and navigation files -->
        <?php include_once 'header.php'; ?>
        <?php include_once 'nav.php'; ?>

        <!-- Displaying welcome message with username retrieved from session -->
        <h2>Welcome, <?php echo $_SESSION['username'];?>!</h2>
        <!-- Content specific to access level 2 users -->
        <p>You have access to content for Access Level 2.</p>

        <!-- embedding footer file -->
        <?php include_once 'footer.php'; ?>
    </body>
</html>