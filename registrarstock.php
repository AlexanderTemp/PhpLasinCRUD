<?php include 'templates/cabecera.php';
?>
<div class="card mb-3">
    <h3 class="card-header">Registrar Stock</h3>
</div>

<div class="container">
    <form method="post" action="conecciones/stock_ABM.php">
        <fieldset>
            <div class="form-group">
                <label class="form-label mt-4">Nombre de la fruta</label>
                <input type="text" class="form-control" name="nombrefruta" aria-describedby="fruta" placeholder="Introduzca el nombre de la fruta...">
            </div>
            <div class="form-group">
                <label class="form-label mt-4">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" aria-describedby="cantidadregistrar" placeholder="Introduzca un numero...">
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Precio unitario (Bs)</label>
                <input type="text" class="form-control" name="precio" aria-describedby="preciounitario" placeholder="Introduzca el precio unitario...">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="insertar">Registrar ingreso</button>
        </fieldset>
    </form>
</div>
</body>

</html>