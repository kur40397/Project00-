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
<?php
$pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
$st = $pdo->prepare("SELECT * FROM `department` where id_dep =:id");
$st->execute(
    array(":id" => $_GET["id"])
);
$tab = $st->fetch(PDO::FETCH_ASSOC);
?>

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
            <div class="col-md-6">
                <b><label for="inputNom" class="form-label">Départment</label></b>
                <input type="text" name="nom_dep" class="form-control" id="nom"
                    value="<?php echo $tab['nom_depart']; ?>">
            </div>
            <div class="col-12">
                <button type="Enregistrer" name="ajouter" class="btn btn-primary">Enregistrer</button>
                <a href="../dep1.php" class="btn btn-dark">Annuler</a>
            </div>

        </form>
        <?php
        if (isset($_POST["ajouter"])) {
            $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
            $stm = $pdo->prepare("update  department set nom_depart=:nom_d  where id_dep=:id");
            $stm->execute(
                [
                    ':nom_d' => $_POST["nom_dep"],
                    ':id' => $_GET["id"]
                ]
            );

            echo "<script>window.location.href = '../dep1.php'</script>";
        }
        ?>
    </div>





</body>

</html>