<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    </link>
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
    </link>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <title>Créer un compte</title>
</head>

<body>

    <img class="wave" src="WAVE.jpg">
    <div class="container">
        <div class="login-container">
            <form action="#" method="post">
                <img class="avatar" src="NEWAVATAR.svg">
                <h2>Créer votre compte</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Nom </h5>
                        <input name="nom" class="input" type="text" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Prenom </h5>
                        <input name="Prenom" class="input" type="text" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>email</h5>
                        <input name="email" class="input" type="text" required>
                    </div>
                </div>
                <div class="input-div three">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Mot de passe</h5>
                        <input name="pword" class="input" id="pass" type="password" required>
                    </div>
                    <i id="icon" class="fa fa-eye-slash"></i>
                </div>

                <div class="input-div four">
                    <div class="i">
                        <i class="fa fa-key" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5>Confirmez le mot de passe</h5>
                        <input class="input2" id="pass2" type="password" required>

                    </div>
                    <i id="icon2" class="fa fa-eye-slash"></i>
                </div>

                <a href="../DP/Connect.php"> Avez-vous déjà un compte ? </a>
                <input type="submit" class="btn" name="inscription" value="Créer" required>

            </form>
        </div>

        <div class="img">
            <img src="ACCESS1.svg">
        </div>

    </div>

    <script type="text/javascript" src="main.js"></script>
</body>

</html>
<?php
if (isset($_POST["inscription"])) {
    if (!empty($_POST["nom"]) && !empty($_POST["Prenom"])  && !empty($_POST["email"]) && !empty($_POST["pword"])) {
        if (strpos($_POST["email"], "@admin-emsi.ma")) {
            $email = $_POST["email"];
            $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
            $stm = $pdo->prepare("select * from login_admin where email=? ");
            $stm->execute(
                array(
                    $email
                )
            );
            if ($stm->rowCount() != 0) {
                echo '<script>alert("compte déja existant");</script>';
            } else {
                $stm = $pdo->prepare("insert into login_admin(nom,prenom,email,pwd)values(:nom,:prenom,:email,:mpass)");
                $stm->execute(
                    array(
                        ":nom" => $_POST["nom"],
                        ":prenom" => $_POST["Prenom"],
                        ":email" => $_POST["email"],
                        ":mpass" => $res = password_hash($_POST["pword"], PASSWORD_DEFAULT)
                    )
                );
                echo "<script>window.location.href = '../Part-Choix/choix.html'</script>";
            }
        } else {
            echo '<script>alert("Ce compte n est pas un compte administrateur");</script>';
        }
    } else {
        echo '<script>alert("Veuillez remplir le formulaire");</script>';
    }
}