<?php
if (isset($_GET["id"])) {
    $id_do = $_GET["id"];
    $pdo = new  PDO("mysql:host=localhost;dbname=prjet_php", "root", "");
    $st1 = $pdo->prepare("select * from professeur where id_dep=?");
    $st1->execute(array($id_do));
    $st = $pdo->prepare("delete from department where id_dep=:id_d");
    $st->execute(
        array(":id_d" => $id_do)
    );
    echo "<script> window.location.href = '../dep1.php' </script>";
}