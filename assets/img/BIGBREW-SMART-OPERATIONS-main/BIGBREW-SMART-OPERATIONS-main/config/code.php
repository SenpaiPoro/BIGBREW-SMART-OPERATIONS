<?php
include 'function.php';

if (isset($_POST['register'])) {
    $employeeID = validate($_POST['employee_id']);
    $position = validate($_POST['position']);
    $firstName = validate($_POST['first_name']);
    $lastName = validate($_POST['last_name']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    $sqlite = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sqlite);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();  

    if($result->num_rows > 0) {
        echo "<script>alert('Username already exists'); window.location.href='../Portfolio_Dashboard/register.php';</script>";
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO user (employee_id, position, first_name, last_name, username, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $employeeID, $position, $firstName, $lastName, $username, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful'); window.location.href='../Portfolio_Dashboard/login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='../Portfolio_Dashboard/register.php';</script>";
            exit();
        }
    }
}

if(isset($_POST['login'])){
$username = validate($_POST['username']);
$password = validate($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

if($result->num_rows > 0 ){
    $row = $result-> fetch_assoc();
    if(password_verify($password, $row['password'])){
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header('Location: ../Portfolio_Dashboard/index.php');
        exit();
    } else {
    echo "<script>alert('Incorrect password'); window.location.href='../Portfolio_Dashboard/login.php';</script>";
        exit();
    }
}else{
    echo "<script>alert('Incorrect ussername or password'); window.location.href='../Portfolio_Dashboard/login.php';</script>";
    exit();

    }
} 

?>