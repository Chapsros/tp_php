<?php
$title = "Administration";
require_once 'views/layout/header.php';
require_once 'functions/db.php';
$pdo = getPdo();

if (isset($_POST['choix'])) {
    if ($_POST['choix'] == 0) {
        $query = "SELECT * FROM voiture WHERE visible = 1";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($results);
    }
    if ($_POST['choix'] == 1) {
        $query = "SELECT * FROM voiture WHERE visible = 0";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($results);
    }
    if ($_POST['choix'] == 2) {
        $query = "SELECT * FROM voiture";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($results);
    }    
  }

?>

<form method="post">
    <div class="form-group">
        <label for="choix">choix affichage des voitures</label>
        <select name="choix" class="form-control" id="choix">
            <option value="0">Afficher les voitures visibles</option>
            <option value="1">Afficher les voitures non visibles</option>
            <option value="2">Afficher toutes les voitures</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Valider">
    </div>
</form>


<?php require_once 'views/layout/footer.php'; ?>