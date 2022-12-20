<?php
include 'koneksi.php';

$kode_barang = strtoupper($_POST['kode_barang']);
$nama_barang = ucwords($_POST['nama_barang']);
$stok = $_POST['stok'];
$rak = ($_POST['rak']);

$sql = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', stok='$stok', rak='$rak' WHERE kode_barang='$kode_barang'");

if ($sql) {
?>
<script type="text/javascript">
    alert('Data Berhasil Ditambahkan');
    window.location = "detail_barang.php?kode_barang=<?php echo $kode_barang; ?>";
</script>
<?php
} else {
?>
<script type="text/javascript">
    alert('Data Gagal Ditambahkan, Silahkan Ulangi');
    window.location = "edit_barang.php?kode_barang=<?php echo $kode_barang; ?>";
</script>
<?php
}
?>