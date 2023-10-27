<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Data Mahasiswa</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Tabla Producto</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Incio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah mahasiswa -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- datos de la tabla -->
            <div class="card-body">
                <h3 class="card-title">Esta Es La Tabla Productos</h3>
                <p class="card-text">En esta pagina puedes ingresar los datos de tu tabla. Terminando de llenarla esta se mandara automaticamente 
                    a la base de datos llamada producto.
                    Los campos que contiene son:<BR>
                    -ID.PRODUCTO
                    -NOMBRE
                    -STOCK
                    -DESCRIPCION
                    -CATEGORIA
                    -MARCA
                    -ID.PROVEEDOR
                    -CANTIDAD
                </p>

                <!-- msj de enviado -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Perfecto.!</strong> Datos Enviados!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Error al enviar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="PRODUCTO" required>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" name="stock" class="form-control" placeholder="00" required>
                    </div>

                    <div class="col-md-4">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="AAAAA" required>
                    </div>

                    <div class="col-md-4">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-select" name="categoria" aria-label="Default select example">
                            <option value="Ropa">ROPA</option>
                            <option value="Electronica">ELECTRONICA</option>
                            <option value="Muebles">MUEBLES</option>
                            <option value="Escolar">ESCOLAR</option>
                            <option value="Basicos">BASICOS</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" placeholder="MARCA" required>
                    </div>
                    <div class="col-md-6">
                        <label for="idprov" class="form-label">ID PROVEEDOR</label>
                        <input type="text" name="idprov" class="form-control" placeholder="PROVEEDOR" required>
                    </div>

                    <div class="col-md-6">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" step=0.01 name="cantidad" class=" form-control" placeholder="000" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Enviar Datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Tabla -->
        <h5 class="mb-3">Listado</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Busqueda" aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- msj de eliminacion -->
        <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> 
                        datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Error al eliminar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar un mensaje de edición exitosa -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Actualizado!</strong> Datos actualizados con exito!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Hubo un error al acualizar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>IDproducto</th>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Stock</th>";
            echo "<th scope='col'>Descripcion</th>";
            echo "<th scope='col'>Categoria</th>";
            echo "<th scope='col'>Marca</th>";
            echo "<th scope='col'>IDproveedor</th>";
            echo "<th scope='col'>Cantidad</th>";
            echo "<th scope='col' class='text-center'></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM mahasiswa");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM mahasiswa LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM mahasiswa";
            // $query = mysqli_query($db, $sql);




            while ($mahasiswa = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $mahasiswa['idpro'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $mahasiswa['nombre'] . "</td>";
                echo "<td>" . $mahasiswa['stock'] . "</td>";
                echo "<td>" . $mahasiswa['descripcion'] . "</td>";
                echo "<td>" . $mahasiswa['categoria'] . "</td>";
                echo "<td>" . $mahasiswa['marca'] . "</td>";
                echo "<td>" . $mahasiswa['idprov'] . "</td>";
                echo "<td>" . $mahasiswa['cantidad'] . "</td>";
                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // boton borrar
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>Aun no se han ingresado datos</p>";
            } else {
                echo "<p>Total $jumlah_data datos</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modulo Editar-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar informacion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM mahasiswa";
                    $query = mysqli_query($db, $sql);
                    $mahasiswa = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_idpro' id='edit_idpro'>

                            <div class="col-12 mb-3">
                                <label for="edit_nombre" class="form-label">Nombre</label>
                                <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="AAAAAAA" >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_stock" class="form-label">Stock</label>
                                <input type="text" name="edit_stock" id="edit_stock" class="form-control" placeholder="0000" >
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_descripcion" class="form-label">Descripcion</label>
                                <input type="text" name="edit_descripcion" id="edit_descripcion" class="form-control" placeholder="AAAAAAA" >
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_categoria" class="form-label">Categoria</label>
                                <select class="form-select" name="edit_categoria" id="edit_categoria" aria-label="Default select example">
                                <option value="Ropa">ROPA</option>
                                <option value="Electronica">ELECTRONICA</option>
                                <option value="Muebles">MUEBLES</option>
                                <option value="Escolar">ESCOLAR</option>
                                <option value="Basicos">BASICOS</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                            <label for="edit_marca" class="form-label"> Marca</label>
                                <input type="text" name="edit_marca" class="form-control" id="edit_marca" placeholder="AAAAA" >
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_idprov" class="form-label">ID Proveedor</label>
                                <input type="number" step=0.01 name="edit_idprov" id="edit_idprov" class=" form-control" placeholder="0000" >
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_cantidad" class="form-label">Cantidad</label>
                                <input type="number" step=0.01 name="edit_cantidad" id="edit_cantidad" class=" form-control" placeholder="0000" >
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Actualizar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Eliminar-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmar</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Limpiar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_idpro').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_nombre').val(data[2]);
                $('#edit_stock').val(data[3]);
                $('#edit_descripcion').val(data[4]);
                // cambio de categoria
                $('#edit_categoria').val(data[6]);
                $('#edit_marca').val(data[7]);
                $('#edit_idprov').val(data[8]);
                $('#edit_cantidad').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>