<?php include 'templates/cabecera.php';
include 'conecciones/conn.php';

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
      Se registro la Venta con éxito!!!
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
              $sql_2 ="SELECT * FROM `stock`"; 
              $res_2=mysqli_query($conn, $sql_2);
              foreach($res_2 as $row_2){
                if($row_2['idstock']==$row['id_fruta']){
                  echo "<td>".$row_2['nombre']."</td>";
                }
              }
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
  <script>
function cerrar(){
  let cierre=document.getElementById('toaster');
  cierre.style.display='none';
}
</script>
</body>
</html>