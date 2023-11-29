<?php
session_start();
if (isset($_SESSION["users"])) {
   header("Location: login.php");
}
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
                    <a class="nav-link" href="output.php">Output</a>
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
                        <th>Email</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "login";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['full_name'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td><img src='images/" . $row['image'] . "' alt='User Image' style='width: 50px; height: 50px;'></td>
                                    <td>
                                        <a class='btn btn-success' href='edit.php?id=" . $row['id'] . "'> <img style='width:16px;height:16px' src='edit.png'/></a>
                                        <a class='btn btn-danger' href='delete.php?id=" . $row['id'] . "'> <img style='width:20px;height:20px' src='del.png'/></a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </section>
    </main>
</body>
</html>
