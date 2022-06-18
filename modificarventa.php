<?php include 'templates/cabecera.php';
include 'conecciones/conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `ventas` WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $registro = mysqli_fetch_array($res);
    $cantidad=$registro['cantidad'];
    $nombre=$registro['id_fruta'];

    $req="SELECT * FROM `stock` WHERE idstock='$nombre'";
    $req=mysqli_query($conn, $req);
    $req=mysqli_fetch_assoc($req);

    $restaurar=$cantidad+$req['cantidad'];
    $req= "UPDATE `stock` SET cantidad='$restaurar' WHERE nombre='$nombre'";
    $req=mysqli_query($conn, $req);
}
?>
<div class="card mb-3">
    <h3 class="card-header">Modificar Venta</h3>
</div>
<div class="container">
    <form method="post" action="conecciones/venta_ABM.php">
        <fieldset>
            <div class="form-group">
                <label class="form-label mt-4">Id de la Venta</label>
                <input type="text" class="form-control" name="id" aria-describedby="id" value="<?php echo $registro['id'] ?>" readonly>
            </div>
            <div class="form-group">
                <label class="form-label mt-4">Nombre del Cliente</label>
                <input type="text" class="form-control" name="nombrecliente" aria-describedby="cliente" value="<?php echo $registro['cliente'] ?>">
            </div>
            <div class="form-group">
                <label class="form-label mt-4">Fruta</label>
                <select class="form-select" id="frutas" name="fruta">
                    <?php
                    $sql = "SELECT idstock, nombre, preciounitario, cantidad FROM `stock`";
                    $resp = mysqli_query($conn, $sql);
                    foreach ($resp as $row) {
                        if ($row['nombre'] == $registro['fruta']) {
                            echo "<option selected>" . $row['nombre'] . "</option>";
                        } else {
                            echo "<option>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" aria-describedby="cantidad" value="<?php echo $registro['cantidad'] ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="modificar">Modificar registro</button>
        </fieldset>
    </form>
    <br>
    <button class="btn btn-danger" name="cancelar" onclick="history.back()">Cancelar</button>
</div>
</body>

</html>