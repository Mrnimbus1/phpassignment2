<?php
include("database.php");

if (isset($_POST["create"])) {
    $fullName = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $sqlInsert = "INSERT INTO users (full_name, email) VALUES ('$fullName', '$email')";

    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "User Added Successfully!";
        header("Location: crud.php");
        exit(); // Add exit to stop the script execution after the header
    } else {
        die("Something went wrong");
    }
}

if (isset($_POST["edit"])) {
    $fullName = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sqlUpdate = "UPDATE users SET full_name = '$fullName', email = '$email' WHERE id='$id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "User Updated Successfully!";
        header("Location: crud.php");
        exit(); // Add exit to stop the script execution after the header
    } else {
        die("Something went wrong");
    }
}

?>
