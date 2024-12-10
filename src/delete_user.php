<?php
require_once '../config/db.php';


if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Kullanıcı başarıyla silindi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Kullanıcı silinemedi.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Geçersiz istek.']);
}
exit;
?>