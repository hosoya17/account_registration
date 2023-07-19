<?php
session_start();
require_once 'func/functions.php';

if (empty($_POST))
  redirect($path);

$firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES, 'UTF8', false);
$givenName = htmlspecialchars($_POST['givenName'], ENT_QUOTES, 'UTF8', false);
$firstNameKana = htmlspecialchars($_POST['firstNameKana'], ENT_QUOTES, 'UTF8', false);
$givenNameKana = htmlspecialchars($_POST['givenNameKana'], ENT_QUOTES, 'UTF8', false);
$age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$month = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT);
$date = filter_input(INPUT_POST, 'date', FILTER_VALIDATE_INT);
$gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF8', false);
$telNum1 = htmlspecialchars($_POST['telNum1'], ENT_QUOTES, 'UTF8', false);
$telNum2 = htmlspecialchars($_POST['telNum2'], ENT_QUOTES, 'UTF8', false);
$telNum3 = htmlspecialchars($_POST['telNum3'], ENT_QUOTES, 'UTF8', false);
$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
$pass = $_POST['pass'];
$zip1 = htmlspecialchars($_POST['zip1'], ENT_QUOTES, 'UTF8', false);
$zip2 = htmlspecialchars($_POST['zip2'], ENT_QUOTES, 'UTF8', false);
$prefectures = htmlspecialchars($_POST['prefectures'], ENT_QUOTES, 'UTF8', false);
$city = htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF8', false);
$address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF8', false);
$errors = [];

if (!$firstName or !$givenName)
  $errors['name'] = 'お名前を入力してください。';
if (!$firstNameKana or !$givenNameKana)
  $errors['nameKana'] = 'ふりがなを入力してください。';
if (!$age)
  $errors['age'] = '年齢を入力してください。';
if (!$year or !$month or !$date)
  $errors['birth'] = '生年月日を入力してください。';
if (!$gender)
  $errors['gender'] = '性別を選択してください。';
if (!$telNum1 or !$telNum2 or !$telNum3)
  $errors['telNum'] = '電話番号を入力してください。';
if (!$mail)
  $errors['mail'] = '正しい形式でメールアドレスを入力してください。';
if (!$pass)
  $errors['pass'] = 'パスワードを入力してください。';
if (!$zip1 or !$zip2)
  $errors['zip'] = '郵便番号を入力してください。';
if (!$prefectures)
  $errors['prefectures'] = '都道府県を入力してください。';
if (!$city)
  $errors['city'] = '市区町村を入力してください。';
if (!$address)
  $errors['address'] = '番地を入力してください。';

$_SESSION['firstName'] = $firstName;
$_SESSION['givenName'] = $givenName;
$_SESSION['firstNameKana'] = $firstNameKana;
$_SESSION['givenNameKana'] = $givenNameKana;
$_SESSION['age'] = $age;
$_SESSION['year'] = $year;
$_SESSION['month'] = $month;
$_SESSION['date'] = $date;
$_SESSION['gender'] = $gender;
$_SESSION['telNum1'] = $telNum1;
$_SESSION['telNum2'] = $telNum2;
$_SESSION['telNum3'] = $telNum3;
$_SESSION['mail'] = $mail;
$_SESSION['pass'] = $pass;
$_SESSION['zip1'] = $zip1;
$_SESSION['zip2'] = $zip2;
$_SESSION['prefectures'] = $prefectures;
$_SESSION['city'] = $city;
$_SESSION['address'] = $address;

if (!empty($errors)) {
  session_start();
  $_SESSION['errors'] = $errors;
  header('Location: index.php');
  exit;
}

$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kakunin.css">
  <title>確認画面</title>
</head>

<body>
  <h1>確認画面</h1>
  <form action="kanryou.php" method="post">
    <table>
      <tbody>
        <tr>
          <th>お名前</th>
          <td class="name">
            <?= "{$firstName}{$givenName}" ?>
          </td>
        </tr>
        <tr>
          <th>ふりがな</th>
          <td class="nameKana">
            <?= "{$firstNameKana}{$givenNameKana}" ?>
          </td>
        </tr>
        <tr>
          <th>年齢</th>
          <td class="age2">
            <?= $age ?>
          </td>
        </tr>
        <tr>
          <th>生年月日</th>
          <td class="birth">
            <?= "西暦{$year}年{$month}月{$date}日" ?>
          </td>
        </tr>
        <tr>
          <th>性別</th>
          <td class="genderText">
            <?= $gender ?>
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td class="telNumText">
            <?= "{$telNum1}ー{$telNum2}ー{$telNum3}" ?>
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td class="mailText">
            <?= $mail ?>
          </td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td class="pass">●●●●●●●●●●</td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td class="zipText">
            <?= "{$zip1}ー{$zip2}" ?>
          </td>
        </tr>
        <tr>
          <th>都道府県</th>
          <td class="prefText">
            <?= $prefectures ?>
          </td>
        </tr>
        <tr>
          <th>市区町村(町名まで)</th>
          <td class="cityText">
            <?= $city ?>
          </td>
        </tr>
        <tr>
          <th>番地</th>
          <td class="addText">
            <?= $address ?>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  <p></p>
  <input type="button" value="入力画面に戻る" class="back" onclick="location.href='./'">
  <input type="submit" value="送信" class="req"><br>

</body>

</html>
