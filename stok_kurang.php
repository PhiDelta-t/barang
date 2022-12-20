<?php
include 'koneksi.php';

$kode_barang = strtoupper($_POST['kode_barang']);
$nama_barang = ucwords($_POST['nama_barang']);
$tanggal_keluar = $_POST['tanggal_keluar'];
$stok = $_POST['stok'];
$jumlah = $_POST['jumlah'];
$sisa = $stok - $jumlah;

if ($stok < $jumlah) {
?>
<script type="text/javascript">
    alert('Stok Tidak Cukup');
    window.location = "detail_barang.php?kode_barang=<?php echo $kode_barang; ?>";
</script>
<?php
} else {
    $sql = mysqli_query($koneksi, "INSERT INTO keluar (kode_barang, nama_barang, tanggal_keluar, jumlah) 
        VALUES ('$kode_barang', '$nama_barang', '$tanggal_keluar', '$jumlah')");
    $sql2 = mysqli_query($koneksi, "UPDATE barang SET stok='$sisa' WHERE kode_barang='$kode_barang'");
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
    window.location = "barang_keluar.php?kode_barang=<?php echo $kode_barang; ?>";
</script>
<?php
    }
}
?>