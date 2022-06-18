<?php
include 'templates/cabecera.php';
include "conecciones/conn.php";

if (isset($_GET['status'])) {
  $estado = $_GET['status'];
  if ($estado == "success") {
    echo "<div id='toaster' class='toast fade show' role='alert' aria-live='assertive' aria-atomic='true' style='display: block; position:fixed; z-index:1; right:5px; top:5px;'>
    <div class='toast-header' style='justify-content: space-between; background-color: #6BCB77; '>
      <strong class='mr-auto text-light'>Exito</strong>
      <small class='text-muted'> </small>
      <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close' onclick='cerrar()'>
        <span aria-hidden='true'>x</span>
      </button>
    </div>
    <div class='toast-body'>
      Se registro el Stock con éxito!!!
    </div>
  </div>";
  } else {
    echo "<div id='toaster' class='toast fade show' role='alert' aria-live='assertive' aria-atomic='true' style='display: block; position:fixed; z-index:1; right:5px; top:5px;'>
    <div class='toast-header' style='justify-content: space-between; background-color: #FF6B6B; '>
      <strong class='mr-auto text-light'>Error</strong>
      <small class='text-muted'> </small>
      <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close' onclick='cerrar()'>
        <span aria-hidden='true'>x</span>
      </button>
    </div>
    <div class='toast-body'>
      Algo sucedió a la hora de registrar los datos!!
    </div>
  </div>";
  }
}
?>
<div class="card mb-3">
  <h3 class="card-header">Listar Stock</h3>
</div>
<table class="table table-hover container">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Nombre fruta</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio unitario (Bs)</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($conn) {
      $query = "SELECT * FROM stock";
      $res = $conn->query($query);
      $ojo = 1;
      if ($res) {
        foreach ($res as $row) {
          if ($ojo == 1) {
            echo "<tr class='table-light'>";
          } else {
            echo "<tr>";
          }
          echo "<th scope='row'>" . $row["idstock"] . "</th><td>" . $row["nombre"] . "</td><td>" . $row["cantidad"]  . "</td><td>" . $row["preciounitario"] . "</td>"
            . "<td><a class='btn btn-outline-primary btn-sm' href='modificarstock.php?id=" . $row["idstock"] . "'><i class='fa-solid fa-pen-to-square'></i></a>
            <a class='btn btn-outline-danger btn-sm' href='conecciones/stock_ABM.php?baja=" . $row["idstock"] . "'><i class='fa-solid fa-trash-can'></i></a></td>" . "</tr>";
          $ojo *= -1;
        }
      }
      $conn->close();
    } else {
      die("No hay conexión " . mysqli_connect_errno());
    }
    ?>
  </tbody>

</table>

<script>
function cerrar(){
  let cierre=document.getElementById('toaster');
  cierre.style.display='none';
}
</script>
</body>

</html>