<?php
include 'templates/cabecera.php';
include "conecciones/conn.php"; ?>
<div class="card mb-3">
  <h3 class="card-header">Listar Stock</h3>
</div>
<table class="table table-hover container">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Nombre fruta</th>
      <th scope="col">Cantidad</th>
      <th scope="col" style="width: 7rem;">Precio unitario (Bs)</th>
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
            <a class='btn btn-outline-danger btn-sm' href='conecciones/stock_ABM.php?baja=".$row["idstock"]."'><i class='fa-solid fa-trash-can'></i></a></td>"."</tr>";
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
<script src="./js/bootstrap.bundle.js"></script>
</body>

</html>