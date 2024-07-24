<?php

session_start();

require "vendor/autoload.php";
use myPHPnotes\Microsoft\Auth;

use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

require_once('./authenticationKeys.php');

$microsoft = new Auth($tenant_id, $client_id, $client_secret, $callback, $scopes);

header("location: ". $microsoft->getAuthUrl());


?>