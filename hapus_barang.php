<?php
include 'koneksi.php';

$kode_barang = $_GET['kode_barang'];

$sql = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang = '$kode_barang'");
if ($sql) {
?>
<script type="text/javascript">
    window.location = "barang.php";
</script>
<?php
}
?>