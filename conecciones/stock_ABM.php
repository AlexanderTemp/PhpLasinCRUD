<?php
include "conn.php";
function resend()
{
    header("Location: ../registrarstock.php");
}
if (isset($_POST['insertar'])) {
    $nom = $_POST['nombrefruta'];
    $can = $_POST['cantidad'];
    $pre = $_POST['precio'];
    $sql = "INSERT INTO `stock` (nombre, cantidad, preciounitario) values('$nom', '$can', '$pre')";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        header('Location: ../listarstock.php?status=error'); 
    } else {
        header('Location: ../listarstock.php?status=success'); 
    }
}
if (isset($_GET['baja'])) {
    $id = $_GET['baja'];
    $sql = "DELETE FROM `stock` WHERE idstock='$id'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die("No hay conexión: " . mysqli_connect_errno());
    } else {
        header("Location: ../listarstock.php");
    }
}
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombrefruta'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $sql = "UPDATE `stock` SET idstock='$id', nombre='$nombre', cantidad='$cantidad', preciounitario='$precio' WHERE idstock='$id'";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die("Error de conexion: " . mysqli_connect_errno());
    } else {
        header("Location: ../listarstock.php");
    }
}


$conn->close();
