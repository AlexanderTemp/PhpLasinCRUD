<?php
session_start();
$servidor = "127.0.0.1";
$user = "root";
$password = "";
$BD = "frutas_2";
$conn = mysqli_connect($servidor, $user, $password, $BD);
$id = $_SESSION['user'];
$sql = "SELECT * FROM `usuarios` WHERE idusuario='$id'";
$res = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($res);
$user_var = $res['id_rol'];

$sql2 = "SELECT * FROM `roles` WHERE id='$user_var'";
$res2 = mysqli_query($conn, $sql2);
$res2 = mysqli_fetch_assoc($res2);

$rol = $res2['tipo'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link href="./assets/fontawesome/css/all.css" rel="stylesheet" />
    <title>Lasin</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lasin 2022</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto d-flex w-100 justify-content-between">
                    <div class="d-flex">
                        <?php
                        if ($rol == 'admin') {
                            echo "<li class='nav-item'>
                                <a class='nav-link' href='registrarventa.php'>Registrar Venta
                                </a>
                            </li>";
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="listarventas.php">Listar Ventas</a>
                        </li>
                        <?php
                        if ($rol == 'admin') {
                            echo "
                                <li class='nav-item'>
                            <a class='nav-link' href='registrarstock.php'>Registrar Stock</a>
                        </li>
                                ";
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="listarstock.php">Listar Stock</a>
                        </li>
                        <?php
                        if ($rol == 'admin') {
                            echo "
                                <li class='nav-item'>
                            <a class='nav-link' href='registrarusuario.php'>Registrar Usuarios</a>
                        </li>
                                ";
                        }
                        ?>
                        <?php
                        if ($rol == 'admin') {
                            echo "
                                <li class='nav-item'>
                            <a class='nav-link' href='listarusuario.php'>Listar Usuarios</a>
                        </li>
                                ";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="acercaautor.php">Acerca del Autor</a>
                        </li>
                    </div>
                    <div class="d-flex">
                        <?php echo "<h3 class='text-light text-uppercase'>" . $rol . "</h3>" ?>
                        <button class="btn btn-warning"><a href="./logout.php" class="text-decoration-none text-light">x</a></button>
                    </div>
                </ul>

            </div>
        </div>
    </nav>