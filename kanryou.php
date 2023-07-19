<?php
session_start();
require_once 'func/dbinsert.php';

if(empty($_SESSION)) redirect('index.html');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>完了ページ</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap');

    body {
      width: 100%;
      max-width: 1280px;
      margin: auto;
      font-family: 'Noto Sans JP', sans-serif;
      display: flex;
      flex-direction: column;
      height: 100vh;
      justify-content: flex-start;
      align-items: center;
    }

    p {
      font-size: 40px;
      text-align: center;
      margin: 10px 0;
    }

    hr {
      border: none;
      height: 2px;
      background-color: gray;
      width: 100%;
      margin: 10px 0;
    }

    input[type=button] {
      padding: 5px 10px;
      background: #0966de;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      text-align: center;
    }

    input[type=button]:hover {
      opacity: 0.7;
    }
  </style>
</head>

<body>
  <hr>
  <p>お問い合わせありがとうございました。</p>
</body>
</html>
