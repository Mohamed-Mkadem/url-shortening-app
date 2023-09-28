<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=clipzip', 'root', '');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
