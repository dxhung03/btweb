<?php
require_once '../controller/ContactController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $data = [
        'fullName' => $_POST['fullName'] ?? '',
        'company' => $_POST['company'] ?? '',
        'address' => $_POST['address'] ?? '',
        'email' => $_POST['email'] ?? '',
        'website' => $_POST['website'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'fax' => $_POST['fax'] ?? '',
        'note' => $_POST['note'] ?? ''
    ];
    $contactController = new ContactController();
    $isSaved = $contactController->saveContact($data);
    if ($isSaved) {
        header("Location: contact_success.php");
        exit();
    } else {
        echo "Đã xảy ra lỗi trong quá trình gửi thông tin. Vui lòng thử lại.";
    }
}
?>
