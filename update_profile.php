<?php
include 'koneksi.php';

$id_admin = strtoupper($_POST['id_admin']);
$username = $_POST['username'];
$nama_admin = ucwords($_POST['nama_admin']);
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = ucwords($_POST['alamat']);

$sql = mysqli_query($koneksi, "UPDATE admin SET username='$username', nama_admin='$nama_admin', no_hp='$no_hp', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id_admin='$id_admin'");

if ($sql) {
?>
<script type="text/javascript">
    alert('Data Berhasil Ditambahkan');
    window.location = "profile.php";
</script>
<?php
} else {
?>
<script type="text/javascript">
    alert('Data Gagal Ditambahkan, Silahkan Ulangi');
    window.location = "profile.php";
</script>
<?php
}
?>