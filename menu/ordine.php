<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo ordine</title>
</head>
<body>

<form action="esercizio1.html">
    <h1>Riepilogo del tuo ordine</h1>

    <?php
    function estraiPrezzo($valore) {
        $parti = explode('_', $valore);
        return isset($parti[1]) ? floatval($parti[1]) : 0;
    }

    function estraiNome($valore) {
        $parti = explode('_', $valore);
        return isset($parti[0]) ? $parti[0] : "Non selezionato";
    }

    $piatto = isset($_GET['piatto']) && $_GET['piatto'] !== 'null' ? $_GET['piatto'] : null;
    $bevanda = isset($_GET['bevanda']) && $_GET['bevanda'] !== 'null' ? $_GET['bevanda'] : null;
    $dessert = isset($_GET['dessert1']) && $_GET['dessert1'] !== 'null' ? $_GET['dessert1'] : null;

    $totale = estraiPrezzo($piatto) + estraiPrezzo($bevanda) + estraiPrezzo($dessert);
    ?>

    <div>
        <p>Piatto: <?php echo $piatto ? estraiNome($piatto) . " - €" . number_format(estraiPrezzo($piatto), 2, ',', '') : "Non selezionato"; ?></p>
        <p>Bevanda: <?php echo $bevanda ? estraiNome($bevanda) . " - €" . number_format(estraiPrezzo($bevanda), 2, ',', '') : "Non selezionato"; ?></p>
        <p>Dessert: <?php echo $dessert ? estraiNome($dessert) . " - €" . number_format(estraiPrezzo($dessert), 2, ',', '') : "Non selezionato"; ?></p>
    </div>

    <div>
        <h2>Totale dovuto</h2>
        <p>€<?php echo number_format($totale, 2, ',', ''); ?></p>
    </div>

    <div>
        <button type="submit">Torna alla home</button>
    </div>
</form>

</body>
</html>
