<?php
// Connessione al database
$host = 'localhost';
$dbname = 'ristorante';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errore di connessione: " . $e->getMessage());
}

// Gestione delle richieste
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'signup') {
        // Registrazione utente
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO utenti (username, password) VALUES (?, ?)");
        try {
            $stmt->execute([$username, $password]);
            echo "Registrazione completata con successo!";
        } catch (PDOException $e) {
            echo "Errore: Username già esistente.";
        }
    } elseif ($action === 'login') {
        // Login utente
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM utenti WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            echo "Login riuscito! Benvenuto, $username.";
        } else {
            echo "Credenziali errate!";
        }
    } elseif ($action === 'order') {
        // Creazione ordine
        $piatto = $_POST['piatto'];
        $bevanda = $_POST['bevanda'];
        $dessert = $_POST['dessert'];

        if ($piatto && $bevanda && $dessert) {
            $stmt = $pdo->prepare("INSERT INTO ordini (piatto, bevanda, dessert) VALUES (?, ?, ?)");
            $stmt->execute([$piatto, $bevanda, $dessert]);
            echo "Ordine effettuato con successo!";
        } else {
            echo "Per favore seleziona tutti gli elementi.";
        }
    } else {
        echo "Azione non valida.";
    }
} else {
    echo "Metodo non supportato.";
}
?>
