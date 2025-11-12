<?php
include 'db.php';
include 'auth.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    // GET all enrollments or filter by student/course
    case 'GET':
        $query = "SELECT e.id, s.name AS student_name, c.name AS course_name
                  FROM enrollments e
                  JOIN students s ON e.student_id = s.id
                  JOIN courses c ON e.course_id = c.id";

        if (isset($_GET['student_id'])) {
            $student_id = intval($_GET['student_id']);
            $query .= " WHERE e.student_id = $student_id";
        } elseif (isset($_GET['course_id'])) {
            $course_id = intval($_GET['course_id']);
            $query .= " WHERE e.course_id = $course_id";
        }

        $result = $conn->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    // POST new enrollment (already in your file)
    case 'POST':
        if (!checkAuth()) {
            http_response_code(401);
            echo json_encode(["error" => "Unauthorized"]);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"));
        $student_id = intval($data->student_id);
        $course_id = intval($data->course_id);

        $conn->query("INSERT INTO enrollments (student_id, course_id) VALUES ($student_id, $course_id)");
        echo json_encode(["message" => "Enrollment added successfully"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
}
?>
