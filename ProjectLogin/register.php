<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Cifra la password

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registrazione riuscita! <a href='login.html'>Vai al login</a>";
    } else {
        echo "Errore: " . mysqli_error($conn);
    }
}
?>
