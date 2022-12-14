<?php
include '../function/config.php';
include '../function/function.php';
$page = "book";
// back-end keamanan akses tampilan dieo
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['nis'])) {
    header('location: ../siswa/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Data Buku</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/7b36e01bb8.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Front End & Back End Gita Kartika Pariwara -->
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php include("topbar.php") ?>

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Data Buku</h1>

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Buku Perpus</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id_buku'])) {
                                $id_buku = $_GET["id_buku"];
                                $edit = edit("buku", "id_buku", "$id_buku");
                                $data = mysqli_fetch_assoc($edit);
                            }
                            ?>
                            <form action="update_buku.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Buku</label>
                                    <input type="text" class="form-control" name="id_buku" value="<?php echo $data['id_buku'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" id="" value="<?php echo $data['penulis'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" name="tahun" id="" value="<?php echo $data['tahun'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="" value="<?php echo $data['judul'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kota</label>
                                    <input type="text" class="form-control" name="kota" id="" value="<?php echo $data['kota'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" id="" value="<?php echo $data['penerbit'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cover</label> <br>
                                    <img class="img-thumbnail" src="../foto/<?= $data['cover'] ?>" alt="foto" style="width:170px">
                                    <input type="file" class="form-control" name="cover">
                                    <input type="hidden" class="form-control" name="cover_old" value="<?php echo $data['cover'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Sinopsis</label>
                                    <input type="text" class="form-control" name="sinopsis" id="" value="<?php echo $data['sinopsis'] ?>">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Stok</label>
                                    <input type="number" class="form-control" name="stok" id="" value="<?php echo $data['stok'] ?>">
                                </div>

                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                            </form>


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <?php include("footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   
    <!-- Gita -->


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>