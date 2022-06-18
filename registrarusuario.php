<?php include 'templates/cabecera.php';
include 'conecciones/conn.php';?>

<div class="card mb-3">
        <h3 class="card-header">Nuevo Usuario</h3>
    </div>
    <div class="container">
        <form method="post" action="conecciones/registro_ABM.php">
            <fieldset>
                <div class="form-group">
                    <label class="form-label mt-4">Email</label>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="nombrecliente" placeholder="Introduzca el email del usuario...">

                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Contraseña</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="contra" aria-describedby="nombrecliente" placeholder="Introduzca la contraseña del usuario..">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Seleccione el rol del Usuario</label>
                    <select class="form-select" id="frutas" name="rol" class="text-capitalize">
                        <?php 
                            $sql="SELECT * FROM `roles`";
                            $res=mysqli_query($conn, $sql);
                            foreach($res as $row){
                                echo "<option class='text-capitalize'>".$row['tipo']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <br>
                <button type="submit" name="registro" class="btn btn-primary">Registrar Usuario Nuevo</button>
            </fieldset>
        </form>
    </div>

</body>
</html>