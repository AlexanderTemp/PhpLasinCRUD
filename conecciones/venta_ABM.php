<?php
    include "conn.php";
    if(isset($_POST['venta'])){
        $nombre=$_POST['fruta'];
        $cliente=$_POST['nombre_cliente'];
        $cantidad=$_POST['cantidad'];
        
        $sql="SELECT * FROM `stock` WHERE nombre='$nombre'";
        $res=mysqli_query($conn, $sql);
        if(!$res){
            die("Error de conexión: ".mysqli_connect_errno());
        }else{
            $total=$cantidad*$res['preciounitario'];
            $nuevo_stock=$res['cantidad']-$cantidad;
            $id=$res['idstock'];
            $req="UPDATE `stock` SET cantidad = '$nuevo_stock' WHERE idstock = '$id';";
            $res=mysqli_query($conn, $req);
            $sql="INSERT INTO `ventas` (cliente, fruta, cantidad, total) VALUES('$cliente', '$nombre', '$cantidad', '$total')";
            $res=mysqli_query($conn, $sql);
            if($res){
                header("Location: ../listarventas.php");
            }else{
                die("Error de conexión: ".mysqli_connect_errno());
            }
        }
    }
    if(isset($_GET['baja'])){
        $id=$_GET['baja'];
        $sql="DELETE FROM `ventas` WHERE id='$id'";
        $res=mysqli_query($conn, $sql);
        if(!$res){
            die("No hay conexión: ".mysqli_connect_errno());
        }else{
            header("Location: ../listarventas.php");
        }
    }
    

    $conn->close();
?>