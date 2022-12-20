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
                        <li class="sidebar-item active">
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
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Profile</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="profile.php">Profile</a>
                                    </li>
                                    <li class=" breadcrumb-item active" aria-current="page">
                                        Ubah Profile
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
                                        <?php
                                        include 'koneksi.php';
                                        $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin");
                                        if ($data = mysqli_fetch_array($sql)) {
                                        ?>
                                        <form action="update_profile.php" method="POST" class="form">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="id_admin">ID</label>
                                                        <input type="text" class="form-control" name="id_admin"
                                                            value="<?php echo $data['id_admin']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" class=" form-control" name="username"
                                                            value="<?php echo $data['username']; ?>" require />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="nama_admin">Nama Admin</label>
                                                        <input type="text" class=" form-control" name="nama_admin"
                                                            value="<?php echo $data['nama_admin']; ?>" require />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="no_hp">No. Hp</label>
                                                        <input type="number" class="form-control" name="no_hp"
                                                            value="<?php echo $data['no_hp']; ?>" require />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                                        <select class="form-select form-select"
                                                            aria-label=".form-select-sm example" name="jenis_kelamin"
                                                            rows="4">
                                                            <option selected>
                                                                <?php echo $data['jenis_kelamin']; ?>
                                                            </option>
                                                            <option value="-">-</option>
                                                            <option value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" class="form-control" name="alamat"
                                                            value="<?php echo $data['alamat']; ?>" require />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">
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
            </div>
            <?php
            include 'foot.php';
            ?>