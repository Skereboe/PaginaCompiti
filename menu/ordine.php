<?php
// Configurazione per la connessione al database
$host = "localhost";        // Host del database
$username = "root";         // Nome utente del database
$password = "root";         // Password del database
$dbname = "ristorante";     // Nome del database

// Creazione della connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>");
}

// Verifica il tipo di richiesta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'signup') {
        // Registrazione utente
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO utenti (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registrazione completata con successo!</p>";
        } else {
            echo "<p style='color: red;'>Errore: Username già esistente o problema nella registrazione.</p>";
        }
        $stmt->close();
    } elseif ($action === 'login') {
        // Login utente
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM utenti WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo "<p style='color: green;'>Login riuscito! Benvenuto, $username.</p>";
            } else {
                echo "<p style='color: red;'>Password errata!</p>";
            }
        } else {
            echo "<p style='color: red;'>Utente non trovato!</p>";
        }
        $stmt->close();
    } elseif ($action === 'order') {
        // Creazione ordine
        $piatto = $_POST['piatto'];
        $bevanda = $_POST['bevanda'];
        $dessert = $_POST['dessert'];

        if ($piatto && $bevanda && $dessert) {
            $sql = "INSERT INTO ordini (piatto, bevanda, dessert) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $piatto, $bevanda, $dessert);

            if ($stmt->execute()) {
                echo "<p style='color: green;'>Ordine effettuato con successo!</p>";
            } else {
                echo "<p style='color: red;'>Errore durante l'elaborazione dell'ordine.</p>";
            }
            $stmt->close();
        } else {
            echo "<p style='color: red;'>Per favore seleziona tutti gli elementi.</p>";
        }
    } else {
        echo "<p style='color: red;'>Azione non valida.</p>";
    }
} else {
    echo "<p style='color: red;'>Metodo non supportato.</p>";
}

// Chiusura della connessione
$conn->close();
?>
