<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Register - Hospital Management System</title>
    <!-- Include any CSS stylesheets or libraries here -->
</head>
<body>
    <header>
        <h1>Welcome to the Hospital Management System</h1>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Hospital Management System</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Register</h2>
                <!-- Registration Form (Bootstrap) -->
                <form>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Choose a password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
            <div class="col-md-6">
                <!-- Image -->
                <img src="images/hospital_image.png" alt="Hospital Image" class="img-fluid">
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Hospital Management System</p>
    </footer>
</body>
</html>
