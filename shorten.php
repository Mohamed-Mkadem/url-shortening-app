<?php
require_once 'Includes/db.php';
require_once 'Includes/helpers.php';
require_once 'Includes/functions.php';

isPost();
isAjax();
isUrlParameterMissing();
$url = $_POST['url'];
isValidUrl($url);
$url = filter_var($url, FILTER_SANITIZE_URL);
$alias = uniqueAlias($conn, $url);
$domain = $_SERVER['HTTP_HOST'];
response($conn, $alias, $url, $domain);
