<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'] ?? '';

    if (!empty($id)) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode($user);
        } else {
            echo json_encode(['success' => false, 'message' => 'Kullanıcı bulunamadı!']);
        }
    }
}
?>