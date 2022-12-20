<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' and password = '$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_array($sql);
    session_start();
    $_SESSION['nama_admin'] = $data['nama_admin'];
    $_SESSION['id_admin'] = $data['id_admin'];
    header('location:dashboard.php');
} else {
?>
<script type="text/javascript">
    alert('Username atau Password Tidak Ditemukan.')
    window.location = 'index.php';
</script>
<?php
}
?>