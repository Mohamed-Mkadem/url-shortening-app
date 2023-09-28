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
        header("HTTP/1.1 400 Bad Request");
        header("Content-Type: application/json");
        $response = ['error' => 'Invalid URL format.'];
        echo json_encode($response);
        exit();
    }

}

function doesAliasUsed($conn, $alias)
{
    $stmt = $conn->prepare("SELECT COUNT(*) FROM links WHERE alias = :alias");
    $stmt->bindParam(':alias', $alias, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    return $count;

}
function creatingAlias($url)
{

    $alias = substr(hash('sha256', $url), 0, 16);

    return $alias;

}

function uniqueAlias($conn, $url)
{
    $alias = creatingAlias($url);

    while (doesAliasUsed($conn, $alias)) {
        $alias = creatingAlias($url);
    }

    return $alias;
};

function insertRecord($conn, $alias, $url)
{
    $query = "INSERT INTO links (long_url, alias) values(:long_url, :alias)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':long_url', $url);
    $stmt->bindParam(':alias', $alias);

    return $stmt->execute();

}

function response($conn, $alias, $url, $domain)
{

    if (insertRecord($conn, $alias, $url)) {
        $sql = "SELECT alias FROM links WHERE alias = :alias";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':alias', $alias, PDO::PARAM_STR);
        $stmt->execute();
        $record = $stmt->fetchColumn();
        $response = [
            'alias' => $record,
            'success' => true,
            'domain' => $domain,
        ];
        echo json_encode($response);
    } else {
        $response = [
            'error' => "Oops! Something Went Wrong",
            'success' => false,
            'domain' => $domain,
        ];
        echo json_encode($response);

    }
}
