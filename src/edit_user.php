<?php
require_once '../config/db.php';
header('Content-Type: application/json; charset=utf-8');

try {
    if (isset($_POST['id'])) {
        $userId = $_POST['id'];
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $sifre = isset($_POST['sifre']) ? password_hash($_POST['sifre'], PASSWORD_DEFAULT) : null;

        if ($sifre) {
            $query = "UPDATE users SET ad = :ad, soyad = :soyad, telefon = :telefon, email = :email, username = :username, sifre = :sifre WHERE id = :id";
        } else {
            $query = "UPDATE users SET ad = :ad, soyad = :soyad, telefon = :telefon, email = :email, username = :username WHERE id = :id";
        }

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':ad', $ad);
        $stmt->bindParam(':soyad', $soyad);
        $stmt->bindParam(':telefon', $telefon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':id', $userId);

        if ($sifre) {
            $stmt->bindParam(':sifre', $sifre);
        }

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Kullanıcı başarıyla güncellendi.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Kullanıcı güncellenemedi.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Geçersiz istek.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Hata oluştu: ' . $e->getMessage()]);
}
exit;
?>