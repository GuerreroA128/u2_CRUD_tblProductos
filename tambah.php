<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $idpro = $_POST['idpro'];
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $idprov = $_POST['idprov'];
    $cantidad = $_POST['cantidad'];
    // query
    $sql = "INSERT INTO mahasiswa(idpro, nombre, stock, descripcion, categoria, marca,idprov,cantidad)
    VALUES('$idpro', '$nombre', '$stock', '$descripcion', '$categoria', '$marca', '$idprov','$cantidad')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Akses dilarang...");
