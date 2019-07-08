<?php
$name = htmlspecialchars($_POST['name']);
$age = (int)$_POST['age'];
?>

こんにちは、<?php echo $name ?> さん。
あなたは、<?php echo $age; ?> 歳です。

<br>

<a href="/">トップへ</a>