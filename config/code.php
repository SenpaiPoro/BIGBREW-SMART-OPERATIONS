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

    $stmt = $conn->prepare(
        "SELECT id, username, password, position
         FROM account
         WHERE username = ?"
    );

    if (!$stmt) {
        die("Database query preparation failed.");
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if ($password === $row['password']) {

            // Start the session only if it is not already active
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            session_regenerate_id(true);

            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['position'] = $row['position'];

            // Redirect according to the user's role
            if ($row['position'] === 'owner') {

                header('Location: ../owner/inventory-view.php');
                exit();

            } elseif ($row['position'] === 'employee') {

                header('Location: ../employee/cashier-dashboard.php');
                exit();

            } else {
                session_unset();
                session_destroy();

                echo "<script>
                    alert('Access denied. Unauthorized account role.');
                    window.location.href = '../login.php';
                </script>";
                exit();
            }
        } else {
            echo "<script>
                alert('Incorrect username or password.');
                window.location.href = '../login.php';
            </script>";
            exit();
        }
    } else {
        echo "<script>
            alert('Incorrect username or password.');
            window.location.href = '../login.php';
        </script>";
        exit();
    }
    $stmt->close();
}
?>