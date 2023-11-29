<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";
$conn2 = mysqli_connect($servername, $username, $password, $database);

if (!$conn2) {
    die("Something went wrong;");
}

// SQL QUERY
$query = "SELECT id, image, full_name, email FROM `users`;";

// Fetching data from the database
$output = mysqli_query($conn2, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark nav-tab">
        <div class="container-fluid">
            <h1 class="navbar-brand">User Details</h1>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<body class="crud" onload="init()">
    <main>
        <section class="table">
            <table class="table table-striped">
                <thead>
                    <tr>          
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                while ($row = mysqli_fetch_assoc($output)) {
                    echo '
                        <tr>                  
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['full_name'] . '</td>
                            <td>' . $row['email'] . '</td> 
                            <td><img src="images/' . $row["image"] . '" width="100" height="100" alt="' . $row["image"] . '"></td> 
                        </tr>';
                }
                ?>

                </tbody>
            </table>
        </section>
    </main>
</body>
</html>

<?php
// Close the connection
mysqli_close($conn2);
?>
