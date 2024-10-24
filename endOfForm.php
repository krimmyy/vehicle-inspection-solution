<?php
//Resuming existing session
session_start();

//Processing form data if the page receives a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Save data to session to be used later for inserting to database
    $_SESSION['bodyDoors2'] = $bodyDoors2;
    $_SESSION['tieDowns'] = $tieDowns;
    $_SESSION['lights2'] = $lights2;
    $_SESSION['reflectors2'] = $reflectors2;

    $_SESSION['suspension2'] = $suspension2;
    $_SESSION['tires2'] = $tires2;
    $_SESSION['wheelsRimsLugs2'] = $wheelsRimsLugs2;
    $_SESSION['brakes'] = $brakes;

    $_SESSION['landingGear'] = $landingGear;
    $_SESSION['kingPinUpperPlate'] = $kingPinUpperPlate;
    $_SESSION['fifthWheelDolly'] = $fifthWheelDolly;
    $_SESSION['otherCouplingDevices'] = $otherCouplingDevices;

    $_SESSION['rearEndProtection'] = $rearEndProtection;
    $_SESSION['other'] = $other;
    $_SESSION['noDefects'] = $noDefects;
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>End Of Form Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script>
            //JavaScript Front-end validation function for Page 4
            function validateEndOfForm() {
                //Getting values from input fields in the form and saving them to variables
                var remarks = document.getElementById('remarks').value.trim();

                var rpDriverName = document.getElementById('rpDriverName').value.trim();
                var rpEmpNo = document.getElementById('rpEmpNo').value.trim();
                var rpDate = document.getElementById('rpDate').value.trim();

                var rvDriverName = document.getElementById('rvDriverName').value.trim();
                var rvEmpNo = document.getElementById('rvEmpNo').value.trim();
                var rvDate = document.getElementById('rvDate').value.trim();

                var maDate = document.getElementById('maDate').value.trim();
                var repairsMade = document.getElementById('repairsMade').value.trim();
                var noRepairsNeeded = document.getElementById('noRepairsNeeded').value.trim();
                var rO = document.getElementById('rO').value.trim();
                var certifiedBy = document.getElementById('certifiedBy').value.trim();
                var location2 = document.getElementById('location2').value.trim();

                var shopRemarks = document.getElementById('shopRemarks').value.trim();
            }
        </script>
    </head>
    <body>
        <!-- embedding the header and navigation files -->
        <?php include_once 'header.php'; ?>

        <!-- Main content of page -->

        <!-- HTML code for end of form -->
        <div class="endOfForm">
            <form action="insertIntoDatabase.php" method="post" onsubmit="return validateEndOfForm()">
                <label for="remarks">
                <input type="textbox" id="remarks" name="remarks" required>REMARKS:</label><br>

                <!-- Form inputs for reporting driver -->
                <h2>REPORTING DRIVER:</h2>
                <label for="rpDriverName">
                <input type="text" id="rpDriverNames" name="rpDriverName" required>Name:</label><br>

                <label for="rpEmpNo">
                <input type="number" id="rpEmpNo" name="rpEmpNo" required>Emp. No:</label><br>

                <label for="rpDate">
                <input type="date" id="rpDate" name="rpDate" required>Date:</label><br>

                <!-- Form inputs for reviewing driver -->
                <h2>REVIEWING DRIVER:</h2>
                <label for="rvDriverName">
                <input type="text" id="rvDriverName" name="rvDriverName" required>Name:</label><br>

                <label for="rvEmpNo">
                <input type="number" id="rvEmpNo" name="rvEmpNo" required>Emp. No:</label><br>

                <label for="rvDate">
                <input type="date" id="rvDate" name="rvDate" required>Date:</label><br>

                <!-- Form inputs for maintenance action -->
                <h2>MAINTENANCE ACTION:</h2>
                <label for="maDate">
                <input type="date" id="maDate" name="maDate" required>Date:</label><br>

                <label for="repairsMade">
                <input type="checkbox" id="repairsMade" name="repairsMade" value="1">Repairs Made:</label><br>

                <label for="noRepairsNeeded">
                <input type="checkbox" id="noRepairsNeeded" name="noRepairsNeeded" value="1">No Repairs Needed:</label><br>

                <label for="rO#S">
                <input type="text" id="rO" name="rO" required>R.O.#'S:</label><br>

                <label for="certifiedBy">
                <input type="text" id="certifiedBy" name="certifiedBy" required>Certified By:</label><br>

                <label for="location2">
                <input type="text" id="location2" name="location2" required>Location:</label><br>

                <label for="shopRemarks">
                <input type="textbox" id="shopRemarks" name="shopRemarks" required>SHOP REMARKS:</label><br>

                <!-- Submit button to process form information and submit it -->
                <input type="submit" name ="save_checkbox" value="Submit!">
            </form>
        </div>
        
        <!-- embedding footer file -->
        <?php include_once 'footer.php'; ?>
    </body>
</html>