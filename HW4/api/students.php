<?php
include 'db.php';
include 'auth.php';
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    // ---------------------- GET ----------------------
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $conn->query("SELECT * FROM students WHERE id=$id");
            echo json_encode($result->fetch_assoc());
        } else {
            $result = $conn->query("SELECT * FROM students");
            $students = [];
            while ($row = $result->fetch_assoc()) $students[] = $row;
            echo json_encode($students);
        }
        break;

    // ---------------------- POST ----------------------
    case 'POST':
        if (!checkAuth()) {
            http_response_code(401);
            echo json_encode(["error" => "Unauthorized"]);
            exit;
        }
        $data = json_decode(file_get_contents("php://input"));
        $name = $conn->real_escape_string($data->name);
        $email = $conn->real_escape_string($data->email);
        $major = $conn->real_escape_string($data->major);
        $conn->query("INSERT INTO students (name, email, major) VALUES ('$name','$email','$major')");
        echo json_encode(["message" => "Student added successfully"]);
        break;

    // ---------------------- PUT ----------------------
    case 'PUT':
        if (!checkAuth()) {
            http_response_code(401);
            echo json_encode(["error" => "Unauthorized"]);
            exit;
        }

        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $data = json_decode(file_get_contents("php://input"), true);

        if ($id > 0 && isset($data['major'])) {
            $major = $conn->real_escape_string($data['major']);
            $conn->query("UPDATE students SET major='$major' WHERE id=$id");
            echo json_encode(["message" => "Student updated successfully"]);
        } else {
            echo json_encode(["error" => "Missing ID or data"]);
        }
        break;

    // ---------------------- DELETE ----------------------
    case 'DELETE':
    if (!checkAuth()) {
        http_response_code(401);
        echo json_encode(["error" => "Unauthorized"]);
        exit;
    }

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        // Delete from enrollments first
        $conn->query("DELETE FROM enrollments WHERE student_id=$id");

        // Then delete student
        $conn->query("DELETE FROM students WHERE id=$id");
        echo json_encode(["message" => "Student deleted successfully"]);
    } else {
        echo json_encode(["error" => "Missing or invalid ID"]);
    }
    break;
}
  ?>  
