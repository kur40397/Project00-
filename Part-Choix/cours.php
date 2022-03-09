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

    <title>Cours Manager</title>


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
                <b><label for="inputNom" class="form-label">Intitulé</label></b>
                <input type="text" name="intil" class="form-control" id="intitule" required>
            </div>
            <br>
            <div class="col-md-8">
                <b><label for="inputNom" class="form-label">Professeur
                    </label></b>
                <?php
                $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
                $st1 = $pdo->prepare("SELECT * FROM `professeur`");
                $st1->execute();
                $tab1 = $st1->fetchAll(PDO::FETCH_ASSOC);
                echo '<select   class="form-select" name="prof[]" multiple>';
                foreach ($tab1 as $v) {
                    echo '<option value=' . $v['id_prof'] . '>' . $v["nom"] . " " . $v["prenom"];
                    echo "</option>";
                }
                echo "</select>";
                ?>
            </div>
            <div class="col-12">
                <button type="submit" name="env" class="btn btn-primary">Enregistrer</button>
                <a class="btn btn-dark" href="choix.html">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>
<script type="text/javascript" src="main.js"></script>

<?php
if (isset($_POST["env"])) {
    /***********************************************/
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $stm = $pdo->prepare("insert into cours(intitule)values(:inti)");
    $stm->execute(
        array(
            ':inti' => $_POST["intil"]
        )
    );
    /***********************************************************/
    $idCMP = $pdo->lastInsertId();
    $idprof = $_POST["prof"];
    foreach ($idprof as $idp) {
        $stm3 = $pdo->prepare("insert into enseignement(id_cours,id_prof) values(?,?)");
        $stm3->execute([$idCMP, $idp]);
    }
    echo '<script>alert("Cours ajouté");</script>';
}
?>