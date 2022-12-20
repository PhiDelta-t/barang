<?php
include 'koneksi.php';

$kode_barang = strtoupper($_POST['kode_barang']);
$nama_barang = ucwords($_POST['nama_barang']);
$rak = ($_POST['rak']);

$sql = mysqli_query($koneksi, "INSERT INTO barang(kode_barang, nama_barang, rak) VALUES ('$kode_barang','$nama_barang','$rak')");

if ($sql) {
?>
</script>
<script type="text/javascript">
    alert('Data Berhasil Ditambahkan');
    window.location = "barang.php";
</script>
<?php
} else {
?>
<script type="text/javascript">
    alert('Data Gagal Ditambahkan, Silahkan Ulangi');
    window.location = "tambah_barang.php";
</script>
<?php
}
?>
<script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/js/pages/sweetalert2.js"></script>