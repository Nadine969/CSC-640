<?php
function checkAuth() {
    $headers = getallheaders();
    if (!isset($headers['Authorization'])) return false;

    $token = str_replace('Bearer ', '', $headers['Authorization']);
    return $token === "12345"; // simple static token
}
?>
