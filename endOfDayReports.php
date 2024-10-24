<?php

//Outputting HTML sttarting tags which include linking to stylesheet and viewport settings
echo '<html>
<head>
	<title>End Of Day Reports Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head>
<body>';

    //Embedding header file
	include_once 'header.php'; 

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

//Retrieve data from the database tables and saving the result to its own variable
$sql1 = "SELECT * FROM truckInfo";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM powerUnit";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM towedUnit";
$result3 = $conn->query($sql3);

$sql4 = "SELECT * FROM endOfForm";
$result4 = $conn->query($sql4);

    //Output heading for the truckInfo table
    echo "<h2>Truck Info</h2>";
    //Check if any records were returned from the 'truckInfo' table in the database
        if (mysqli_num_rows($result1) > 0) {
            //Output data from the 'truckInfo' table in there are any records

            //Creating table tag and headings for fields
            echo "<table>";
            echo "<tr><th>Truck or Tractor No</th><th>Mileage (No Tenths)</th><th>Trailer No</th><th>Dolly No</th><th>Trailer No</th><th>Location</th></tr>";
            //Loops while there are still records in the 'truckInfo' table
            while ($row = mysqli_fetch_assoc($result1)) {
                //Outputting data from 'truckInfo' table
                //Information for this table wont show up on the end of day reports page
                //unsure as to why because the checkboxes show up fine its just everything else is in the tables is blank
                echo "<tr>";
                echo "<td>" . $row["truckOrTractorNo"] . "</td>";
                echo "<td>" . $row["mileage"] . "</td>";
                echo "<td>" . $row["trailerNo"] . "</td>";
                echo "<td>" . $row["dollyNo"] . "</td>";
                echo "<td>" . $row["trailerNo2"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "</tr>";
            }
            //Closing table tag
            echo "</table>";
        } else {
            //If no records are found the message below is displayed on screen
            echo "No records found";
        }

        //Output heading for the powerUnit table
        echo "<h2>Power Unit</h2>";
        //Check if any records were returned from the 'powerUnit' table in the database
        if (mysqli_num_rows($result2) > 0) {
            //Output data from the 'powerUnit' table in there are any records

            //Creating table tag and headings for fields
            echo "<table>";
            echo "<tr><th>Cab/Doors/Windows</th><th>Body/Doors</th><th>Oil Leak</th><th>Grease Leak</th><th>Coolant Leak</th><th>Fuel Leak</th><th>Gauges/Warning Indicators</th><th>Windshield Wipers/Washers</th><th>Horns</th><th>Heater/Defroster</th><th>Mirrors</th><th>Steering</th><th>Lights</th><th>Reflectors</th><th>Suspension</th><th>Tires</th><th>Wheels/Rims/Lugs</th><th>Battery</th></tr>";
            //Loops while there are still records in the 'powerUnit' table
            while ($row = mysqli_fetch_assoc($result2)) {
                //Outputting data from 'powerUnit' table with Yes/No for checkbox data
                echo "<tr>";
                echo "<td>" . ($row["cabDoorsWindows"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["bodyDoors"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["oilLeak"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["greaseLeak"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["coolantLeak"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["fuelLeak"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["gaugesWarningIndicators"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["windshieldWipersWashers"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["horns"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["heaterDefroster"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["mirrors"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["steering"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["lights"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["reflectors"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["suspension"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["tires"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["wheelsRimsLugs"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["battery"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "</tr>";
            }
            //Closing table tag
            echo "</table>";
        } else {
            //If no records are found the message below is displayed on screen
            echo "No records found";
        }

        //Output heading for the towedUnit table
        echo "<h2>Towed Unit</h2>";
        //Check if any records were returned from the 'truckInfo' table in the database
        if (mysqli_num_rows($result3) > 0) {
            //Output data from the 'towedUnit' table in there are any records

            //Creating table tag and headings for fields
            echo "<table>";
            echo "<tr><th>Body/Doors</th><th>Tie-Downs</th><th>Lights</th><th>Reflectors</th><th>Suspension</th><th>Tires</th><th>Wheels/Rims/Lugs</th><th>Brakes</th><th>Landing Gear</th><th>King Pin/Upper Plate</th><th>Fifth-Wheel (Dolly)</th><th>Other Coupling Devices</th><th>Rear-End Protection</th><th>Other</th><th>NO DEFECTS</th>";
            //Loops while there are still records in the 'towedUnit' table 
            while ($row = mysqli_fetch_assoc($result3)) {
                //Outputting data from 'towedUnit' table with Yes/No for checkbox data
                echo "<tr>";
                echo "<td>" . ($row["bodyDoors2"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["tieDowns"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["lights2"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["reflectors2"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["suspension2"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["tires2"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["wheelsRimsLugs2"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["brakes"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["landingGear"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["kingPinUpperPlate"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["fifthWheelDolly"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["otherCouplingDevices"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["rearEndProtection"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . $row["other"] . "</td>";
                echo "<td>" . ($row["noDefects"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "</tr>";
            }
            //Closing table tag
            echo "</table>";
        } else {
            //If no records are found the message below is displayed on screen
            echo "No records found";
        }

        //Output heading for the endOfForm table
        echo "<h2>End of Form</h2>";
        //Check if any records were returned from the 'endOfForm' table in the database
        if (mysqli_num_rows($result4) > 0) {
            //Output data from the 'endOfForm' table in there are any records

            //Creating table tag and headings for fields
            echo "<table>";
            echo "<tr><th>Remarks</th><th>Reporting Driver Name</th><th>Reporting Driver Date</th><th>Reporting Driver Employee Number</th><th>Reviewing Driver Name</th><th>Reviewing Driver Date</th><th>Reviewing Driver Employee Number</th><th>Shop Remarks</th><th>Maintenance Action Date</th><th>Repairs Made</th><th>No Repairs Needed</th><th>R.O.#'S</th><th>Certified By</th><th>Location</th></tr>";
            //Loops while there are still records in the 'endOfForm' table
            while ($row = mysqli_fetch_assoc($result4)) {
                //Outputting data from 'endOfForm' table with Yes/No for checkbox data
                //Information for this table wont show up on the end of day reports page
                //unsure as to why because the checkboxes show up fine its just everything else is in the tables is blank
                echo "<tr>";
                echo "<td>" . $row["remarks"] . "</td>";
                echo "<td>" . $row["rpDriverName"] . "</td>";
                echo "<td>" . $row["rpEmpNo"] . "</td>";
                echo "<td>" . $row["rpDate"] . "</td>";
                echo "<td>" . $row["rvDriverName"] . "</td>";
                echo "<td>" . $row["rvEmpNo"] . "</td>";
                echo "<td>" . $row["rvDate"] . "</td>";
                echo "<td>" . $row["maDate"] . "</td>";
                echo "<td>" . ($row["repairsMade"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . ($row["noRepairsNeeded"] == 1 ? 'Yes' : 'No') . "</td>";
                echo "<td>" . $row["rO"] . "</td>";
                echo "<td>" . $row["certifiedBy"] . "</td>";
                echo "<td>" . $row["location2"] . "</td>";
                echo "<td>" . $row["shopRemarks"] . "</td>";
                echo "</tr>";
            }
            //Closing table tag
            echo "</table>";
        } else {
            //If no records are found the message below is displayed on screen
            echo "No records found";
        }

//Closing the database connection
$conn->close();

//Embedding footer file
include_once 'footer.php';

//Creating the closing tags for body and HTML
echo "</body></html>";
?>