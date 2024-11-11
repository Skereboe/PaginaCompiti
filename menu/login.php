<!DOCTYPE html>
<html>
<head>
  <title>Accesso a pagina riservata</title>
</head>
<body>

<h2>CONTROLLO CREDENZIALI</h2>

<?php
$nomeutente = $_REQUEST['nomeutente'];
$password = $_REQUEST['password'];

echo "Nome utente: $nomeutente<br>";
echo "Password: $password<br>";

if ($nomeutente == "Admin" && $password == "123") {
  echo "Benvenuto $nomeutente nella pagina riservata del sito!";
} else {
  echo "Attenzione: credenziali non corrette.";
}
?>
<a href='esercizio2.html'><button>Torna indietro</button></a>

</body>
</html>
