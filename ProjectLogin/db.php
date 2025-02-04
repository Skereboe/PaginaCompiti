<?php
$conn = mysqli_connect("localhost", "root", "", "login_system");
if (!$conn) {
    die("Errore di connessione: " . mysqli_connect_error());
}
?>
