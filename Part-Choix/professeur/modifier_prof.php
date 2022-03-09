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
    .formu {
        width: 50%;
        padding-left: 50px;
        padding-top: 30px;
    }

    button {
        width: 100px;
    }

    .wave {
        position: fixed;
        height: 50%;
        left: 900px;
        bottom: 250px;
        z-index: -1;
    }
    </style>

    <?php
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $st = $pdo->prepare("SELECT * FROM `professeur` where id_prof=:id");
    $st->execute(
        array(":id" => $_GET["id"])
    );
    $tab = $st->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="formu">
        <form class="row g-3" method="post" action="#">

            <div class="col-md-6">
                <b><label for="inputPrénom" class="form-label">Nom</label></b>
                <input type="text" name="nom" class="form-control" id="name" value="<?php echo $tab['nom']; ?>">
            </div>

            <div class="col-md-6">
                <b><label for="inputNom" class="form-label">Prenom</label></b>
                <input type="text" name="prenom" class="form-control" id="lastname"
                    value="<?php echo $tab['prenom']; ?>">
            </div>

            <div class="col-md-12">
                <b><label for="inputEmail" class="form-label">Email</label></b>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder=""
                        aria-label="Recipient's username" aria-describedby="basic-addon2" id="email"
                        value="<?php echo $tab['email']; ?>">

                </div>
            </div>

            <div class="col-md-4">
                <b><label for="inputTéléphone" class="form-label">Téléphone</label></b>
                <input type="text" name="teleph" class="form-control" id="tel" value="<?php echo $tab['telephone']; ?>">
            </div>

            <div class="col-md-4">
                <b><label for="inputCIN" class="form-label">CIN</label></b>
                <input type="text" name="cin" class="form-control" id="cin" value="<?php echo $tab['cin']; ?>">
            </div>
            <div class="col-12">
                <b><label for="inputAddresse" class="form-label">Addresse</label></b>
                <input type="text" class="form-control" id="adr"
                    placeholder="Rue n° , Immeble n° , Etage n° , Appartement n° " name="adresse"
                    value="<?php echo $tab['adresse']; ?>">
            </div>
            <div class="col-md-6">
                <b><label for="rday" class="form-label">Date de recrutement</label></b>
                <input class="form-select" name="date_rec" id="dater" type="date"
                    value="<?php echo $tab['date_recrutement']; ?>">
            </div>
            <div class="col-md-4">
                <b><label for="inputRégion" name="dep1" class="form-label">departement</label></b>
                <?php
                $st1 = $pdo->prepare("SELECT * FROM `department`  ");
                $st1->execute();
                $tab1 = $st1->fetchAll(PDO::FETCH_ASSOC);
                echo '<select id="inputRégion" class="form-select" name="dep1">';
                foreach ($tab1 as $v) {
                    if ($v['id_dep'] !=  $tab["id_dep"]) {
                        echo '<option value=' . $v['id_dep'] . '>' . $v["nom_depart"];
                        echo "</option>";
                    } else {
                        echo '<option value=' . $v['id_dep'] . ' selected="selected">' . $v["nom_depart"];
                        echo "</option>";
                    }
                }
                echo "</select>";
                ?>
            </div>

            <div class="col-12">
                <button type="submit" name="ajouter" class="btn btn-primary">Enregistrer</button>
                <a href="../prof1.php" class="btn btn-dark">Annuler</a>
            </div>
        </form>

        <?php
        if (isset($_POST["ajouter"])) {
            if (!empty($_POST["nom"]) || !empty($_POST["prenom"]) || !empty($_POST["cin"]) || !empty($_POST["adresse"]) || !empty($_POST["adresse"]) || !empty($_POST["teleph"]) || !empty($_POST["date_rec"]) || !empty($_POST["dep1"])) {
                if (strpos($_POST["email"], "@prof-emsi.ma")) {
                    $stm = $pdo->prepare("update  professeur set nom=:nom ,prenom=:prenom,cin=:Cin,adresse=:adresse,telephone=:tel,email=:em,date_recrutement=:date_re,id_dep=:id_p where id_prof=:id_pro");
                    $stm->execute(
                        array(
                            ':nom' => $_POST["nom"],
                            ':prenom' => $_POST["prenom"],
                            ':Cin' => $_POST["cin"],
                            ':adresse' => $_POST["adresse"],
                            ':tel' => $_POST["teleph"],
                            ':em' => $_POST["email"],
                            ':date_re' => $_POST["date_rec"],
                            ':id_p' => $_POST['dep1'],
                            ':id_pro' => $_GET["id"]
                        )
                    );
                    echo "<script>window.location.href = '../prof1.php'</script>";
                } else {

                    echo "<script>alert('Ce compte n est pas un compte professeur');</script>";
                    echo "<script>window.location.href = 'modifier_prof.php'</script>";
                }
            } else {
                echo "<script>alert('Veuillez remplir le formulaire');</script>";
                echo "<script>window.location.href = 'modifier_prof.php'</script>";
            }
        }
        ?>
    </div>