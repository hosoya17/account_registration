<?php
define('DSN', 'mysql:host=localhost:3306;dbname=inquiryForm;charset=utf8mb4');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
require_once 'functions.php';

try{
  $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
  errlog($e, __FILE__);
  echo '接続に失敗しました。時間をおいて再度お試しください。';
  exit;
}
?>
