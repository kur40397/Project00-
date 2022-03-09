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
    <?php
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $st = $pdo->prepare("SELECT * FROM `cours` where id_cours =:id");
    $st->execute(
        array(":id" => $_GET["id"])
    );
    $tab = $st->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="formu">
        <form class="row g-3" method="post" action="#">
            <div class="col-md-6">
                <b><label for="inputNom" class="form-label">Intitulé</label></b>
                <input type="text" name="intil" class="form-control" value="<?php echo $tab['intitule']; ?>">
            </div>

            <div class="col-12">
                <button type="submit" name="env" class="btn btn-primary">Enregistrer</button>
                <a class="btn btn-dark" href="../cours1.php">Annuler</a>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST["env"])) {
        $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
        $stm = $pdo->prepare("update  cours set intitule= ? where id_cours=?");
        $stm->execute(
            [
                $_POST["intil"],
                $_GET["id"]
            ]
        );
        echo "<script>window.location.href = '../cours1.php'</script>";
    }
    ?>

</body>

</html>
</body>

</html>