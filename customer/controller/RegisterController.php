<?php
require_once '../../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($password) || empty($email) || empty($phone)) {
        echo "Vui lòng điền đầy đủ thông tin!";
        exit;
    }

    try {
        $database = new Database();
        $conn = $database->getConnection();

        // Kiểm tra xem tên tài khoản đã tồn tại chưa
        $checkQuery = "SELECT * FROM taikhoan WHERE TenTK = :username";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.";
            exit;
        }

        // Thêm tài khoản vào bảng taikhoan
        $insertAccountQuery = "INSERT INTO taikhoan (TenTK, Password) VALUES (:username, :password)";
        $stmt = $conn->prepare($insertAccountQuery);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Có thể mã hóa mật khẩu bằng password_hash()
        $stmt->execute();

        // Lấy ID tài khoản vừa được tạo
        $lastInsertedId = $conn->lastInsertId();

        // Gán quyền mặc định cho tài khoản (Maquyen = 2)
        $insertRoleQuery = "INSERT INTO taikhoan_quyen (Maquyen, MaTK) VALUES (2, :maTK)";
        $stmt = $conn->prepare($insertRoleQuery);
        $stmt->bindParam(':maTK', $lastInsertedId);
        $stmt->execute();

        // Thêm thông tin khách hàng vào bảng khachhang
        $insertCustomerQuery = "INSERT INTO khachhang (MaTK, Email, Phone) VALUES (:MaTK, :Email, :Phone)";
        $stmt = $conn->prepare($insertCustomerQuery);
        $stmt->bindParam(':MaTK', $lastInsertedId);
        $stmt->bindParam(':Phone', $phone);
        $stmt->bindParam(':Email', $email);
        $stmt->execute();

        // Đăng ký thành công
        echo "Đăng ký thành công! Vui lòng đăng nhập.";
        header("Location: ../view/login.php"); // Chuyển hướng đến trang đăng nhập
        exit;

    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
