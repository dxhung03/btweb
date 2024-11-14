<?php
class Footer {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
  
    // Phương thức lấy tất cả footer
    public function getAllFooters() {
        $query = "SELECT * FROM footer";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Phương thức thêm footer mới
    public function addFooter($Name, $Avatar, $Chinhsach, $Thuonghieu, $Lienhe) {
        $query = "INSERT INTO footer (Name, Avatar, Chinhsach, Thuonghieu, Lienhe) VALUES (:Name, :Avatar, :Chinhsach, :Thuonghieu, :Lienhe)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':Name', $Name, PDO::PARAM_STR);
        $stmt->bindValue(':Avatar', $Avatar, PDO::PARAM_STR);
        $stmt->bindValue(':Chinhsach', $Chinhsach, PDO::PARAM_STR);
        $stmt->bindValue(':Thuonghieu', $Thuonghieu, PDO::PARAM_STR);
        $stmt->bindValue(':Lienhe', $Lienhe, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    // Phương thức lấy footer theo ID
    public function getFooterById($id) {
        $query = "SELECT * FROM footer WHERE MaFooter = :id";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức cập nhật footer
    public function updateFooter($id, $Name, $Avatar, $Chinhsach, $Thuonghieu, $Lienhe) {
        $query = "UPDATE footer SET Name = :Name, Avatar = :Avatar, Chinhsach = :Chinhsach, Thuonghieu = :Thuonghieu, Lienhe = :Lienhe WHERE MaFooter = :id";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->errorInfo()[2];
            return false;
        }
        $stmt->bindValue(':Name', $Name, PDO::PARAM_STR);
        $stmt->bindValue(':Avatar', $Avatar, PDO::PARAM_STR);
        $stmt->bindValue(':Chinhsach', $Chinhsach, PDO::PARAM_STR);
        $stmt->bindValue(':Thuonghieu', $Thuonghieu, PDO::PARAM_STR);
        $stmt->bindValue(':Lienhe', $Lienhe, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->errorInfo()[2];
        }
        return $result;
    }

    // Phương thức xóa footer
    public function deleteFooter($id) {
        $query = "DELETE FROM footer WHERE MaFooter = :id";
        $stmt = $this->conn->prepare($query);
    
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->errorInfo()[2];
            return false;
        }
    
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
