<?php
include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/form.css" />         
        <title>List Data Diri</title>
    </head>
    <body>  
    <div class="tabel">
    </div>
    <div class="tabel">
    <table>
            <tr>
                <th>NAMA</th>
                <th>NPM</th>                
                <th>JENIS KELAMIN</th>
            </tr>
            <tbody>
            <?php 
                  $query = "SELECT * FROM mhs";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['npm'];  ?></td>
                    <td><?php echo $data['jenis_kelamin'];  ?></td>
                    <td><a href="<?php echo "edit.php?npm=".$data['npm']; ?>">Update</a>&nbsp;&nbsp;</td>
                    <td><a href="<?php echo "delete.php?npm=".$data['npm']; ?>"> Delete</a></td>
                  </tr>
                 <?php endwhile ?>
            </tbody>
    </table>
    </div>
    </body>
</html>