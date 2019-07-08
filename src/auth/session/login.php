<?php

require_once __DIR__ . '/functions.php';

if (isLoggedIn()) {
    redirect('index.php');
}

function authenticate($username, $password, $token)
{
    $hashes = [
        // username: user1, password: password
        // 当然、本当は生パスワードをこんなとこに書いちゃダメ
        'user1' => '$2y$10$hTt6tYPaNt1BZkaRqioVouMsMNa5whcogWgRkNteKlvXwa8fr1MIC'
    ];
    
    $isTokenValidated = validateToken($token);

    if (!$isTokenValidated) {        
        http_response_code(403);

        return;
    }

    $isPasswordVerified = password_verify(
        $password,
        isset($hashes[$username])
            ? $hashes[$username]
            : '$2y$10$abcdefghijklmnopqrstuv' // ユーザ名が存在しない場合にレスポンスが速くなるのを防ぐ
        );
    if (!$isPasswordVerified) {
        http_response_code(401); 

        print_r([
            'username' => $username,
            'password' => $password,
            $hashes[$username]
          ]);
        return;
    }

    session_regenerate_id(true);

    $_SESSION['username'] = $username;

    redirect('index.php');
}

$username = filter_input(
    INPUT_POST,
    'username',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$password = filter_input(
    INPUT_POST,
    'password',
    FILTER_SANITIZE_SPECIAL_CHARS
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = filter_input(INPUT_POST, 'token');

    authenticate($username, $password, $token);
} else {
    header('Content-Type: text/html; charset=UTF-8');
}

$generated_token = h(generateToken());

?>

<!DOCTYPE html>
<title>ログインページ</title>
<h1>ログインしてください</h1>
<form method="post" action="">
  ユーザ名：<input type="text" name="username" value=""><br>
  パスワード：<input type="password" name="password" value=""><br>
  <input type="hidden" name="token" value="<?= $generated_token ?>"><br>
  <button type="submit">ログイン</button>
</form>

<?php if (http_response_code() === 403): ?>
<p style="color: red;">セッションが切れています。</p>
<?php endif; ?>

<?php if (http_response_code() === 401): ?>
<p style="color: red;">ユーザ名またはパスワードが違います。</p>
<?php endif; ?>
