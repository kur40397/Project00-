<?php
if (isset($_GET["id"])) {
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $st = $pdo->prepare("delete from professeur where id_prof=:id_pro");
    $st->execute(
        array(":id_pro" => $_GET["id"])
    );
    echo "<script>window.location.href = '../prof1.php'</script>";
}