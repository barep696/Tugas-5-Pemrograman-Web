<?php 

  include ('conn.php'); 

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['npm'])) {
         
          $npm_upd = $_GET['npm'];
          $query = "DELETE FROM mhs WHERE npm = '$npm_upd'"; 
       
          $result = mysqli_query(connection(),$query);
          
          header('Location: index.php');
      }  
  }
?>