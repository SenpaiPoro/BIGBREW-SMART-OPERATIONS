<?php
include 'conn.php';
include 'function.php';



if (isset($_POST['register'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User authenticated successfully
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }
}















?>