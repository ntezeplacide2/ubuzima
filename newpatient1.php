<?php
// Sample patient data storage (you should use a database in a real project)
$servername = "localhost";  // Change to your database server hostname
$username = "root";
$password = "";


// Function to add a new patient
function addPatient($fname,$lname, $age,$NID, $gender, $martualStatus,$umurenge, $akagali, $phoneNumber, $weight,$height,$diagnosis) {
    global $patients;
    $patient = [
        'fname' => $fname,
        'lname' =>$lname,
        'age' => $age,
        'NID'=>$NID,
        'gender' => $gender,
        'martualStatus'=>$martualStatus,
        'umurenge'=>$umurenge,
        'akagali'=>$akagali,
        'phoneNumber' =>$phoneNumber,
        'weight'=>$weight,
        'height'=>$height,
        'diagnosis' => $diagnosis,
    ];
    
    $patients[] = $patient;    
    return $patient;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $age = $_POST['age'];
    $NID=$_POST['NID'];
    $gender = $_POST['gender'];
    $martualStatus = $_POST['martualStatus'];
    $umurenge = $_POST['umurenge'];
    $akagali=$_POST['akagali'];
    $phoneNumber = $_POST['phoneNumber'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $diagnosis = $_POST['diagnosis'];   
    $newPatient = addPatient($fname,$lname, $age,$NID, $gender, $martualStatus,$umurenge, $akagali, $phoneNumber, $weight,$height,$diagnosis);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Patient Record</title>
</head>
<body>
    <h1>Hospital Patient Record</h1>

    
    <form method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="name" required><br>

        <label for="lname">First Name:</label>
        <input type="text" name="name" required><br>


        <label for="age">Age:</label>
        <input type="number" name="age" required><br>

         <label for="NID">NID:</label>
        <input type="number" name="age" required><br>


        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br>
        <label for="martualStatus">Martual status:</label>
        <input type="text" name="martualStatus" required><br>

        <label for="umurenge">Umurenge:</label>
        <input type="text" name="umurenge" required><br>
        <label for="akagali">Aagali:</label>
        <input type="text" name="akagali" required><br>
        <label for="phoneNumber">Phone number:</label>
        <input type="phoneNumber" name="phoneNumber" required><br>

        <label for="weight">Weight:</label>
        <input type="text" name="weight" required><br>

         <label for="height">Height:</label>
        <input type="text" name="height" required><br>


        <label for="diagnosis">Diagnosis:</label>
        <textarea name="diagnosis" required></textarea><br>

        <input type="submit" value="Register Patient">
    </form>
    <!-- addPatient($fname,$lname, $age,$NID, $gender, $martualStatus,$umurenge, $akagali, $phoneNumber, $weight,$height,$diagnosis); -->

    <?php
    // Display the newly registered patient
    if (isset($newPatient)) {
        echo "<h2>New Patient Information:</h2>";
        echo "Fname: " . $newPatient['fname'] . "<br>";
        echo "Lname: " . $newPatient['lname'] . "<br>";
        echo "Age: " . $newPatient['age'] . "<br>";
        echo "NIDA: " . $newPatient['NIDA'] . "<br>";
        echo "Gender: " . $newPatient['gender'] . "<br>";
        echo "MartualStatus: " . $newPatient['martualStatus'] . "<br>";
        echo "Umurenge: " . $newPatient['umurenge'] . "<br>";
        echo "Akagali: " . $newPatient['akagali'] . "<br>";
        echo "PhoneNumber: " . $newPatient['phoneNumber'] . "<br>";
        echo "Weight: " . $newPatient['weight'] . "<br>";
        echo "Height: " . $newPatient['height'] . "<br>";
        echo "Diagnosis: " . $newPatient['diagnosis'] . "<br>";
    }
    ?>

    
    <h2>List of Registered Patients:</h2>
    <ul>
        <?php foreach ($patients as $patient): ?>
            <li>
                Fname: <?php echo $patient['fname']; ?><br>
                Lname: <?php echo $patient['Lname']; ?><br>
                Age: <?php echo $patient['age']; ?><br>
                NIDA: <?php echo $patient['NIDA']; ?><br>
                Gender: <?php echo $patient['gender']; ?><br>
                MartualStatus: <?php echo $patient['martualStatus']; ?><br>
                Umurenge: <?php echo $patient['umurenge']; ?><br>
                Akagali: <?php echo $patient['akagali']; ?><br>
                PhoneNumber: <?php echo $patient['phoneNumber']; ?><br>
                Weight: <?php echo $patient['weight']; ?><br>
                Height: <?php echo $patient['height']; ?><br>
                Diagnosis: <?php echo $patient['diagnosis']; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
