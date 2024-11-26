<?php
// Avvia la sessione
session_start();

// Se i dati di registrazione sono stati inviati, memorizzali nella sessione
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signup_username']) && isset($_POST['signup_password'])) {
    $_SESSION['signup_username'] = $_POST['signup_username'];
    $_SESSION['signup_password'] = $_POST['signup_password'];
}

// Se l'utente sta tentando di accedere
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login_username']) && isset($_POST['login_password'])) {
    // Recupera i dati di registrazione dalla sessione
    $signup_username = $_SESSION['signup_username'] ?? null;
    $signup_password = $_SESSION['signup_password'] ?? null;

    // Dati inseriti nel form di login
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    // Verifica delle credenziali
    if ($signup_username && $login_username === $signup_username && $login_password === $signup_password) {
        echo "<h1>Benvenuto, $login_username!</h1>";
        echo '<a href="esercizio4.html"><button>Torna alla Home</button></a>';
    } else {
        echo "<h1>Credenziali errate. Riprova.</h1>";
        echo '<a href="signin.php"><button>Torna al Sign In</button></a>';
    }
} else {
    // Mostra il form di accesso
    echo '<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <h1>Sign In</h1>

    <!-- Form di accesso -->
    <form method="post" action="signin.php">
        <label for="username">Nome Utente:</label>
        <input type="text" id="username" name="login_username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="login_password" required><br><br>

        <button type="submit">Accedi</button>
    </form>

    <!-- Pulsante per tornare al Sign Up -->
    <br>
    <a href="esercizio4.html"><button>Torna al Sign Up</button></a>

    <!-- Footer con descrizione -->
    <footer>
        <p>Questa pagina verifica le credenziali inserite e consente l"accesso solo se corrette.</p>
    </footer>
</body>
</html>';
}
?>
