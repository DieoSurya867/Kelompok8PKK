<?php
include '../function/config.php';
include '../function/function.php';
$page = "nyeleh";

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

    <title>Tambah Peminjaman</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Peminjaman</h1>

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Anggota</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID Peminjaman</label>
                                    <input type="text" class="form-control" name="id_peminjaman" id="" placeholder="Masukkan ID Peminjaman">
                                </div>

                                <div class="mb-3">

                                    <label for="pilihkelas">Siswa</label>

                                    <select class="form-control" name="siswa">
                                        <option value="">--Pilih Siswa--</option>
                                        <?php
                                        $get_data = read('siswa', 'nis');
                                        while ($data = mysqli_fetch_array($get_data)) {
                                        ?>
                                            <option value="<?php echo $data['nis']; ?>">
                                                <?php echo $data['nama']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">

                                    <label for="pilihkelas">Petugas</label>

                                    <select class="form-control" name="petugas">
                                        <option value="">--Pilih Petugas--</option>
                                        <?php
                                        $get_data = read('petugas', 'nip');
                                        while ($data = mysqli_fetch_array($get_data)) {
                                        ?>
                                            <option value="<?php echo $data['nip']; ?>">
                                                <?php echo $data['nama']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman" id="" placeholder="Masukkan Tanggal Peminjaman">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian" id="" placeholder="Masukkan Tanggal Pengembalian">

                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>


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

  

    <!-- Gita -->

    <?php
    if (isset($_POST['submit'])) {
        $id_peminjaman = $_POST['id_peminjaman'];
        $siswa = $_POST['siswa'];
        $petugas = $_POST['petugas'];
        $tglpeminjaman = $_POST['tanggal_peminjaman'];
        $tglpengembalian = $_POST['tanggal_pengembalian'];

        //var_dump($petugas); die;
        $add = create("peminjaman", "id_peminjaman, id_siswa, id_petugas, tanggal_peminjaman, tanggal_pengembalian", "'$id_peminjaman','$siswa','$petugas', '$tglpeminjaman', '$tglpengembalian'");

        if ($add) {
            echo "<div class='alert alert-info'>Data berhasil ditambahkan</div>";
            echo "<script>window.location.href='pinjam.php'</script>";
        } else {
            echo "<div class='alert alert-danger'>Data gagal ditambahkan</div>";
        }
    } ?>

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