<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil id dari query string
    $idpro = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM mahasiswa WHERE idpro = '$idpro'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./index.php?status=Eliminacion con Exito!');
    } else
        die('Location: ./index.php?status=Error');
} else
    die("Eliminar");
