<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: ./registrarventa.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <title>Lasin</title>
</head>
<body class="vh-100 d-flex justify-content-center align-items-center h-100">
    <div class="container-sm">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-auto">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        Iniciar sesion
                    </div>
                    <div class="card-body">
                        <form method="post" action="conecciones/login.php">     
                                <div class="form-group">
                                    <label class="form-label mt-4">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="cantidadvendida" placeholder="Introduzca su usuario...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="cantidadvendida" placeholder="Introduzca su contraseña...">
                                </div>
                                <br>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
    
    
    
    





