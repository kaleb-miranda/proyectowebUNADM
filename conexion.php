<?php   

$dsn = 'mysql:host=localhost;dbname=actividad2';
$username = 'root';
$password = '';
$options = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
try {
  $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  die("Error: conexión fallida. " . $e->getMessage());
}

return $db;
?>