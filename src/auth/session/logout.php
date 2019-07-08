<?php

require_once __DIR__ . '/functions.php';

if (!isLoggedIn()) {
    redirect('/login.php');
}

$isValidToken = validateToken(filter_input(INPUT_GET, 'token'));
if (!$isValidToken) {
    header('Content-Type: text/plain; charset=UTF-8', true, 400);

    exit('トークンが無効です。');
}

setcookie(session_name(), '', 1);

session_destroy();

redirect('login.php');