<?php

require_once __DIR__ . '/functions.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
<title>会員限定ページ</title>
<h1>ようこそ、<?=h($_SESSION['username'])?>さん</h1>

<a href="logout.php?token=<?=h(generateToken())?>">ログアウト</a>