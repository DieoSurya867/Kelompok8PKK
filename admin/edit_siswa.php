<?php
include '../function/config.php';
include '../function/function.php';
$page = "murid";
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

    <title>Edit Data Siswa</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Edit Data Siswa</h1>

                    <!-- Gita -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Siswa</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['nis'])) {
                                $nis = $_GET["nis"];
                                $edit = edit_join("siswa, kelas", "siswa.id_kelas = kelas.id_kelas", "nis", "$nis");
                                $data = mysqli_fetch_assoc($edit);
                            }


                            // Proses update data siswa // Gita Kartika
                            if (isset($_POST['update'])) {
                                $nis = ($_POST["nis"]);
                                $nama = $_POST['nama'];
                                $jeniskelamin = $_POST['jeniskelamin'];
                                $alamat = $_POST['alamat'];
                                $kelas = $_POST['kelas'];

                                $value = "nama='$nama',jenis_kelamin='$jeniskelamin',alamat='$alamat',id_kelas='$kelas'";
                                $cekquery = update("siswa", $value, "nis", $nis);
                                //var_dump($value); die;

                                if ($cekquery) {
                                    echo "<div class='alert alert-info'> Data berhasil diupdate.</div>";
                                    echo "<script>window.location.href='datasiswa.php'</script>";
                                } else {
                                    echo "<div class='alert alert-danger'>Data gagal diupdate</div>";
                                }
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="" class="form-label">NIS</label>
                                    <input type="text" class="form-control" name="nis" value="<?php echo $data['nis'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="" value="<?php echo $data['nama'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis Kelamin</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio1" value="L" <?php echo ($data['jenis_kelamin'] == "L") ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="inlineRadio1">Laki - laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="inlineRadio2" value="P" <?php echo ($data['jenis_kelamin'] == "P") ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="" value="<?php echo $data['alamat'] ?>">
                                </div>
                                <div class="mb-3">

                                    <label for="pilihkelas">Kelas</label>
                                    <select class="form-control" name="kelas">
                                        <?php
                                        echo "<option value =$data[id_kelas]>$data[nama_kelas]</option>";
                                        $get_data = read('kelas', 'id_kelas');
                                        while ($data = mysqli_fetch_array($get_data)) {
                                        ?>
                                            <option value="<?php echo $data['id_kelas']; ?>">
                                                <?php echo $data['nama_kelas']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>


                                </div>

                                <button type="submit" class="btn btn-primary" name="update">Simpan</button>
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