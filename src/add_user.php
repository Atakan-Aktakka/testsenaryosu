<?php
require_once '../config/db.php'; // Veritabanı bağlantısı
header('Content-Type: application/json');

if (isset($_POST['ad'], $_POST['soyad'], $_POST['telefon'], $_POST['email'], $_POST['sifre'], $_POST['username'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $username = $_POST['username'];  
    $password = password_hash($_POST['sifre'], PASSWORD_DEFAULT); 

    $query = "INSERT INTO users (ad, soyad, telefon, email, password, username) VALUES (:ad, :soyad, :telefon, :email, :password, :username)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':ad', $ad);
    $stmt->bindParam(':soyad', $soyad);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $username);  

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Kullanıcı başarıyla eklendi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Kullanıcı eklenemedi.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Eksik bilgiler.']);
}
exit; 
?>