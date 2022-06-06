<?php include 'templates/cabecera.php';
include 'conecciones/conn.php';?>

<div class="card mb-3">
        <h3 class="card-header">Inicio (Registrar venta)</h3>
    </div>
    <div class="container">
        <form method="post" action="conecciones/venta_ABM.php">
            <fieldset>
                <div class="form-group">
                    <label class="form-label mt-4">Seleccione la fruta</label>
                    <select class="form-select" id="frutas" name="fruta">
                        <?php 
                            $sql="SELECT idstock, nombre, preciounitario, cantidad FROM `stock`";
                            $res=mysqli_query($conn, $sql);
                            foreach($res as $row){
                                echo "<option>".$row['nombre']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Nombre del Cliente</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" aria-describedby="nombrecliente" placeholder="Introduzca el nombre del cliente...">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Cantidad Vendida</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" aria-describedby="cantidadvendida" placeholder="Introduzca cantidad...">
                </div>
                <br>
                <button type="submit" name="venta" class="btn btn-primary">Registrar venta</button>
            </fieldset>
        </form>
    </div>

</body>
</html>