<?php 

class Label {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public static function InsertDataToTacVu($ID_DuAn, $TacVu) {
        $conn= mysqli_connect("localhost","root","","N01_GanNhan");
        $query = "INSERT INTO TACVU (ID_DuAn, TacVu) VALUES ('$ID_DuAn', '$TacVu')";
       
       // $stmt = $this->db->prepare($query);
        // $stmt->bindParam(':ID_DuAn', $ID_DuAn);
        // $stmt->bindParam(':TacVu', $TacVu);
        
        if ($result = $conn->query($query)) {
            echo"<h1>Thêm Vào Bảng Tác Vụ Thành Công rồi nhé</h1>";
            
        } else {
            echo"<h1>Không Thêm Vào Bảng Tác Vụ được</h1>";
          
        }
    }
}