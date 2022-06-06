<?php
    $servidor="127.0.0.1";
    $user="root";
    $password="";
    $BD="frutas";
    $conn=mysqli_connect($servidor, $user, $password, $BD);
    if($conn){
        echo "Conexión exitosa!<br>";
    }else{
        die("No hay conexión ".mysqli_connect_errno());
    }
    $query="SELECT idstock as id, nombre, cantidad as ct, preciounitario as p FROM stock";
    $res=$conn->query($query);

    if($res){
        if($res->num_rows>0){
            echo "idstock\tnombre\tcantidad\tprecio_unitario <br>";
            while($row=$res->fetch_assoc()){
                echo $row["id"]."\t".$row["nombre"]."\t".$row["ct"]."\t".$row["p"]."<br>";
            }
    }
    }else{

    }

    $conn->close();

?>