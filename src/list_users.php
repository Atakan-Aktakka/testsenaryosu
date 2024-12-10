<?php
require_once '../config/db.php';

$query = "SELECT * FROM users";
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC); 

if (empty($users)) {
    echo json_encode(['error' => 'Kullanıcı bulunamadı']);
    exit;
}
echo json_encode($users);
?>
