<?php
include "conn.php";

if ($conn) {
    $email = $_POST['usuario'];
    $contra = $_POST['password'];
    $query = "SELECT * FROM `usuarios` WHERE email='$email' AND password='$contra'";
    $res = mysqli_query($conn, $query);
    if ($res->fetch_row()>0) {
        header("Location: ../inicio.php");
    } else {
        echo "No existe";
    }
    $conn->close();
} else {
    die("No hay conexión " . mysqli_connect_errno());
}
?>