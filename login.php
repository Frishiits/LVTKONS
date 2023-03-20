<?php
session_start();
$_SESSION['state']=session_id();
$env = parse_ini_file('database/.env');

$login_url ="https://login.microsoftonline.com/".$env['tenant']."/oauth2/v2.0/authorize";
$client_id = $env['client_id'];
$client_secret = $env['client_secret'];
$callback = $env['callback'];
$scopes = ["https://graph.microsoft.com/.default","offline_access"];

$params = array ('client_id' =>$client_id,
        'redirect_uri' => $callback,
        'response_type' =>'token',
        'response_mode' =>'form_post',
        'scope' => "https://graph.microsoft.com/User.Read",
        'state' =>$_SESSION['state']);
header ('Location: '.$login_url.'?'.http_build_query ($params));
?>