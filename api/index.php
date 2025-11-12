<?php
echo json_encode([
    "message" => "Welcome to Student Management API",
    "endpoints" => [
        "/students",
        "/courses",
        "/enrollments"
    ]
]);
?>
