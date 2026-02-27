<?php
// verify.php
header('Content-Type: application/json');

// Get webhook parameter
$webhook = isset($_GET['webhook']) ? urldecode($_GET['webhook']) : null;

if (!$webhook) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing webhook parameter']);
    exit;
}

// Process verification
// ... your verification logic here ...

echo json_encode([
    'success' => true,
    'message' => 'Verification successful',
    'webhook' => $webhook
]);
?>
