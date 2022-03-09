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
    <title>Départements Manager</title>
</head>

<body>
    <style>
    .formu {
        width: 50%;
        padding-left: 50px;
        padding-top: 30px;
    }

    button {
        width: 100px;
    }
    </style>
    <div class="formu">
        <form class="row g-3" method="post" action="#">
            <div class="col-md-8">
                <b><label for="inputNom" class="form-label">Département</label></b>
                <input type="text" name="nom_dep" class="form-control" id="nom" required>
            </div>

            <div class="col-8">
                <button type="Enregistrer" name="ajouter" class="btn btn-primary">Enregistrer</button>

                <a href="choix.html" class="btn btn-dark">Annuler</a>
            </div>

        </form>

    </div>
</body>

</html>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="main.js"></script>
<?php
if (isset($_POST["ajouter"])) {
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $dep = $_POST["nom_dep"];
    $st = $pdo->prepare("select * from department where  nom_depart=? ");
    $st->execute(
        array(
            $dep
        )
    );
    if ($st->rowCount() != 0) {
        echo '<script>alert("Département déja existant");</script>';
    } else {
        $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
        $stm = $pdo->prepare("insert into department(nom_depart)values(?)");
        $stm->execute(
            array(
                $_POST["nom_dep"]
            )
        );
        echo '<script>alert("Départment ajouté");</script>';
    }
}
?>