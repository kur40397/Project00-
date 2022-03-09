<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    </link>
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    </link>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap">

    <title>Professeurs Manager</title>


</head>

<body>

    <style>
    .col-md-3 {
        width: 50%;
        padding-left: 50px;

    }

    body {
        padding-top: 30px;
        padding-left: 50px;
        padding-right: 100px;

    }
    </style>

</html>
<?php
$pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
$st = $pdo->prepare("SELECT * FROM `department`");
$st->execute();
$tab = $st->fetchAll(PDO::FETCH_ASSOC);
if (empty($tab)) {
  echo "<h1 align='center'>Aucune ligne selectionné</h1>";
} else {
  echo '<table border="1" align="center">';
  echo '<div class = "col-md-3">';
  echo '<table class="table" id="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col">Id</th>';
  echo '<th scope="col">Nom</th>';
  echo '<th scope="col">Professeur</th>';
  echo '<th scope="col">Modifier</th>';
  echo '<th scope="col">Supprimer</th>';
  echo '</tr>';
  echo '</thead>';
  foreach ($tab as $p) {
    $sup = $p["id_dep"];
    echo "<tr><td>" . $p["id_dep"] . "</td><td>" . $p["nom_depart"] . "</td>" .
      "<td><a class='btn btn-primary' href='departement/liste_dep_prof.php?id=$sup'>Professeur</a></td>
       <td><a class='btn btn-dark' href='departement/modifier_dep.php?id=$sup'  >Modifier</a></td>
       <td><a class='btn btn-primary' href='departement/supprimer_dep.php?id=$sup' >Supprimer</a></td></tr>";
  }
  echo "</table>";
}
?>
<br>
<br>
<a href="choix.html" class="btn btn-dark">Annuler</a>


</div>