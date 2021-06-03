<!-- ベーシック認証に必要な情報 -->
<?php

// パスワードを記録したファイルの場所
echo __FILE__;
echo '<br>';
// パスワード（暗号化） password_hashとcryptの二種がある。今は前者が推奨されている。
echo(password_hash('password123',PASSWORD_BCRYPT));
// $2y$10$IR1vqLxdHO7OLBJGXiDuIO9MXMaqIV/wNJ9.f95pLmpyZTbRXoHKG

?>