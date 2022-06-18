<?php
include "conn.php";

if ($conn) {
    $email = $_POST['usuario'];
    $contra = $_POST['password'];
    $query = "SELECT * FROM usuarios WHERE email='$email' AND password='$contra'";
    $res = mysqli_query($conn, $query);
    $res = mysqli_fetch_assoc($res);
    if ($res['email'] == $_POST['usuario']) {
        session_start();
        $_SESSION['user'] = $res['idusuario'];
        if ($res['id_rol'] == 1) {
            header("Location: ../registrarventa.php");
        } else {
            header("Location: ../listarventas.php");
        }
    } else {
        header("Location: ../index.php");
    }
    $conn->close();
} else {
    die("No hay conexión " . mysqli_connect_errno());
}
