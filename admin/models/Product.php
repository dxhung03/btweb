<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
  

    // Phương thức lấy tất cả sản phẩm
    public function getAllProducts() {
        $query = "SELECT sanpham.MaSP, sanpham.TenSP, sanpham.Gia, sanpham.GiaKM, sanpham.Soluong, sanpham.Soluotmua, sanpham.Mota, sanpham.Avatar, danhmuc.Ten AS TenDanhMuc
                  FROM sanpham
                  LEFT JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getProductsByCategory($danhmucId) {
        $query = "SELECT sanpham.MaSP, sanpham.TenSP, sanpham.Gia, sanpham.GiaKM, sanpham.Soluong, sanpham.Soluotmua, sanpham.Mota, sanpham.Avatar, danhmuc.Ten AS TenDanhMuc
                  FROM sanpham
                  LEFT JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM
                  WHERE sanpham.Danhmuc = :danhmucId"; // Thêm điều kiện lọc theo danh mục
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':danhmucId', $danhmucId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    // Phương thức thêm sản phẩm mới
    public function addProduct($TenSP, $Gia, $GiaKM, $Soluong, $Soluotmua, $Mota, $Danhmuc, $Avatar) {
        $query = "INSERT INTO sanpham (TenSP, Gia, GiaKM, Soluong, Soluotmua, Mota, MaDM, Avatar) VALUES (:TenSP, :Gia, :GiaKM, :Soluong, :Soluotmua, :Mota, :Danhmuc, :Avatar)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':TenSP', $TenSP, PDO::PARAM_STR);
        $stmt->bindValue(':Gia', $Gia, PDO::PARAM_INT);
        $stmt->bindValue(':GiaKM', $GiaKM, PDO::PARAM_INT);
        $stmt->bindValue(':Soluong', $Soluong, PDO::PARAM_INT);
        $stmt->bindValue(':Soluotmua', $Soluotmua, PDO::PARAM_INT);
        $stmt->bindValue(':Mota', $Mota, PDO::PARAM_STR);
        $stmt->bindValue(':Danhmuc', $Danhmuc, PDO::PARAM_STR);
        $stmt->bindValue(':Avatar', $Avatar, PDO::PARAM_STR);
        return $stmt->execute();
    }
    

    // Phương thức lấy sản phẩm theo ID
    public function getProductById($id) {
        $query = "SELECT * FROM sanpham WHERE MaSP = :id";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            return false;
        }
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức cập nhật sản phẩm
    public function updateProduct($id, $TenSP, $Gia, $GiaKM, $Soluong, $Soluotmua, $Mota, $Danhmuc, $Avatar) {
        $query = "UPDATE sanpham SET TenSP = :TenSP, Gia = :Gia, GiaKM = :GiaKM, Soluong = :Soluong, Soluotmua = :Soluotmua, Mota = :Mota, MaDM = :Danhmuc, Avatar = :Avatar WHERE MaSP = :id";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->errorInfo()[2];
            return false;
        }
        $stmt->bindValue(':TenSP', $TenSP, PDO::PARAM_STR);
        $stmt->bindValue(':Gia', $Gia, PDO::PARAM_INT);
        $stmt->bindValue(':GiaKM', $GiaKM, PDO::PARAM_INT);
        $stmt->bindValue(':Soluong', $Soluong, PDO::PARAM_INT);
        $stmt->bindValue(':Soluotmua', $Soluotmua, PDO::PARAM_INT);
        $stmt->bindValue(':Mota', $Mota, PDO::PARAM_STR);
        $stmt->bindValue(':Danhmuc', $Danhmuc, PDO::PARAM_STR);
        $stmt->bindValue(':Avatar', $Avatar, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result === false) {
            echo "Lỗi khi thực thi câu lệnh: " . $stmt->errorInfo()[2];
        }
        return $result;
    }

    // Phương thức xóa sản phẩm
    public function deleteProduct($id) {
        $query = "DELETE FROM sanpham WHERE MaSP = :id";
        $stmt = $this->conn->prepare($query);
    
        if ($stmt === false) {
            echo "Lỗi trong câu lệnh SQL: " . $this->conn->errorInfo()[2];
            return false;
        }
    
        $stmt->bindValue(':id', $id, PDO::PARAM_INT); // Sử dụng bindValue với PDO
        return $stmt->execute();
    }
    
}
