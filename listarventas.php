<?php include 'templates/cabecera.php';
include 'conecciones/conn.php';?>

<div class="card mb-3">
          <h3 class="card-header">Listar Stock</h3>
  </div>
  <table class="table table-hover container">
    <thead>
      <tr>
        <th scope="col">Nro</th>
        <th scope="col">Nombre cliente</th>
        <th scope="col">Nombre fruta</th>
        <th scope="col">Cantidad vendida</th>
        <th scope="col">Precio a pagar</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT * FROM `ventas`";
        $res=mysqli_query($conn, $sql);
        if($res){
          $aux=1;
          foreach($res as $row){
            if(($aux&1)==0){
              echo "<tr class='table-light'>";
            }else{
              echo "<tr>";
            }
              echo "<th scope='row'>".$row['id']."</th>";
              echo "<td>".$row['cliente']."</td>";
              echo "<td>".$row['fruta']."</td>";
              echo "<td>".$row['cantidad']."</td>";
              echo "<td>".$row['total']."</td>";
              echo "<td><a class='btn btn-outline-primary btn-sm' href='modificarventa.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen-to-square'></i></a>
              <a class='btn btn-outline-danger btn-sm' href='conecciones/venta_ABM.php?baja=".$row["id"]."'><i class='fa-solid fa-trash-can'></i></a></td>";
              echo "</tr>";
            $aux++;
          }
        }else{
          echo "Error de conexión: ".mysqli_connect_errno();
        }
      ?>
    </tbody>
  </table>

</body>
</html>