<?php
session_start();
if (!isset($_SESSION['nama_admin'])) {
    header("location:dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Toko Maju Mundur</title>

    <link rel="stylesheet" href="assets/css/main/app.css" />
    <link rel="stylesheet" href="assets/css/main/app-dark.css" />

    <link rel="shortcut icon" href="bootstrap-icons/icons/archive.svg" type="image/x-icon" />

</head>

<body>
    <script src="assets/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <i class="bi bi-archive"></i>
                                <br>
                                <span>Maju Mundur</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item">
                            <a href="dashboard.php" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item active has-sub">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-clipboard-data"></i>
                                <span>Barang</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item active">
                                    <a href="barang.php">Data Barang</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="tambah_barang.php">Tambah Barang</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="profile.php" class="sidebar-link">
                                <i class="bi bi-person"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="logout.php" class="sidebar-link">
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Log out.</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-start">
                            <h3>Data Barang</h3>
                        </div>
                        <div class="col-sm-6 col-12 order-md-1 order-last">
                            <form action="barang.php" method="get">
                                <input type="text" class="form-control" name="cari"
                                    placeholder="Cari Kode atau Nama Barang" value="<?php if(isset($_GET['cari']))?>" />
                            </form>
                            <br>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="row" id="basic-table">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead align="center">
                                            <tr>
                                                <th>KODE BARANG</th>
                                                <th>NAMA BARANG</th>
                                                <th>STOK</th>
                                                <th>DETAIL</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include 'koneksi.php';
                                            if (isset($_GET['cari'])) {
                                                $cari = $_GET['cari'];
                                                $file = "SELECT * FROM barang WHERE kode_barang like '%" . $cari . "%' or nama_barang like '%" . $cari . "%'";
                                            } else {
                                                $file = "SELECT * FROM barang ORDER BY kode_barang ASC";
                                            } 
                                            $result = mysqli_query($koneksi, $file);
                                            if (!$result){
                                                die("Query Error:".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                                            }
                                            while ($data = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tbody align="center">
                                            <tr>
                                                <td>
                                                    <?php echo $data['kode_barang']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['nama_barang']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['stok']; ?>
                                                </td>
                                                <td>
                                                    <a href="detail_barang.php?kode_barang=<?php echo $data['kode_barang']; ?>"
                                                        class="btn icon btn-info">
                                                        <i class="bi bi-info-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php
            include 'foot.php';
            ?>