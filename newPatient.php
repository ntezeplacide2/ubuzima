<?php
// Database connection parameters
$servername = "localhost";  // Change to your database server hostname
$username = "root";
$password = "";
$databaseName = "urugero122";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'urugero' database if it doesn't exist
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";
if ($conn->query($sqlCreateDatabase) === TRUE) {
   
} else {
    echo "Error creating database: " . $conn->error;
}

// Close the current connection
$conn->close();

// Reconnect to the MySQL server with the newly created or existing database
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'newPatient' table if it doesn't exist
$tableName = "newPatient";
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    NID INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    martualStatus VARCHAR(255) NOT NULL,
    umurenge VARCHAR(255) NOT NULL,
    akagali VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(255) NOT NULL UNIQUE,
    weight VARCHAR(255) NOT NULL,
    height VARCHAR(255) NOT NULL,
    diagnosis TEXT NOT NULL
)";
if ($conn->query($sqlCreateTable) === FALSE) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate input data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $NID = $_POST['NID'];
    $gender = $_POST['gender'];
    $martualStatus = $_POST['martualStatus'];
    $umurenge = $_POST['umurenge'];
    $akagali = $_POST['akagali'];
    $phoneNumber = $_POST['phoneNumber'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $diagnosis = $_POST['diagnosis'];

    // Check if the phone number already exists
    $checkPhoneNumberQuery = "SELECT id FROM newPatient WHERE phoneNumber = '$phoneNumber'";
    $result = $conn->query($checkPhoneNumberQuery);

    if ($result->num_rows > 0) {
        echo "Phone number already exists: $phoneNumber";
    } else {
        // Insert the new patient data into the 'newPatient' table
        $sqlInsert = "INSERT INTO newPatient (fname, lname, age, NID, gender, martualStatus, umurenge, akagali, phoneNumber, weight, height, diagnosis)
                     VALUES ('$fname', '$lname', $age, $NID, '$gender', '$martualStatus', '$umurenge', '$akagali', '$phoneNumber', '$weight', '$height', '$diagnosis')";

        if ($conn->query($sqlInsert) === TRUE) {
            echo "Patient record inserted successfully.";
        } else {
            echo "Error inserting patient record: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Patient Record</title>
    <!-- Include Bootstrap CSS from a content delivery network (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Hospital Patient Record</h1>

        <!-- Patient registration form -->
        <form method="post" class="mt-4">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" name="fname" required>
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" name="lname" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" name="age" required>
            </div>

            <div class="form-group">
                <label for="NID">National ID (NID):</label>
                <input type="number" class="form-control" name="NID" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Male" required>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" value="Female" required>
                    <label class="form-check-label">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="martualStatus">Marital Status:</label>
                <input type="text" class="form-control" name="martualStatus" required>
            </div>

            <div class="form-group">
                <label for="umurenge">Umurenge:</label>
                <input type="text" class="form-control" name="umurenge" required>
            </div>

            <div class="form-group">
                <label for="akagali">Akagali:</label>
                <input type="text" class="form-control" name="akagali" required>
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" class="form-control" name="phoneNumber">
            </div>

            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="text" class="form-control" name="weight" required>
            </div>

            <div class="form-group">
                <label for="height">Height:</label>
                <input type="text" class="form-control" name="height" required>
            </div>

            <div class="form-group">
                <label for="diagnosis">Diagnosis:</label>
                <textarea class="form-control" name="diagnosis" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add patient</button>
        </form>
    </div>

    <?php
    // Display the newly registered patient
    if (isset($newPatient)) {
        echo "<div class='container mt-4'>";
        echo "<h2>New Patient Information:</h2>";
        echo "<p><strong>First Name:</strong> " . $newPatient['fname'] . "</p>";
        echo "<p><strong>Last Name:</strong> " . $newPatient['lname'] . "</p>";
        echo "<p><strong>Age:</strong> " . $newPatient['age'] . "</p>";
        echo "<p><strong>NID:</strong> " . $newPatient['NID'] . "</p>";
        echo "<p><strong>Gender:</strong> " . $newPatient['gender'] . "</p>";
        echo "<p><strong>Marital Status:</strong> " . $newPatient['martualStatus'] . "</p>";
        echo "<p><strong>Umurenge:</strong> " . $newPatient['umurenge'] . "</p>";
        echo "<p><strong>Akagali:</strong> " . $newPatient['akagali'] . "</p>";
        echo "<p><strong>Phone Number:</strong> " . $newPatient['phoneNumber'] . "</p>";
        echo "<p><strong>Weight:</strong> " . $newPatient['weight'] . "</p>";
        echo "<p><strong>Height:</strong> " . $newPatient['height'] . "</p>";
        echo "<p><strong>Diagnosis:</strong> " . $newPatient['diagnosis'] . "</p>";
        echo "</div>";
    }
    ?>

    <!-- Include Bootstrap JS from a CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
