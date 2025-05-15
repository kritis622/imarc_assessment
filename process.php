<?php
header('Content-Type: application/json');
require_once 'SequenceCorrector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sequence'])) {
    $sequence = $_POST['sequence'];

    try {
        $corrector = new SequenceCorrector();
        $corrected = $corrector->correct($sequence);
        echo json_encode(['corrected' => $corrected]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
