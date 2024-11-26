<?php
// Verifica se la richiesta è di tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recupera i dati inseriti nel form di login
    $nomeutente = $_POST['nomeutente'];
    $password = $_POST['password'];

    // Controlla se le credenziali corrispondono ai valori predefiniti
    if ($nomeutente == "Mario" && $password == "123") {
        // Accesso riuscito
        echo "Benvenuto $nomeutente nella pagina riservata del sito!";
    } else {
        // Accesso fallito: credenziali non corrette
        echo "Attenzione: credenziali non corrette.";
        // Fornisce un link per tornare alla pagina di login
        echo "<a href='esercizio3.html'><button>Torna indietro</button></a>";
    }
}
?>
