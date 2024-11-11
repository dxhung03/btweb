<?php
class Category {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
  
    // Phương thức lấy tất cả danh mục
    public function getAllCategories() {
        $query = "SELECT MaDM, Ten FROM danhmuc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về cả MaDM và Ten
    }

    // Phương thức thêm danh mục mới
    public function addCategory($Ten) {
        $query = "INSERT INTO danhmuc (Ten) VALUES (:Ten)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':Ten', $Ten, PDO::PARAM_STR);
        return $stmt->execute();
    }
    

    // Phương thức lấy danh mục theo ID
    public function getCategoryById($id) {
        $query = "SELECT * FROM danhmuc WHERE MaDM = :id";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức cập nhật danh mục
    public function updateCategory($id, $Ten) {
        $query = "UPDATE danhmuc SET Ten = :Ten WHERE MaDM = :id";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->errorInfo()[2];
            return false;
        }
        $stmt->bindValue(':Ten', $Ten, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->errorInfo()[2];
        }
        return $result;
    }

    // Phương thức xóa danh mục
    public function deleteCategory($id) {
        $query = "DELETE FROM danhmuc WHERE MaDM = :id";
        $stmt = $this->conn->prepare($query);
    
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->errorInfo()[2];
            return false;
        }
    
        $stmt->bindValue(':id', $id, PDO::PARAM_INT); // Sử dụng bindValue với PDO
        return $stmt->execute();
    }
    
    // (Tùy chọn) Phương thức lấy danh mục theo MaSP nếu cần liên kết sản phẩm
    public function getCategoriesByProductId($MaSP) {
        $query = "SELECT * FROM danhmuc WHERE MaSP = :MaSP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':MaSP', $MaSP, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
