<?php 
session_start();
session_destroy();
echo "<script>alert('Ha salido correctamente!');
  window.location.href= 'login.php';
   </script>";

?>