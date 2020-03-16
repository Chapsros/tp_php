<?php
$title = "Accueil";
require_once 'views/layout/header.php';
require_once 'functions/db.php';
$pdo = getPdo();
?>

<div class="jumbotron">
  <h1 class="display-4">Liste de voiture</h1>
</div>

<form method="get">
  <input type="text" name="s" id="" placeholder="Recherche..." />
  <input type="submit" value="Rechercher" />
</form>

<?php

if (isset($_GET['s'])) {
  $search = $_GET['s'];

  $query = "SELECT * FROM voiture where nom LIKE :search";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['search' => "%$search%"]);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  var_dump($results);
}

require_once 'views/layout/footer.php'; ?>