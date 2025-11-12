<?php
$host = "db";
$user = "root";
$pass = "root";
$dbname = "school_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}
?>
