<?php

function isLoggedIn()
{
    @session_start();
    return isset($_SESSION['username']);
}

function generateToken()
{
    return hash('sha256', session_id());
}

function validateToken($token)
{
    return $token === generateToken();
}

function h($str)
{
    return htmlspecialchars($str, $ENT_QUETES, 'UTF-8');
}

function redirect($path)
{
    header('Location: /auth/session/' . $path);

    exit;
}