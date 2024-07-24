<?php
session_start();
$_SESSION['functionExecuted'] = true;

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;
require "./vendor/autoload.php";

// klucze uwierzytelniajace
require_once('./authenticationKeys.php');

// Autoryzacja uzytkownika
$auth = new Auth($tenant_id, $client_id, $client_secret, $callback, $scopes);     
$token = $auth->getToken($_REQUEST['code']);
$auth->setAccessToken($token->access_token);
$auth->setRefreshToken($_GET['code']);

// zapisanie danych uzytkownika
$user = new User;
$name = $user->data->getDisplayName(); 
$email = $user->data->getUserPrincipalName();
$id = $user->data->getId();
$code = $_GET['code'];


header('Location: ./src/main.php');
exit;

?>

