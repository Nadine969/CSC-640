<?php
include 'db.php';
include 'auth.php';
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $result = $conn->query("SELECT * FROM courses");
        $courses = [];
        while ($row = $result->fetch_assoc()) $courses[] = $row;
        echo json_encode($courses);
        break;

    case 'POST':
        if (!checkAuth()) {
            http_response_code(401);
            echo json_encode(["error" => "Unauthorized"]);
            exit;
        }
        $data = json_decode(file_get_contents("php://input"));
        $name = $conn->real_escape_string($data->name);
        $credits = intval($data->credits);
        $conn->query("INSERT INTO courses (name, credits) VALUES ('$name',$credits)");
        echo json_encode(["message" => "Course added successfully"]);
        break;
}
?>
