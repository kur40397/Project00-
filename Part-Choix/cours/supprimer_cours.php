<?php
if (isset($_GET["id"])) {
    $id_c = $_GET["id"];
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $st1 = $pdo->prepare("select * from enseignement where id_cours=?");
    $st1->execute(array($id_c));
    $st = $pdo->prepare("delete from cours where id_cours=:id_C");
    $st->execute(
        array(":id_C" => $_GET["id"])
    );

    echo "<script>window.location.href = '../cours1.php'</script>";
}