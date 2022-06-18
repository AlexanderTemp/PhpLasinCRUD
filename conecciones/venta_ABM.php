<?php
    include "conn.php";
    if(isset($_POST['venta'])){
        $nombre=$_POST['fruta'];
        $cliente=$_POST['nombre_cliente'];
        $cantidad=$_POST['cantidad'];
        $sql="SELECT * FROM `stock` WHERE nombre='$nombre'";
        $res=mysqli_query($conn, $sql);
        $res_2=mysqli_query($conn, $sql);
        $res=mysqli_fetch_assoc($res);
        if(!$res){
            die("Error de conexión: ".mysqli_connect_errno());
        }else{
            $total=$cantidad*$res['preciounitario'];
            $nuevo_stock=$res['cantidad']-$cantidad;
            if($nuevo_stock<0){
                header("Location: ../listarventas.php?status=error");
            }else{
            $id=$res['idstock'];
            $id_foranea=0;
            foreach($res_2 as $row){
                if($row['nombre']==$nombre){
                    $id_foranea=$row['idstock'];
                }
            }
            $req="UPDATE `stock` SET cantidad = '$nuevo_stock' WHERE idstock = '$id';";
            $res=mysqli_query($conn, $req);
            $sql="INSERT INTO `ventas` (cliente, id_fruta, cantidad, total) VALUES('$cliente', '$id_foranea', '$cantidad', '$total')";
            $res=mysqli_query($conn, $sql);
        }
            if($res){
                header("Location: ../listarventas.php?status=success");
            }else{
                header("Location: ../listarventas.php?status=error");
            }
        }
    }
    if(isset($_GET['baja'])){
        $id=$_GET['baja'];
        $sql_2="SELECT * FROM `ventas` WHERE id='$id'";
        $res_2=mysqli_query($conn, $sql_2);
        $res_2=mysqli_fetch_assoc($res_2);
        $id_fruta=$res_2['id_fruta'];
        $cantidad=$res_2['cantidad'];

        $sql_rep="SELECT * FROM `stock` WHERE idstock='$id_fruta'";
        $res_rep=mysqli_query($conn, $sql_rep);
        $res_rep=mysqli_fetch_assoc($res_rep);
        $total_cantidad=$res_rep['cantidad'];
        $restaura=$total_cantidad+$cantidad;

        $sql_u="UPDATE `stock` SET cantidad='$restaura' WHERE idstock='$id_fruta'";
        $ejecutar=mysqli_query($conn, $sql_u);
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

        $sql_2="SELECT * FROM `stock`";
        $res_2=mysqli_query($conn, $sql_2);
        $id_fruta=0;
        foreach($res_2 as $row_2){
            if($row_2['nombre']==$fruta){
                $id_fruta=$row_2['idstock'];
            }
        }

        $sql="UPDATE `ventas` SET cliente='$cliente', id_fruta='$id_fruta', cantidad='$cantidad', total='$total' WHERE id='$id'";
        $res=mysqli_query($conn, $sql);
        
        if(!$res){
            die("Error de conexion: ".mysqli_connect_errno());
        }else{
            header("Location: ../listarventas.php");
        }   
    }
    
    

    $conn->close();
