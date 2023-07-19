<?php
session_start();
require_once 'func/dbconnect.php';

$firstName = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '';
$givenName = isset($_SESSION['givenName']) ? $_SESSION['givenName'] : '';
$firstNameKana = isset($_SESSION['firstNameKana']) ? $_SESSION['firstNameKana'] : '';
$givenNameKana = isset($_SESSION['givenNameKana']) ? $_SESSION['givenNameKana'] : '';
$age = isset($_SESSION['age']) ? $_SESSION['age'] : '';
$year = isset($_SESSION['year']) ? $_SESSION['year'] : '';
$month = isset($_SESSION['month']) ? $_SESSION['month'] : '';
$date = isset($_SESSION['date']) ? $_SESSION['date'] : '';
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$telNum1 = isset($_SESSION['telNum1']) ? $_SESSION['telNum1'] : '';
$telNum2 = isset($_SESSION['telNum2']) ? $_SESSION['telNum2'] : '';
$telNum3 = isset($_SESSION['telNum3']) ? $_SESSION['telNum3'] : '';
$mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : '';
$pass = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
$zip1 = isset($_SESSION['zip1']) ? $_SESSION['zip1'] : '';
$zip2 = isset($_SESSION['zip2']) ? $_SESSION['zip2'] : '';
$prefectures = isset($_SESSION['prefectures']) ? $_SESSION['prefectures'] : '';
$city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>入力ページ</title>
</head>

<body>
  <h1>アカウント作成</h1>
  <p class="msg"></p>
  <?php
  if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
    ?>
    <span class="error-msg" style="color: red;">
      <?php echo implode('<br>', $errors); ?>
    </span>
    <?php
  }
  ?>
  <form action="kakunin.php" method="post">
    <table>
      <tbody>
        <tr>
          <th>お名前</th>
          <td class="name">
            姓<input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>">　
            名<input type="text" id="givenName" name="givenName" value="<?php echo $givenName; ?>">
            【漢字】
          </td>
        </tr>
        <tr>
          <th>ふりがな</th>
          <td class="name">
            姓<input type="text" id="firstNameKana" name="firstNameKana" value="<?php echo $firstNameKana; ?>">　
            名<input type="text" id="givenNameKana" name="givenNameKana" value="<?php echo $givenNameKana; ?>">
            【ひらがな】
          </td>
        <tr>
          <th>年齢</th>
          <td class="name">
            <input type="text" id="age" name="age" value="<?php echo $age; ?>">歳
            【半角数字】
          </td>
        </tr>
        <tr>
          <th>生年月日</th>
          <td class="birth">
            西暦<input type="text" id="year" name="year" value="<?php echo $year; ?>">年
            <input type="text" id="month" name="month" value="<?php echo $month; ?>">月
            <input type="text" id="date" name="date" value="<?php echo $date; ?>">日
          </td>
        </tr>
        <tr>
          <th>性別</th>
          <td class="name">
            <input type="radio" name="gender" value="男性">男性
            <input type="radio" name="gender" value="女性">女性
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td class="name">
            <input type="text" class="telNum1" name="telNum1" value="<?php echo $telNum1; ?>"> ー <input type="text" class="telNum2" name="telNum2" value="<?php echo $telNum2; ?>"> ー
            <input type="text" class="telNum3" name="telNum3" value="<?php echo $telNum3; ?>">
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="text" id="mail" name="mail" value="<?php echo $mail; ?>">
            【半角英数字】
          </td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td>
            <input type="text" id="pass" name="pass" value="<?php echo $pass; ?>">
            【半角英数字, 記号, 8文字以上】
          </td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td>
            <input type="text" id="zip1" name="zip1" value="<?php echo $zip1; ?>"> ー <input type="text" id="zip2" name="zip2" value="<?php echo $zip2; ?>">
            <input type="button" class="search" value="住所検索"><br>
            【半角数字】<br>
            （郵便番号：左□内3桁、右□内4桁を入力）
          </td>
        </tr>
        <tr>
          <th>都道府県</th>
          <td>
            <select name="prefectures">
              <option value="都道府県選択">都道府県選択</option>
              <option value="北海道">北海道</option>
              <option value="青森県">青森県</option>
              <option value="岩手県">岩手県</option>
              <option value="宮城県">宮城県</option>
              <option value="秋田県">秋田県</option>
              <option value="山形県">山形県</option>
              <option value="福島県">福島県</option>
              <option value="茨城県">茨城県</option>
              <option value="栃木県">栃木県</option>
              <option value="群馬県">群馬県</option>
              <option value="埼玉県">埼玉県</option>
              <option value="千葉県">千葉県</option>
              <option value="東京都">東京都</option>
              <option value="神奈川県">神奈川県</option>
              <option value="新潟県">新潟県</option>
              <option value="富山県">富山県</option>
              <option value="石川県">石川県</option>
              <option value="福井県">福井県</option>
              <option value="山梨県">山梨県</option>
              <option value="長野県">長野県</option>
              <option value="岐阜県">岐阜県</option>
              <option value="静岡県">静岡県</option>
              <option value="愛知県">愛知県</option>
              <option value="三重県">三重県</option>
              <option value="滋賀県">滋賀県</option>
              <option value="京都府">京都府</option>
              <option value="大阪府">大阪府</option>
              <option value="兵庫県">兵庫県</option>
              <option value="奈良県">奈良県</option>
              <option value="和歌山県">和歌山県</option>
              <option value="鳥取県">鳥取県</option>
              <option value="島根県">島根県</option>
              <option value="岡山県">岡山県</option>
              <option value="広島県">広島県</option>
              <option value="山口県">山口県</option>
              <option value="徳島県">徳島県</option>
              <option value="香川県">香川県</option>
              <option value="愛媛県">愛媛県</option>
              <option value="高知県">高知県</option>
              <option value="福岡県">福岡県</option>
              <option value="佐賀県">佐賀県</option>
              <option value="長崎県">長崎県</option>
              <option value="熊本県">熊本県</option>
              <option value="大分県">大分県</option>
              <option value="宮崎県">宮崎県</option>
              <option value="鹿児島県">鹿児島県</option>
              <option value="沖縄県">沖縄県</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>市区町村(町名まで)</th>
          <td>
          <input type="text" id="city" name="city" value="<?php echo $city; ?>">
            【半角カタカナは不可】<br>
            例1：千代田区霞が関<br>
            例2：大阪市浪速区恵美須東
          </td>
        </tr>
        <tr>
          <th>番地</th>
          <td>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            【半角カタカナは不可】<br>
            例1：2-1-1<br>
            例2：1-18-6
          </td>
        </tr>
      </tbody>
    </table>
    <p></p>
    <input type="submit" class="kakunin" value="確認画面へ"><br>
  </form>

  <script src="JavaScript/index.js"></script>
</body>

</html>
