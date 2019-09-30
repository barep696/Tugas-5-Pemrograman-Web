<?php 
  include ('conn.php'); 

  $status = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $npm = $_POST['npm'];
      $nama = $_POST['nama'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      
      $query = "INSERT INTO mhs (npm, nama,  jenis_kelamin) VALUES('$npm','$nama','$jenis_kelamin')"; 

      
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      header('Location: index.php?status='.$status);
  }
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css" />
        <title>Input Data Diri</title>
    </head>
    <body>
    <div class="register-form">
        <h1>Isi Biodata</h1>
        <form action="index.php"  method="post">
        <div class="name">
            <label>Nama : </label> 
            <input type="text" name="nama" placeholder="Masukkan Nama">
            <br>
        </div>
        <div class="npm">
            <label>NPM : </label> 
            <input type="text" name="npm" placeholder="Masukkan NPM">
            <br>
        </div>
        <div class="gender">
            <label>Jenis Kelamin : </label> 
            <input type="text" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin">
            <br>
        </div>
        <button type="submit" class="button">Submit Data</button>
        </form>
        <button onclick="location.href='form.php'">List Data</button>
    </div>
    </body>
</html>