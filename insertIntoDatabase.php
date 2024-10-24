<?php

//Setting up error reporting which will display error messages if the inserting of data was unsuccessful
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Resuming existing session
session_start();

//Processing form data if the page receives a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Filtering and sanitizing form inputs and saving them to variables
    $remarks = filter_input(INPUT_POST, 'remarks', FILTER_SANITIZE_STRING);
    $rpDriverName = filter_input(INPUT_POST, 'rpDriverName', FILTER_SANITIZE_STRING);
    $rpEmpNo = filter_input(INPUT_POST, 'rpEmpNo', FILTER_SANITIZE_STRING);
    $rpDate = filter_input(INPUT_POST, 'rpDate', FILTER_SANITIZE_STRING);
    
    $rvDriverName = filter_input(INPUT_POST, 'rvDriverName', FILTER_SANITIZE_STRING);
    $rvEmpNo = filter_input(INPUT_POST, 'rvEmpNo', FILTER_SANITIZE_STRING);
    $rvDate = filter_input(INPUT_POST, 'rvDate', FILTER_SANITIZE_STRING);

    $maDate = filter_input(INPUT_POST, 'maDate', FILTER_SANITIZE_STRING);
    $rO = filter_input(INPUT_POST, 'rO', FILTER_SANITIZE_STRING);
    $certifiedBy = filter_input(INPUT_POST, 'certifiedBy', FILTER_SANITIZE_STRING);
    $location2 = filter_input(INPUT_POST, 'location2', FILTER_SANITIZE_STRING);
    $shopRemarks = filter_input(INPUT_POST, 'shopRemarks', FILTER_SANITIZE_STRING);
    
    //Save data to session to be used later for inserting to database
    $_SESSION['remarks'] = $remarks;
    $_SESSION['rpDriverName'] = $rpDriverName;
    $_SESSION['rpEmpNo'] = $rpEmpNo;
    $_SESSION['rpDate'] = $rpDate;

    $_SESSION['rvDriverName'] = $rvDriverName;
    $_SESSION['rvEmpNo'] = $rvEmpNo;
    $_SESSION['rvDate'] = $rvDate;

    $_SESSION['maDate'] = $maDate;
    $_SESSION['repairsMade'] = isset($_POST['repairsMade']) ? $_POST['repairsMade'] : 0;
    $_SESSION['noRepairsNeeded'] = isset($_POST['noRepairsNeeded']) ? $_POST['noRepairsNeeded'] : 0;
    $_SESSION['rO'] = $rO;
    $_SESSION['certifiedBy'] = $certifiedBy;
    $_SESSION['location2'] = $location2;
    $_SESSION['shopRemarks'] = $shopRemarks;

    //Retrieving data from previous sessions
    $truckOrTractorNo = $_SESSION['truckOrTractorNo'];
    $mileage = $_SESSION['mileage'];
    $trailerNo = $_SESSION['trailerNo'];
    $dollyNo = $_SESSION['dollyNo'];
    $trailerNo2 = $_SESSION['trailerNo2'];
    $location = $_SESSION['location'];

    //Setting session variables for checkboxes to be used for inserting into database
    $_SESSION['cabDoorsWindows'] = isset($_POST['cabDoorsWindows']) ? $_POST['cabDoorsWindows'] : 0;
    $_SESSION['bodyDoors'] = isset($_POST['bodyDoors']) ? $_POST['bodyDoors'] : 0;
    $_SESSION['oilLeak'] = isset($_POST['oilLeak']) ? $_POST['oilLeak'] : 0;
    $_SESSION['greaseLeak'] = isset($_POST['greaseLeak']) ? $_POST['greaseLeak'] : 0;
    $_SESSION['coolantLeak'] = isset($_POST['coolantLeak']) ? $_POST['coolantLeak'] : 0;
    $_SESSION['fuelLeak'] = isset($_POST['fuelLeak']) ? $_POST['fuelLeak'] : 0;

    $_SESSION['gaugesWarningIndicators'] = isset($_POST['gaugesWarningIndicators']) ? $_POST['gaugesWarningIndicators'] : 0;
    $_SESSION['windshieldWipersWashers'] = isset($_POST['windshieldWipersWashers']) ? $_POST['windshieldWipersWashers'] : 0;
    $_SESSION['horns'] = isset($_POST['horns']) ? $_POST['horns'] : 0;
    $_SESSION['heaterDefroster'] = isset($_POST['heaterDefroster']) ? $_POST['heaterDefroster'] : 0;
    $_SESSION['mirrors'] = isset($_POST['mirrors']) ? $_POST['mirrors'] : 0;
    $_SESSION['steering'] = isset($_POST['steering']) ? $_POST['steering'] : 0;

    $_SESSION['lights'] = isset($_POST['lights']) ? $_POST['lights'] : 0;
    $_SESSION['reflectors'] = isset($_POST['reflectors']) ? $_POST['reflectors'] : 0;
    $_SESSION['suspension'] = isset($_POST['suspension']) ? $_POST['suspension'] : 0;
    $_SESSION['tires'] = isset($_POST['tires']) ? $_POST['tires'] : 0;
    $_SESSION['wheelsRimsLugs'] = isset($_POST['wheelsRimsLugs']) ? $_POST['wheelsRimsLugs'] : 0;
    $_SESSION['battery'] = isset($_POST['battery']) ? $_POST['battery'] : 0;

    $_SESSION['bodyDoors2'] = isset($_POST['bodyDoors2']) ? $_POST['bodyDoors2'] : 0;
    $_SESSION['tieDowns'] = isset($_POST['tieDowns']) ? $_POST['tieDowns'] : 0;
    $_SESSION['lights2'] = isset($_POST['lights2']) ? $_POST['lights2'] : 0;
    $_SESSION['reflectors2'] = isset($_POST['reflectors2']) ? $_POST['reflectors2'] : 0;

    $_SESSION['suspension2'] = isset($_POST['suspension2']) ? $_POST['suspension2'] : 0;
    $_SESSION['tires2'] = isset($_POST['tires2']) ? $_POST['tires2'] : 0;
    $_SESSION['wheelsRimsLugs2'] = isset($_POST['wheelsRimsLugs2']) ? $_POST['wheelsRimsLugs2'] : 0;
    $_SESSION['brakes'] = isset($_POST['brakes']) ? $_POST['brakes'] : 0;

    $_SESSION['landingGear'] = isset($_POST['landingGear']) ? $_POST['landingGear'] : 0;
    $_SESSION['kingPinUpperPlate'] = isset($_POST['kingPinUpperPlate']) ? $_POST['kingPinUpperPlate'] : 0;
    $_SESSION['fifthWheelDolly'] = isset($_POST['fifthWheelDolly']) ? $_POST['fifthWheelDolly'] : 0;
    $_SESSION['otherCouplingDevices'] = isset($_POST['otherCouplingDevices']) ? $_POST['otherCouplingDevices'] : 0;

    $_SESSION['rearEndProtection'] = isset($_POST['rearEndProtection']) ? $_POST['rearEndProtection'] : 0;
    $other = $_SESSION['other'];
    $_SESSION['noDefects'] = isset($_POST['noDefects']) ? $_POST['noDefects'] : 0;

    $remarks = $_SESSION['remarks'];

    $rpDriverName = $_SESSION['rpDriverName'];
    $rpEmpNo = $_SESSION['rpEmpNo'];
    $rpDate = $_SESSION['rpDate'];

    $rvDriverName = $_SESSION['rvDriverName'];
    $rvEmpNo = $_SESSION['rvEmpNo'];
    $rvDate = $_SESSION['rvDate'];

    $maDate = $_SESSION['maDate'];
    $_SESSION['repairsMade'] = isset($_POST['repairsMade']) ? $_POST['repairsMade'] : 0;
    $_SESSION['noRepairsNeeded'] = isset($_POST['noRepairsNeeded']) ? $_POST['noRepairsNeeded'] : 0;
    $rO = $_SESSION['rO'];
    $certifiedBy = $_SESSION['certifiedBy'];
    $location2 = $_SESSION['location2'];
    $shopRemarks = $_SESSION['shopRemarks'];

    

    //Function to connect to the database and insert data
    function insertDataIntoDatabase($truckOrTractorNo, $mileage, $trailerNo, $dollyNo, $trailerNo2, $location, $cabDoorsWindows, $bodyDoors, $oilLeak, $greaseLeak, $coolantLeak, $fuelLeak, $gaugesWarningIndicators, $windshieldWipersWashers, $horns, $heaterDefroster, $mirrors, $steering, $lights, $reflectors, $suspension, $tires, $wheelsRimsLugs, $battery, $bodyDoors2, $tieDowns, $lights2, $reflectors2, $suspension2, $tires2, $wheelsRimsLugs2, $brakes, $landingGear, $kingPinUpperPlate, $fifthWheelDolly, $otherCouplingDevices, $rearEndProtection, $other, $noDefects, $remarks, $rpDriverName, $rpEmpNo, $rpDate, $rvDriverName, $rvEmpNo, $rvDate, $maDate, $repairsMade, $noRepairsNeeded, $rO, $certifiedBy, $location2, $shopRemarks)
    {
    //Connecting to MySQL database
    $servername = "localhost";
    $username = "cl47-app5";
    $password = "4hqXz!JhJ";
    $dbname = "cl47-app5";

    //Create connection with database
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection with database
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    //Prepare and execute SQL queries for each of the tables in the database
    //these will insert all of the data saved from the session into each specific table as specified
    //in order to be used later for end of day reports
    //there must be an error or issue somewhere with my code where i am saving or inserting the data into the database itself
    //because all of it gets inserted but only some of it shows up on the actual tables in the database the rest is just 0s for checkboxes
    //i must have made an error somewhere with saving the checkbox data
    $sql1 = "INSERT INTO truckInfo (TruckOrTractorNo, Mileage, TrailerNo1, DollyNo, TrailerNo2, Location) VALUES('$truckOrTractorNo', '$mileage', '$trailerNo', '$dollyNo', '$trailerNo2', '$location')";

    $sql2 = "INSERT INTO powerUnit (CabDoorsWindows, BodyDoors, OilLeak, GreaseLeak, CoolantLeak, FuelLeak, GaugesWarningIndicators, WindshieldWipersWashers, Horns, HeaterDefroster, Mirrors, Steering, Lights, Reflectors, Suspension, Tires, WheelsRimsLugs, Battery) VALUES('$cabDoorsWindows', '$bodyDoors', '$oilLeak', '$greaseLeak', '$coolantLeak', '$fuelLeak', '$gaugesWarningIndicators', '$windshieldWipersWashers', '$horns', '$heaterDefroster', '$mirrors', '$steering', '$lights', '$reflectors', '$suspension', '$tires', '$wheelsRimsLugs', '$battery')";

    $sql3 = "INSERT INTO towedUnit (BodyDoors, TieDowns, Lights, Reflectors, Suspension, Tires, WheelsRimsLugs, Brakes, LandingGear, KingPinUpperPlate, FifthWheelDolly, OtherCouplingDevices, RearEndProtection, Other, NODEFECTS) VALUES('$bodyDoors2', '$tieDowns', '$lights2', '$reflectors2', '$suspension2', '$tires2', '$wheelsRimsLugs2', '$brakes', '$landingGear', '$kingPinUpperPlate', '$fifthWheelDolly', '$otherCouplingDevices', '$rearEndProtection', '$other', '$noDefects')";

    $sql4 = "INSERT INTO endOfForm (Remarks, ReportingDriverName, ReportingDriverDate, ReportingDriverEmployeeNo, ReviewingDriverName, ReviewingDriverDate, ReviewingDriverEmployeeNo, ShopRemarks, MaintenanceActionDate, RepairsMade, NoRepairsNeeded, RoNo, CertifiedBy, Location) VALUES('$remarks', '$rpDriverName', '$rpEmpNo', '$rpDate', '$rvDriverName', '$rvEmpNo', '$rvDate', '$maDate', '$repairsMade', '$noRepairsNeeded', '$rO', '$certifiedBy', '$location2', '$shopRemarks')";

    //Checking if the first query has been executed successfully
    if ($conn->query($sql1) === TRUE) {
        echo "";//No action required if success
    } else {
        //Display error message if there is an error with the query
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    //Checking if the second query has been executed successfully
    if ($conn->query($sql2) === TRUE) {
        echo "";//No action required if success
    } else {
        //Display error message if there is an error with the query
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }

    //Checking if the third query has been executed successfully
    if ($conn->query($sql3) === TRUE) {
        echo "";//No action required if success
    } else {
        //Display error message if there is an error with the query
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }

    //Checking if the fourth query has been executed successfully
    if ($conn->query($sql4) === TRUE) {
        echo "";//No action required if success
    } else {
        //Display error message if there is an error with the query
        echo "Error: " . $sql4 . "<br>" . $conn->error;
    }

    //Closing database connection
    $conn->close();

}

    //Calling the function to insert all of the data into the database
    insertDataIntoDatabase(
        $_SESSION['truckOrTractorNo'],
        $_SESSION['mileage'],
        $_SESSION['trailerNo'],
        $_SESSION['dollyNo'],
        $_SESSION['trailerNo2'],
        $_SESSION['location'],
        $_SESSION['cabDoorsWindows'],
        $_SESSION['bodyDoors'],
        $_SESSION['oilLeak'],
        $_SESSION['greaseLeak'],
        $_SESSION['coolantLeak'],
        $_SESSION['fuelLeak'],
        $_SESSION['gaugesWarningIndicators'],
        $_SESSION['windshieldWipersWashers'],
        $_SESSION['horns'],
        $_SESSION['heaterDefroster'],
        $_SESSION['mirrors'],
        $_SESSION['steering'],
        $_SESSION['lights'],
        $_SESSION['reflectors'],
        $_SESSION['suspension'],
        $_SESSION['tires'],
        $_SESSION['wheelsRimsLugs'],
        $_SESSION['battery'],
        $_SESSION['bodyDoors2'],
        $_SESSION['tieDowns'],
        $_SESSION['lights2'],
        $_SESSION['reflectors2'],
        $_SESSION['suspension2'],
        $_SESSION['tires2'],
        $_SESSION['wheelsRimsLugs2'],
        $_SESSION['brakes'],
        $_SESSION['landingGear'],
        $_SESSION['kingPinUpperPlate'],
        $_SESSION['fifthWheelDolly'],
        $_SESSION['otherCouplingDevices'],
        $_SESSION['rearEndProtection'],
        $_SESSION['other'],
        $_SESSION['noDefects'],
        $remarks,
        $rpDriverName,
        $rpEmpNo,
        $rpDate,
        $rvDriverName,
        $rvEmpNo,
        $rvDate,
        $maDate,
        $_SESSION['repairsMade'],
        $_SESSION['noRepairsNeeded'],
        $rO,
        $certifiedBy,
        $location2,
        $shopRemarks
    );
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Form Submitted Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script>
            function redirectToReports(){
                //JavaScript functions which redirect you to specific pages
                //these will be used for buttons to send the user to a page depending on what they click
                window.location.href = 'endOfDayReports.php';
            }

            function redirectToLogout(){
                window.location.href = 'logout.php';
            }
        </script>
    </head>
    <body>
        <!-- embedding the header and navigation files -->
        <?php include_once 'header.php'; ?>

        <!-- Main content of page -->
        <!-- Title of page and headings -->
        <h1>REPORT SUCCESSFULLY SUBMITTED!</h1>
        <h2>Click the button below to see the end of the day report.</h2>
        <h2>Or if you just want to logout click the logout button.</h2>
        <br><br>


        <!-- Buttons for redirection to other pages -->
        <button onclick="redirectToReports()">Open the End of Day Reports</button>
        <button onclick="redirectToLogout()">Logout</button>

        <!-- embedding footer file -->
        <?php include_once 'footer.php'; ?>
    </body>
</html>