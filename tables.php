<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Patient Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Hospital Patient Record</h1>

        <!-- Search form -->
        <form method="post" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by First Name, Last Name, NID, or Phone Number">
            <input type="submit" value="Search" class="btn btn-primary">
        </form>

        <?php
        $servername = "localhost";  // Change to your database server hostname
        $username = "root";         // Change to your database username
        $password = "";             // Change to your database password
        $databaseName = "urugero122";

        // Create a connection to the MySQL server
        $conn = new mysqli($servername, $username, $password, $databaseName);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $search = '';
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        }

        // Select data from the 'newpatient' table based on search criteria
        $sql = "SELECT * FROM newpatient
                WHERE fname LIKE '%$search%'
                OR lname LIKE '%$search%'
                OR NID = '$search'
                OR phoneNumber = '$search'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data in a table with Bootstrap styles
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Age</th>';
            echo '<th>NID</th>';
            echo '<th>Gender</th>';
            echo '<th>Marital Status</th>';
            echo '<th>Umurenge</th>';
            echo '<th>Akagali</th>';
            echo '<th>Phone Number</th>';
            echo '<th>Weight</th>';
            echo '<th>Height</th>';
            echo '<th>Diagnosis</th>';
            echo '</tr>';
            echo '</thead>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['fname'] . '</td>';
                echo '<td>' . $row['lname'] . '</td>';
                echo '<td>' . $row['age'] . '</td>';
                echo '<td>' . $row['NID'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['martualStatus'] . '</td>';
                echo '<td>' . $row['umurenge'] . '</td>';
                echo '<td>' . $row['akagali'] . '</td>';
                echo '<td>' . $row['phoneNumber'] . '</td>';
                echo '<td>' . $row['weight'] . '</td>';
                echo '<td>' . $row['height'] . '</td>';
                echo '<td>' . $row['diagnosis'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p class="mt-3">0 results</p>';
        }

        // Close the connection
        $conn->close();
        ?>
    </div>

    <!-- Include Bootstrap JS from a CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
