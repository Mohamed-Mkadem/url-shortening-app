<?php
include 'Includes/db.php';
include 'Includes/helpers.php';
include 'Includes/functions.php';

isPost();
isAjax();
isUrlParameterMissing();
$url = $_POST['url'];
isValidUrl($url);
$url = filter_var($url, FILTER_SANITIZE_URL);
