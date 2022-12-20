<?php
include 'koneksi.php';

$kode_barang = strtoupper($_POST['kode_barang']);
$nama_barang = ucwords($_POST['nama_barang']);
$tanggal_masuk = $_POST['tanggal_masuk'];
$stok = $_POST['stok'];
$jumlah = $_POST['jumlah'];
$jumlah_barang = $stok + $jumlah;

$sql = mysqli_query($koneksi, "UPDATE barang SET stok='$jumlah_barang' WHERE kode_barang='$kode_barang'");
$sql2 = mysqli_query($koneksi, "INSERT INTO masuk (kode_barang, nama_barang, tanggal_masuk, jumlah) VALUES ('$kode_barang','$nama_barang','$tanggal_masuk','$jumlah')");

if ($sql && $sql2) {
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
    window.location = "barang_masuk.php?kode_barang=<?php echo $kode_barang; ?>";
</script>
<?php
}
?>