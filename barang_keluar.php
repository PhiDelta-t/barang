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
                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-clipboard-data"></i>
                                <span>Barang</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
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
            <?php
            include 'koneksi.php';
            $kode_barang = $_GET['kode_barang'];
            $sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang='$kode_barang'");
            if ($data = mysqli_fetch_array($sql)) {
            ?>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Barang Keluar</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="barang.php">Barang</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="detail_barang.php?kode_barang=<?php echo $data['kode_barang']; ?>">
                                            Detail Barang
                                        </a>
                                    </li>
                                    <li class=" breadcrumb-item active" aria-current="page">
                                        Barang Masuk
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="stok_kurang.php" method="POST" class="form">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kode_barang">Kode Barang</label>
                                                        <input type="text" class="form-control" name="kode_barang"
                                                            value="<?php echo $data['kode_barang']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nama_barang">Nama Barang</label>
                                                        <input type="text" class=" form-control" name="nama_barang"
                                                            value="<?php echo $data['nama_barang']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="stok">Stok</label>
                                                        <input type="number" class="form-control" name="stok"
                                                            value="<?php echo $data['stok']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="tanggal_keluar">Tanggal</label>
                                                        <input type="date" class=" form-control" name="tanggal_keluar"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah Keluar</label>
                                                        <input type="number" class="form-control" name="jumlah"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1"
                                                        name="submit">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                                                <th>JUMLAH</th>
                                                <th>TANGGAL KELUAR</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        include 'koneksi.php';
                                        $kode_barang = $_GET['kode_barang'];
                                        $sql = mysqli_query($koneksi, "SELECT * FROM keluar WHERE kode_barang='$kode_barang'");

                                        while ($data = mysqli_fetch_assoc($sql)) {
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
                                                    <?php echo $data['jumlah']; ?>
                                                </td>
                                                <td>
                                                    <?php $time = $data['tanggal_keluar'];
                                            echo date("d-M-Y", strtotime($time)) ?>
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
        </div>
    </div>
    <?php
    include 'foot.php';
    ?>