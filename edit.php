<?php
include("./config.php");

// conexion a bd
   if (isset($_POST['edit_data'])) {
        // ambil data dari form
        $idpro = $_POST['edit_idpro'];
        $nombre = $_POST['edit_nombre'];
        $stock = $_POST['edit_stock'];
        $descripcion = $_POST['edit_descripcion'];
        $categoria = $_POST['edit_categoria'];
        $marca = $_POST['edit_marca'];
        $idprov = $_POST['edit_idprov'];
        $cantidad = $_POST['edit_cantidad'];
    
    // query
    $sql = "UPDATE mahasiswa SET
    nombre='$nombre',
    stock='$stock',
    descripcion='$descripcion',
    categoria='$categoria', 
    marca='$marca', 
    idprov='$idprov', 
    cantidad='$cantidad'
      WHERE idpro = '$idpro'";
    $query = mysqli_query($db, $sql);

    //¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?update=exito');
    else
        header('Location: ./index.php?update=fallo');
} else
    die("error");
