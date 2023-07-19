<?php
function errlog($e, $file): void
{
  error_log('PDO connection failed:' . $e->getMessage() . ':' . basename($file) . "\n", 3, 'error.log');
}

function redirect($path): void
{
  $url = $_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/'.$path;
  header('Location:http://'.$url);
  exit;
}

function sessdel() :void{
  $_SESSION = null;
  setcookie(session_name(), '', time()-1, '/');
  session_destroy();
}
?>
