<?php

require_once 'ConnectDatabase.php';
class Statistic {
    private $ID_DuAn;
    private $tenDuAn;
    private $moTa;
    private $ID_LoaiDuAn;
public static function ShowStatisticProject($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

    // Bước 2: Chuẩn bị truy vấn SELECT
    // LOẠI DỰ ÁN 1 2 4
    $sql = "SELECT n.Nhan, count(*) as number 
            FROM ketquanhan kq, tacvu t, nhan n, duan d 
            WHERE kq.ID_TacVu = t.ID_TacVu and t.ID_DuAn = d.ID_DuAn 
                    AND kq.ID_Nhan = n.ID_Nhan AND t.ID_DuAn = '$idDuAN'
            GROUP BY n.Nhan;";

    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        echo "<h1>ĐÃ TRUY VẤN THÀNH CÔNG</h1>";
    } else {
      //  echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
    }
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
    if($result)
    {  
        $ListLabel=array();
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ListLabel[] = $row;
        }
    }
    return $ListLabel;
}
}

public static function ShowStatisticProject_2($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

    // Bước 2: Chuẩn bị truy vấn SELECT
    // LOẠI DỰ ÁN 1 2 4
    $sql = "SELECT kq.KetQua as Nhan, count(*) as number FROM ketquanhanghi kq, tacvu t, duan d WHERE kq.ID_TacVu = t.ID_TacVu and t.ID_DuAn = d.ID_DuAn AND d.ID_DuAn = '$idDuAN' GROUP by kq.KetQua;";

    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        echo "<h1>ĐÃ TRUY VẤN THÀNH CÔNG</h1>";
    } else {
      //  echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
    }
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
    if($result)
    {  
        $ListLabel=array();
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ListLabel[] = $row;
        }
    }
    return $ListLabel;
}
}

public static function SumOfTask($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

    $sql = "SELECT COUNT(*) as number from TacVu WHERE ID_DuAn = '$idDuAN';";

    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
    if($result)
    {  
        if ($result->num_rows > 0) {
            $numoftask = $result->fetch_assoc();
        }
    }
    return $numoftask;
}

public static function SumOfLabel($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

    // Bước 2: Chuẩn bị truy vấn SELECT
    // LOẠI DỰ ÁN 1 2 4
    $sql = "SELECT count(DISTINCT kq.ID_Nhan) as number
            FROM ketquanhan kq, tacvu t, nhan n, duan d 
            WHERE kq.ID_TacVu = t.ID_TacVu and t.ID_DuAn = d.ID_DuAn 
            AND kq.ID_Nhan = n.ID_Nhan AND t.ID_DuAn = '$idDuAN'";
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
    if($result)
    {  
        if ($result->num_rows > 0) {
            $numoflabel = $result->fetch_assoc();
        }
    }
    return $numoflabel;
}

public static function SumOfLabel_2($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

    // Bước 2: Chuẩn bị truy vấn SELECT
    // LOẠI DỰ ÁN 1 2 4
    $sql = "SELECT kq.KetQua, count(*) as number 
            FROM ketquanhanghi kq, tacvu t, duan d 
            WHERE kq.ID_TacVu = t.ID_TacVu and t.ID_DuAn = d.ID_DuAn AND d.ID_DuAn = 3 
            GROUP by kq.KetQua;";
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
    if($result)
    {  
        if ($result->num_rows > 0) {
            $numoflabel = $result->fetch_assoc();
        }
    }
    return $numoflabel;
}
}
