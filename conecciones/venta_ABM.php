<?php
    include "conn.php";
    if(isset($_POST['venta'])){
        $nombre=$_POST['fruta'];
        $cliente=$_POST['nombre_cliente'];
        $cantidad=$_POST['cantidad'];
        $sql="SELECT * FROM `stock` WHERE nombre='$nombre'";
        $res=mysqli_query($conn, $sql);
        $res=mysqli_fetch_assoc($res);
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
    if(isset($_POST['modificar'])){
        $id=$_POST['id'];
        $cliente=$_POST['nombrecliente'];
        $fruta=$_POST['fruta'];
        $cantidad=$_POST['cantidad'];
        $req="SELECT preciounitario FROM `stock` WHERE nombre='$fruta'";
        $req=mysqli_query($conn, $req);
        $req=mysqli_fetch_array($req);
        $total=$req['preciounitario']*$cantidad;
        $sql="UPDATE `ventas` SET cliente='$cliente', fruta='$fruta', cantidad='$cantidad', total='$total' WHERE id='$id'";
        $res=mysqli_query($conn, $sql);
        
        if(!$res){
            die("Error de conexion: ".mysqli_connect_errno());
        }else{
            header("Location: ../listarventas.php");
        }   
    }
    
    

    $conn->close();
?>