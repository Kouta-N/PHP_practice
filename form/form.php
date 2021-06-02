<?php
session_start();
// クリックジャッキング対策

require 'validation.php';

header('X-FRAME-OPTIONS:DENY');
// <script>対策
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

if (!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '<pre>';
}

$pageFlag = 0;
$errors = validation($_POST);

if (!empty($_POST['btn_confirm'])){
  $pageFlag = 1;
}
if (!empty($_POST['btn_submit'])){
  $pageFlag = 2;
}
?>
<!DOCTYPE html>
<meta charset="utf-8">

<head></head>

<body>
  <?php if($pageFlag === 0) : ?>
  <?php
if(!isset($_SESSION['csrfToken'])){
$csrfToken = bin2hex(random_bytes(32));
$_SESSION['csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken'];
?>

  <form method="POST" action="form.php">
    名前
    <input type="text" name="your_name" value="<?php echo h($_POST['your_name']) ; ?>">
    <br>
    メールアドレス
    <input type="email" name="email" value="<?php echo h($_POST['email']) ; ?>">
    <br>
    ホームページ
    <input type="url" name="url" value="<?php echo h($_POST['url']) ; ?>">
    <br>
    性別
    <input type="radio" name="gender" value="0" <?php if ($_POST['gender'] === '0') {
        echo 'checked';
    } ?>>男性
    <input type="radio" name="gender" value="1" <?php if ($_POST['gender'] === '1') {
        echo 'checked';
    } ?>>女性
    <br>
    年齢
    <select name="age">
      <option value="">選択してください</option>
      <option value="1" <?php if ($_POST['age'] === '1') {
        echo 'selected';
    } ?>>~19</option>
      <option value="2" <?php if ($_POST['age'] === '2') {
        echo 'selected';
    } ?>>20~29</option>
      <option value="3" <?php if ($_POST['age'] === '3') {
        echo 'selected';
    } ?>>30~39</option>
      <option value="4" <?php if ($_POST['age'] === '4') {
        echo 'selected';
    } ?>>40~49</option>
      <option value="5" <?php if ($_POST['age'] === '5') {
        echo 'selected';
    } ?>>50~59</option>
      <option value="6" <?php if ($_POST['age'] === '6') {
        echo 'selected';
    } ?>>60~69</option>
    </select>
    <br>
    お問い合わせ内容
    <textarea name="contact">
    <?php if(!empty($_POST['contact']))
    {
      echo h($_POST['contact']);
    }
    ; ?>
    </textarea>
    <br>
    <input type="checkbox" name="caution" value="1">注意事項にチェックする
    <br>
    <input type="submit" name="btn_confirm" value="確認する">
    <input type="hidden" name="csrf" value="<?php echo $token ;?>">
  </form>
  <?php endif; ?>

  <?php if($pageFlag === 1) : ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
  <!-- // 確認 -->
  <form method="POST" action="form.php">
    名前
    <?php echo h($_POST['your_name']) ; ?>
    <br>
    メールアドレス
    <?php echo h($_POST['email']) ; ?>
    <br>
    ホームページ
    <?php echo h($_POST['url']) ; ?>
    <br>
    性別
    <?php 
    if ($_POST['gender'] === '0') {
        echo '男性';
    }
    if ($_POST['gender'] === '1') {
        echo '女性';
    }
    ?>
    <br>
    年齢
    <?php
    if ($_POST['age'] === '1') {
        echo '~19';
    }
    if ($_POST['age'] === '2') {
        echo '20~29';
    }
    if ($_POST['age'] === '3') {
        echo '30~39';
    }
    if ($_POST['age'] === '4') {
        echo '40~49';
    }
    if ($_POST['age'] === '5') {
        echo '50~59';
    }
    if ($_POST['age'] === '6') {
        echo '60~69';
    }
    ?>
    <br>
    お問い合わせ内容
    <?php echo h($_POST['contact']) ; ?>
    <br>

    <input type="submit" name="back" value="戻る">
    <input type="submit" name="btn_submit" value="送信する">
    <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']) ; ?>">
    <input type="hidden" name="email" value="<?php echo h($_POST['email']) ; ?>">
    <input type="hidden" name="url" value="<?php echo h($_POST['url']) ; ?>">
    <input type="hidden" name="gender" value="<?php echo h($_POST['gender']) ; ?>">
    <input type="hidden" name="age" value="<?php echo h($_POST['age']) ; ?>">
    <input type="hidden" name="contact" value="<?php echo h($_POST['contact']) ; ?>">
    <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']) ; ?>">
  </form>
  <?php endif; ?>
  <?php endif; ?>

  <?php if($pageFlag === 2) : ?>
  <?php if($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
  送信が送信が完了しました。
  <?php unset($_SESSION['csrfToken']); ?>
  <?php endif; ?>
  <?php endif; ?>
</body>

</html>