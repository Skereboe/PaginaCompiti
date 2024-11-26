<?php
// ordine.php: Riceve i dati dell'ordine inviati tramite metodo GET e li visualizza

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Recupera i dati selezionati dall'utente nel modulo
    $piatto = $_GET['piatto'];
    $bevanda = $_GET['bevanda'];
    $dessert = $_GET['dessert1'];

    echo '<!DOCTYPE html>
    <html>
    <body>';

    // Controlla se sono stati selezionati tutti gli elementi
    if ($piatto != "null" && $bevanda != "null" && $dessert != "null") {
        // Mostra i dettagli dell'ordine
        echo "<h1>Hai ordinato:</h1>";
        echo "<p>Piatto: " . explode('_', $piatto)[0] . "</p>";
        echo "<p>Bevanda: " . explode('_', $bevanda)[0] . "</p>";
        echo "<p>Dessert: " . explode('_', $dessert)[0] . "</p>";
    } else {
        // Avvisa l'utente di completare l'ordine
        echo "<h1>Seleziona tutti gli elementi per completare l'ordine.</h1>";
    }

    echo '</body>
    </html>';
}
?>
