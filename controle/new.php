<?php
$title = "Enregistrement d'une nouvelle voiture";
require_once 'views/layout/header.php';
require_once 'functions/db.php';

$pdo = getPdo();

$query = "SELECT * FROM voiture";
$stmt = $pdo->query($query);
$voiture = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_POST)) {
  $nom = $_POST['nom'];
  $annee_sortie = $_POST['annee_sortie'];
  $nb_km = $_POST['nb_km'];

  $query = "INSERT INTO voiture (nom, annee_sortie, nb_km, visible) VALUES ('$nom', '$annee_sortie', '$nb_km', '1')";

  $stmt = $pdo->query($query);

  if (!$stmt) {
    $err = $pdo->errorInfo();
    echo "Une erreur est survenue lors de l'enregistrement de la nouvelle voiture : " . $err[2];
  } else {
    echo "Nouvelle voiture enregistré";
  }
}

?>

<form method="POST">
  <input type="text" name="nom" id="nom" placeholder="Nom..." />
  <input type="text" name="annee_sortie" id="annee_sortie" placeholder="annee_sortie..." />
  <input type="text" name="nb_km" id="nb_km" placeholder="Nombre de KM..." />
  <input type="submit" value="Enregistrer" />
</form>


<?php require_once 'views/layout/footer.php'; ?>