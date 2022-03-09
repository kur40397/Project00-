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
    body {
        padding-top: 30px;
        padding-left: 50px;
        padding-right: 100px;

    }
    </style>
    <?php
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $st = $pdo->prepare("SELECT * FROM `professeur`");
    $st->execute();
    $tab = $st->fetchAll(PDO::FETCH_ASSOC);
    if (empty($tab)) {
        echo "<h1 align='center'>Aucune ligne selectionné</h1>";
    } else {
        echo '<div class = "col-md-12">';
        echo '<table class="table" id="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Id</th>';
        echo '<th scope="col">Prénom</th>';
        echo '<th scope="col">Nom</th>';
        echo '<th scope="col">Cin</th>';
        echo '<th width="12%" scope="col">Adresse</th>';
        echo '<th scope="col">Téléphone</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Date de recrutement</th>';
        echo '<th scope="col">Département</th>';
        echo '<th scope="col">Modifier</th>';
        echo '<th scope="col">Supprimer</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($tab as $p) {
            $sup = $p["id_prof"];
            echo "<tr><td>" . $p["id_prof"] . "</td><td>" . $p["nom"] . "</td><td>" . $p["prenom"] . "</td><td>" . $p["cin"] . "</td><td>" . $p["adresse"] . "</td><td>" .
                $p["telephone"] . "</td><td>" . $p["email"] . "</td><td>" . $p["date_recrutement"] .
                "</td><td>";
            $st1 = $pdo->prepare("SELECT * FROM `department`");
            $st1->execute();
            $tab1 = $st1->fetchAll(PDO::FETCH_ASSOC);
            $var = $p["id_dep"];
            foreach ($tab1 as $v) {
                if ($v["id_dep"] == $var) {
                    echo $v["nom_depart"];
                }
            }
            echo "</td><td> <a  class='btn btn-primary' href='professeur/modifier_prof.php?id=$sup'>Modifier</a></td>
            <td><a class='btn btn-dark' href='professeur/supprimer_professeur.php?id=$sup' >Supprimer</a></td>";
        }
        echo "</table>";
    }
    ?>
    <br>
    <br>
    <a href="choix.html" class="btn btn-dark">Annuler</a>

    </div>