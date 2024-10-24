<?php
//Resuming existing session
session_start();

//Processing form data if the page receives a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //JavaScript Back-end validation for Page 1
    $truckOrTractorNo = filter_input(INPUT_POST, 'truckOrTractorNo', FILTER_SANITIZE_NUMBER_INT);
    $mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT);
    $trailerNo = filter_input(INPUT_POST, 'trailerNo', FILTER_SANITIZE_NUMBER_INT);
    $dollyNo = filter_input(INPUT_POST, 'dollyNo', FILTER_SANITIZE_NUMBER_INT);
    $trailerNo2 = filter_input(INPUT_POST, 'trailerNo2', FILTER_SANITIZE_NUMBER_INT);
    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);


    //Save data to session to be used later for inserting to database
    $_SESSION['truckOrTractorNo'] = $truckOrTractorNo;
    $_SESSION['mileage'] = $mileage;
    $_SESSION['trailerNo'] = $trailerNo;
    $_SESSION['dollyNo'] = $dollyNo;
    $_SESSION['trailerNo2'] = $trailerNo2;
    $_SESSION['location'] = $location;
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Power Unit Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script>
            //JavaScript Front-end validation function for Page 2
            function validatePowerUnit() {
                //Getting values from input fields in the form and saving them to variables
                var cabDoorsWindows = document.getElementById('cabDoorsWindows').value.trim();
                var bodyDoors = document.getElementById('bodyDoors').value.trim();
                var oilLeak = document.getElementById('oilLeak').value.trim();
                var greaseLeak = document.getElementById('greaseLeak').value.trim();
                var coolantLeak = document.getElementById('coolantLeak').value.trim();
                var fuelLeak = document.getElementById('fuelLeak').value.trim();

                var gaugesWarningIndicators = document.getElementById('gaugesWarningIndicators').value.trim();
                var windshieldWipersWashers = document.getElementById('windshieldWipersWashers').value.trim();
                var horns = document.getElementById('horns').value.trim();
                var heaterDefroster = document.getElementById('heaterDefroster').value.trim();
                var mirrors = document.getElementById('mirrors').value.trim();
                var steering = document.getElementById('steering').value.trim();

                var lights = document.getElementById('lights').value.trim();
                var reflectors = document.getElementById('reflectors').value.trim();
                var suspension = document.getElementById('suspension').value.trim();
                var tires = document.getElementById('tires').value.trim();
                var wheelsRimsLugs = document.getElementById('wheelsRimsLugs').value.trim();
                var battery = document.getElementById('battery').value.trim();
        }
        </script>
    </head>
    <body>
        <!-- embedding the header and navigation files -->
        <?php include_once 'header.php'; ?>

        <!-- Main content of page -->
        <!-- Title of page -->
        <h1>POWER UNIT</h1>
        <h2>ATA/VMRS System Code Numbers for Shop Use Only</h2>
        <h2>CHECK DEFECTS ONLY. Explain under REMARKS.</h2>

        <!-- HTML code for power unit form -->
        <div class="powerUnit">
            <form action="towedUnit.php" method="post" onsubmit="return validatePowerUnit()">
                <!-- Checkboxes for general condition -->
                <h2>GENERAL CONDITION</h2>
                <label for="cabDoorsWindows">
                <input type="checkbox" id="cabDoorsWindows" name="cabDoorsWindows" value="1"> 02 - Cab/Doors/Windows</label><br>

                <label for="bodyDoors">
                <input type="checkbox" id="bodyDoors" name="bodyDoors" value="1"> 02 - Body/Doors</label><br>

                <label for="oilLeak">
                <input type="checkbox" id="oilLeak" name="oilLeak" value="1"> - Oil Leak</label><br>

                <label for="greaseLeak">
                <input type="checkbox" id="greaseLeak" name="greaseLeak" value="1"> - Grease Leak</label><br>

                <label for="coolantLeak">
                <input type="checkbox" id="coolantLeak" name="coolantLeak" value="1"> 42 - Coolant Leak</label><br>

                <label for="fuelLeak">
                <input type="checkbox" id="fuelLeak" name="fuelLeak" value="1"> 44 - Fuel Leak</label><br>

                <!-- Checkboxes for in-cab condition -->
                <h2>IN-CAB</h2>
                <label for="gaugesWarningIndicators">
                <input type="checkbox" id="gaugesWarningIndicators" name="gaugesWarningIndicators" value="1"> 03 - Gauges/Warning Indicators</label><br>

                <label for="windshieldWipersWashers">
                <input type="checkbox" id="windshieldWipersWashers" name="windshieldWipersWashers" value="1"> 02 - Windshield Wipers/Washers</label><br>

                <label for="horns">
                <input type="checkbox" id="horns" name="horns" value="1"> 54 - Horns</label><br>

                <label for="heaterDefroster">
                <input type="checkbox" id="heaterDefroster" name="heaterDefroster" value="1"> 01 - Heater/Defroster</label><br>

                <label for="mirrors">
                <input type="checkbox" id="mirrors" name="mirrors" value="1"> 02 - Mirrors</label><br>

                <label for="steering">
                <input type="checkbox" id="steering" name="steering" value="1"> 15 - Steering</label><br>

                <!-- Checkboxes for exterior condition -->
                <h2>EXTERIOR</h2>
                <label for="lights">
                <input type="checkbox" id="lights" name="lights" value="1"> 34 - Lights</label><br>

                <label for="reflectors">
                <input type="checkbox" id="reflectors" name="reflectors" value="1"> 34 - Reflectors</label><br>

                <label for="suspension">
                <input type="checkbox" id="suspension" name="suspension" value="1"> 16 - Suspension</label><br>

                <label for="tires">
                <input type="checkbox" id="tires" name="tires" value="1"> 17 - Tires</label><br>

                <label for="wheelsRimsLugs">
                <input type="checkbox" id="wheelsRimsLugs" name="wheelsRimsLugs" value="1"> 18 - Wheels/Rims/Lugs</label><br>

                <label for="battery">
                <input type="checkbox" id="battery" name="battery" value="1"> 32 - Battery</label><br>

                <!-- Next button to move onto the next part of the form -->
                <input type="submit" name ="save_checkbox" value="Next">
            </form>
        </div>
        
        <!-- embedding footer file -->
        <?php include_once 'footer.php'; ?>
    </body>
</html>