<?php

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        $response = ['error' => 'This is not a POST request.'];
        echo json_encode($response);
        exit();
    }
}
function isAjax()
{

    if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        $response = ['error' => 'This is not an Ajax request.'];
        echo json_encode($response);
        exit();
    }
}

function isUrlParameterMissing()
{
    if (!isset($_POST['url'])) {
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        $response = ['error' => 'The "url" parameter is missing.'];
        echo json_encode($response);
        exit();
    }
}
function isValidUrl($url)
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        // The URL is not valid, return an error response
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        $response = ['error' => 'Invalid URL formajhhhhhhhhhht.'];
        echo json_encode($response);
        exit();
    }

}
