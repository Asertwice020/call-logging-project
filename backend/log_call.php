<?php
header("Content-Type: application/json; charset=UTF-8");
require_once 'db_config.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit();
}

$data = json_decode(file_get_contents('php://input'));

if (
    !isset($data->date) || !isset($data->time) || !isset($data->type) ||
    !isset($data->device_number) || !isset($data->client_number) ||
    !isset($data->ring_duration) || !isset($data->call_duration)
) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Missing required fields."]);
    exit();
}

$sql = "INSERT INTO calls (date, time, type, device_number, client_number, ring_duration, call_duration) VALUES (?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssssii", $data->date, $data->time, $data->type, $data->device_number, $data->client_number, $data->ring_duration, $data->call_duration);
    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Call logged successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to execute statement."]);
    }
    $stmt->close();
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to prepare statement."]);
}

$conn->close();
?>
