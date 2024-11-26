<?php
// login.php: Gestisce l'autenticazione dell'utente tramite nome utente e password
<?php
// login.php: Gestisce l'autenticazione dell'utente tramite nome utente e password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inseriti nel form di login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Esempio di autenticazione con credenziali predefinite
    if ($username == "admin" && $password == "admin") {
        // Autenticazione riuscita
        echo "<h1>Login effettuato con successo!</h1>";
    } else {
        // Autenticazione fallita
        echo "<h1>Nome utente o password errati!</h1>";
    }
} else {
    // Mostra il modulo di login se il metodo non è POST
    echo '
    <!DOCTYPE html>
    <html>
    <body>
        <form action="login.php" method="POST">
            <label for="username">Nome utente:</label><br>
            <input type="text" id="username" name="username"><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            
            <input type="submit" value="Accedi">
        </form>
    </body>
    </html>
    ';
}
?>
