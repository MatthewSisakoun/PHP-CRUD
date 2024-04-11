<?php
$pdo = new PDO("mysql:host=localhost;dbname=CRUD", "root", "");

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $req = $pdo->prepare("DELETE FROM eleve WHERE id = :id");
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    header("location: display.php");
    exit();
}
?>