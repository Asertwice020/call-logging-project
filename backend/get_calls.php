<?php
header("Content-Type: application/json; charset=UTF-8");
// Allow requests from any origin. For a production app, you might restrict this.
header("Access-Control-Allow-Origin: *"); 
require_once 'db_config.php';

$calls = [];
$sql = "SELECT id, date, time, type, device_number, client_number, ring_duration, call_duration, created_at FROM calls ORDER BY created_at DESC";

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $calls[] = $row;
    }
    $result->free();
}

$conn->close();
echo json_encode($calls);
?>
