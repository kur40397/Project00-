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





</head>

<body>




</html>
<title>Se Connecter</title>
</head>

<body>

    <img class="wave" src="WAVE.jpeg">
    <div class="container">

        <div class="img">
            <img src="WELCOME.svg">
        </div>

        <div class="login-container">
            <form action="#" method="post">
                <img class="avatar" src="NEWAVATAR.svg">
                <h2>Connectez-vous</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input name="email" class="input" type="text" required>
                    </div>
                </div>

                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Mot de passe</h5>
                        <input name="passwd" class="input" id="pass" type="password" required>

                    </div>
                    <i id="icon" class="fa fa-eye-slash"></i>
                </div>

                <a href="#"> Mot de passe oublié ? </a>
                <a href="../DPsnd/CreateAcc.php"> Vous n'avez pas de compte ? </a>
                <a href="../main-index.html"> Revenir à la page d'acceuil </a>
                <button class="btn btn-primary btn-lg" name="conn">
                    Se Connecter
                </button>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="main.js"></script>
</body>


</html>
<?php
if (isset($_POST["conn"])) {
    if (!empty($_POST["passwd"]) && !empty($_POST["email"])) {
        $pdo = new PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
        $email = $_POST['email'];
        $pass = $_POST['passwd'];
        $stm = $pdo->prepare("select * from login_admin where email=:mail");
        $stm->execute(array(":mail" => $email));
        $res = $stm->fetch();
        if ($res && password_verify($pass, $res["pwd"]) == true) {
            echo "<script>window.location.href = '../Part-Choix/choix.html'</script>";
        } else {
            echo '<script>alert("Vous n avez un compte chez emsi manager");</script>';
        }
    }
}
?>