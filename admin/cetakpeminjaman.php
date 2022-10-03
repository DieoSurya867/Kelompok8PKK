<?php
include '../function/config.php';
include '../function/function.php';

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

    <title>Detail Peminjaman</title>

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
                    <!-- <h1 class="h4 mb-2 text-gray-800">Detail Peminjaman</h1> -->

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Peminjaman Buku</h6>
                        </div>
                        <div class="card-body">
                            <!-- Gita kartika -->
                            <?php
                            $get_data = mysqli_query($db, "SELECT *, detail_peminjaman.id_detail_peminjaman,  siswa.nama as nama_siswa, kelas.nama_kelas, petugas.nama as nama_petugas, buku.cover, buku.judul, kuantitas, tanggal_peminjaman, tanggal_pengembalian from detail_peminjaman, peminjaman, siswa, petugas, buku, kelas where detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman and peminjaman.id_siswa = siswa.nis and siswa.id_kelas = kelas.id_kelas and peminjaman.id_petugas = petugas.nip and detail_peminjaman.id_buku = buku.id_buku order by id_detail_peminjaman desc ");
                            $data=mysqli_fetch_array($get_data);

                            ?>
                             
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">ID : </h5>
                                </div>
                             
                                <div class="col">
                                    <?= $data['id_detail_peminjaman'] ?>
                                </div>
                             
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">NIS : </h5>
                                </div>
                                
                                <div class="col">
                                    <?= $data['nis'] ?>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Nama Siswa : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['nama_siswa'] ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Kelas : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['nama_kelas'] ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Nama Petugas : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['nama_petugas'] ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Cover : </h5>
                                </div>
                                <div class="col">
                                <img class="img-thumbnail" src="../foto/<?= $data['cover'] ?>" alt="foto" style="width:180px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Judul : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['judul'] ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Jumlah : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['kuantitas'] ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Tanggal Peminjaman : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['tanggal_peminjaman'] ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <h5 class="h5 mb-2 text-gray-800">Tanggal Pengembalian : </h5>
                                </div>
                                <div class="col">
                                    <?= $data['tanggal_pengembalian'] ?>

                                </div>
                            </div> <br>
                            <a href="cetak.php" class="btn btn-primary">Cetak</a>
                        </div>
                       
                    </div>
                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php include("footer.php") ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Link Icon Ionic-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>