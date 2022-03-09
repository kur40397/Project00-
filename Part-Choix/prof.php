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



    <div class="formu">
        <form class="row g-4" action="#" method="post">

            <div class="col-md-6">
                <b><label for="inputPrénom" class="form-label">Nom</label></b>
                <input type="text" name="nom" class="form-control" id="name" required>

            </div>

            <div class="col-md-6">
                <b><label for="inputNom" class="form-label">Prenom</label></b>
                <input type="text" name="prenom" class="form-control" id="lastname" required>
            </div>

            <div class="col-md-12">
                <b><label for="inputEmail" class="form-label">Email</label></b>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="exemple@prof-emsi.ma"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" id="email" required>

                </div>
            </div>

            <div class="col-md-6">
                <b><label for="inputTéléphone" class="form-label">Téléphone</label></b>
                <input type="text" name="teleph" class="form-control" id="tel" required>
            </div>

            <div class="col-md-6">
                <b><label for="inputCIN" class="form-label">CIN</label></b>
                <input type="text" name="cin" class="form-control" id="cin" required>
            </div>

            <div class="col-12">
                <b><label for="inputAddresse" class="form-label">Addresse</label></b>
                <input type="text" class="form-control" id="adr"
                    placeholder="Rue n° , Immeble n° , Etage n° , Appartement n° " name="adresse" required>
            </div>

            <div class="col-md-6">
                <b><label for="rday" class="form-label">Date de recrutement</label></b>
                <input class="form-select" type="date" name="date_rec" id="dater" required>
            </div>

            <div class="col-md-6">
                <b><label for="inputRégion" name="dep1" class="form-label">Département</label></b>
                <?php
                $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
                $st1 = $pdo->prepare("SELECT * FROM `department`");
                $st1->execute();
                $tab1 = $st1->fetchAll(PDO::FETCH_ASSOC);
                echo '<select  class="form-select" name="dep1">';
                foreach ($tab1 as $v) {
                    echo '<option  hidden selected>Choisir un département</option>';
                    echo '<option value=' . $v['id_dep'] . '>' . $v["nom_depart"];
                    echo "</option>";
                }
                echo "</select>";
                ?>
            </div>
            <div class="col-12">
                <button type="submit" name="ajouter" class="btn btn-primary">Enregistrer</button>
                <a href="choix.html" class="btn btn-dark">Annuler</a>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="main.js"></script>

</html>

<?php
if (isset($_POST["ajouter"])) {

    if (
        !empty($_POST["nom"]) && !empty($_POST["prenom"])
        && !empty($_POST["cin"]) && !empty($_POST["adresse"])
        && !empty($_POST["teleph"]) && !empty($_POST["email"])
        && !empty($_POST["email"]) && !empty($_POST['date_rec'])
        && !empty($_POST['dep1'])
    ) {
        if (strpos($_POST["email"], "@prof-emsi.ma")) {
            $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
            $cin = $_POST["cin"];
            $st = $pdo->prepare("select * from professeur where  cin=? ");
            $st->execute(
                array(
                    $cin
                )
            );
            if ($st->rowCount() != 0) {
                echo '<script>alert("Compte déja existant");</script>';
            } else {
                $stm = $pdo->prepare("insert into professeur(nom,prenom,cin,adresse,telephone,email,date_recrutement,id_dep)values(:nom_p,:prenom_p,
        :cin_p,:adr,:tele,:mail,:date_r,:id_d)");
                $stm->execute(
                    array(
                        ':nom_p' => $_POST["nom"],
                        ':prenom_p' => $_POST["prenom"],
                        ':cin_p' => $_POST["cin"],
                        ':adr' => $_POST["adresse"],
                        ':tele' => $_POST["teleph"],
                        ':mail' => $_POST['email'],
                        ':date_r' => $_POST['date_rec'],
                        ':id_d' => $_POST['dep1']
                    )
                );
                echo '<script>alert("Inscription faite");</script>';
            }
        } else {
            echo '<script>alert("Ce compte n\' est pas un compte professeur");</script>';
        }
    } else {

        echo '<script>alert("Veuillez remplir le formulaire");</script>';
    }
}