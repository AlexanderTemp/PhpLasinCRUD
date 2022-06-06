<?php include 'templates/cabecera.php';
include 'conecciones/conn.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `stock` WHERE idstock='$id'";
    $res = mysqli_query($conn, $sql);
    $registro=mysqli_fetch_array($res);
}
?>
    <div class="card mb-3">
        <h3 class="card-header">Modificar Stock</h3>
    </div>
    <div class="container">
        <form method="post" action="conecciones/stock_ABM.php">
            <fieldset>
                <div class="form-group">
                    <label class="form-label mt-4">Id de la fruta</label>
                    <input type="text" class="form-control" name="id" aria-describedby="id" value="<?php echo $registro['idstock'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Nombre de la fruta</label>
                    <input type="text" class="form-control" name="nombrefruta" aria-describedby="fruta" value="<?php echo $registro['nombre'] ?>">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" aria-describedby="cantidadregistrar" value="<?php echo $registro['cantidad'] ?>">
                </div>

                <div class="form-group">
                    <label class="form-label mt-4">Precio unitario (Bs)</label>
                    <input type="text" class="form-control" name="precio" aria-describedby="preciounitario" value="<?php echo $registro['preciounitario'] ?>">
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