<?php
include('conn.php'); 
$status = '';
$result = '';
$npm = "";
$nama = "";
$jenis_kelamin = "";
$alamat = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['npm'])) {
        //query SQL
        $npm_upd = $_GET['npm'];
        $query = "SELECT * FROM mhs WHERE npm = '$npm_upd'"; 

        $result = mysqli_query(connection(),$query);
        $data = mysqli_fetch_array($result);
        $npm = $data['npm'];
        $nama = $data['nama'];
        $jenis_kelamin = $data['jenis_kelamin'];
    }  
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $sql = "UPDATE mhs SET nama='$nama', jenis_kelamin='$jenis_kelamin' WHERE npm='$npm'";
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }
    header('Location: index.php?status='.$status);
}
?>

<?php 
    if ($status=='ok') {
    echo '<br><br><div class="alert alert-success" role="alert">Berhasil Disimpan</div>';
    }
    elseif($status=='err'){
    echo '<br><br><div class="alert alert-danger" role="alert">Gagal</div>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css" />
        <title>Edit Data Diri</title>
    </head>
<body>
    <div class="register-form">
        <h1>Edit Biodata</h1>
          <form action="edit.php" method="POST">
            <div class="npm">
            <label>NPM : </label> 
            <input type="text" name="npm" placeholder="Masukkan NPM Anda" value="<?php echo $npm;  ?>" 
            <br>
            </div>
            <div class="name">
            <label>Nama : </label> 
            <input type="text" name="nama" placeholder="Masukkan Nama Anda" value="<?php echo $nama;  ?>" 
            <br>
            </div>
            <div class="gender">
            <label>Jenis Kelamin : </label> 
            <input type="text" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" value="<?php echo $jenis_kelamin;  ?>">
            <br>
            </div>
            <button type="submit" class="button">Simpan</button>
          </form>
    </div>
</body>
</html>