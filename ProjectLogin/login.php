<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user_id'] = $email;
        header("Location: dashboard.php");
    } else {
        echo "Email o password errati! <a href='login.html'>Riprova</a>";
    }
}
?>
