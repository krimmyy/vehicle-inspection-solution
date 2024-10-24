<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Truck Info Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script>
            //JavaScript Front-end validation function for Page 1
            function validateTruckInfo() {
                //Getting values from input fields in the form and saving them to variables
                var truckOrTractorNo = document.getElementById('truckOrTractorNo').value.trim();
                var mileage = document.getElementById('mileage').value.trim();
                var trailerNo = document.getElementById('trailerNo').value.trim();
                var dollyNo = document.getElementById('surname').value.trim();
                var trailerNo2 = document.getElementById('firstname').value.trim();
                var location = document.getElementById('surname').value.trim();

            //Check if fields are not empty by using variables saved from form input
            if (truckOrTractorNo === '' || mileage === '' || trailerNo === '' || dollyNo === '' || trailerNo2 === '' || location === '') {
                alert('Please fill in all fields.');
                return false;
            }
        }
        </script>
    </head>
    <body>
        <!-- embedding the header and navigation files -->
        <?php include_once 'header.php'; ?>

        <!-- Main content of page -->
        <!-- Title of page -->
        <h1>DRIVER'S INSPECTION REPORT</h1>
        <h2>COMPLETION OF THIS REPORT REQUIRED BY FEDERAL LAW, 49 CFR 396.11 & 396.13.</h2>

        <!-- HTML code for truck information form -->
        <div class="truckInfo">
            <form action="powerUnit.php" method="post" onsubmit="return validateTruckInfo()">
            <!-- Input fields for truck information to be filled out by user -->
                <label for="truckOrTractorNo">Truck or Tractor No:</label>
                <input type="number" id="truckOrTractorNo" name="truckOrTractorNo" required><br>

                <label for="mileage">Mileage(No Tenths):</label>
                <input type="number" id="mileage" name="mileage" required><br>

                <label for="trailerNo">Trailer No:</label>
                <input type="number" id="trailerNo" name="trailerNo" required><br>

                <label for="dollyNo">Dolly No:</label>
                <input type="number" id="dollyNo" name="dollyNo" required><br>

                <label for="trailerNo2">Trailer No:</label>
                <input type="number" id="trailerNo2" name="trailerNo2" required><br>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required><br>

                <!-- Next button to move onto the next part of the form -->
                <input type="submit" name ="save_checkbox" value="Next">
            </form>
        </div>
        
        <!-- embedding footer file -->
        <?php include_once 'footer.php'; ?>
    </body>
</html>

