<?php
include 'function.php';

if (isset($_POST['register'])) {
    $employeeID = validate($_POST['employee_id']);
    $position = validate($_POST['position']);
    $firstName = validate($_POST['first_name']);
    $lastName = validate($_POST['last_name']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $query = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
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

if (isset($_POST['login'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM account WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['role'] === 'owner') {
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['id'];

                    header('Location: ../owner/inventory-view.php');
                    exit();
                } else {
                    echo "<script>alert('Access denied. You are not an owner.'); window.location.href='../login.php';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Incorrect username or password'); window.location.href='../login.php';</script>";
                exit();
            }
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            header('Location: ../owner/inventory-view.php');
            exit();
        } else {
            echo "<script>alert('Incorrect password'); window.location.href='../login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Incorrect ussername or password'); window.location.href='../Portfolio_Dashboard/login.php';</script>";
        exit();

    }
}

?>