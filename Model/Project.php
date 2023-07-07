<?php

require_once 'ConnectDatabase.php';
class Project {
    private $ID_DuAn;
    private $tenDuAn;
    private $moTa;
    private $ID_LoaiDuAn;
public static function getAllProject()
{

    // Tạo kết nối đến MySQL
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT da.ID_DuAn,da.tenDuAn,da.moTa,da.ID_LoaiDuAn,lda.TenLoai FROM duan da, loaiduan lda WHERE da.ID_LoaiDuAn=lda.ID_LoaiDuAn";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $duAn = array(); // Mảng để lưu trữ dữ liệu

    if ($result->num_rows > 0) {
        // Dùng vòng lặp để duyệt qua từng hàng dữ liệu
        while ($row = $result->fetch_assoc()) {
            // Thêm hàng dữ liệu vào mảng
            $duAn[] = $row;
        }
    } else {
        return null;
    }

    // Đóng kết nối MySQL
    $conn->close();

    // Trả về mảng dữ liệu
    return $duAn;
}


public static function getUserProject($idNguoiDung)
{
   

    // Tạo kết nối đến MySQL
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");


    // Câu truy vấn SQL để lấy tất cả dữ liệu từ project
    $sql = "SELECT da.ID_DuAn,da.tenDuAn,da.moTa,da.ID_LoaiDuAn,lda.TenLoai FROM duan da, loaiduan lda 
    WHERE da.ID_LoaiDuAn=lda.ID_LoaiDuAn and da.ID_DuAn in (select ID_DuAn from PhanCong where ID_NguoiDung = $idNguoiDung) ";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    $duAn = array(); // Mảng để lưu trữ dữ liệu

    if ($result->num_rows > 0) {
        // Dùng vòng lặp để duyệt qua từng hàng dữ liệu
        while ($row = $result->fetch_assoc()) {
            // Thêm hàng dữ liệu vào mảng
            $duAn[] = $row;
        }
    } else {
        return null;
    }

    // Đóng kết nối MySQL
    $conn->close();

    // Trả về mảng dữ liệu
    return $duAn;
}

public static function getProject($idDuAn) {

    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Chuẩn bị câu truy vấn SQL để lấy dự án theo ID
    $sql = "SELECT ID_DuAn,tenDuAn,moTa,ID_LoaiDuAn FROM duan WHERE ID_DuAn=$idDuAn";

    
    $result = $conn->query($sql);
    // Kiểm tra xem có dự án nào được tìm thấy hay không
    if ($result->num_rows > 0) {
        // Lấy thông tin dự án từ kết quả truy vấn
        $project = $result->fetch_assoc();

        // Đóng kết nối CSDL
        $conn->close();

        // Trả về thông tin dự án
        return $project;
    } else {
        // Đóng kết nối CSDL
        $conn->close();

        // Trả về null nếu không tìm thấy dự án
        return null;
    }
}

public static function insertProject($tenDuAn, $loaiDuAn, $moTa) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    // Bước 2: Chuẩn bị truy vấn INSERT
    $sql = "INSERT INTO duan (tenDuAn, moTa, ID_LoaiDuAn) VALUES ('$tenDuAn', '$moTa', '$loaiDuAn')";
    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
       return false;
    }
    // Bước 4: Đóng kết nối
    $conn->close();
}


public static function delete($idDuAn) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    // Bước 2: Chuẩn bị truy vấn INSERT
    $sql = "DELETE from duan WHERE ID_DuAn=$idDuAn";
    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
       return false;
    }
    // Bước 4: Đóng kết nối
    $conn->close();
}


public static function ShowReSultProject($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

    // Bước 2: Chuẩn bị truy vấn SELECT
    // LOẠI DỰ ÁN 3 5 6
    $sql = "SELECT kqng.ID_KetQuaNhanGhi, nd.Ten, da.TenDuAn, lda.TenLoai, tv.TacVu , kqng.ketqua 
    FROM `ketquanhanghi`kqng ,`tacvu` tv , `nguoidung` nd,`loaiduan` lda,`duan` da 
    WHERE kqng.ID_tacvu=tv.ID_TacVu
    and nd.ID_NguoiDung=kqng.ID_NguoiDung and da.ID_DuAn=tv.ID_DuAn and da.ID_LoaiDuAn=lda.ID_LoaiDuAn 
    And tv.ID_DuAN='$idDuAN' AND da.ID_LoaiDuAn IN (3, 5, 6)";



    // Bước 3: Thực hiện truy vấn INSERT
    if ($conn->query($sql) === TRUE) {
        echo "<h1>ĐÃ TRUY VẤN THÀNH CÔNG</h1>";
    } else {
      //  echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
    }
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
      $result = $conn->query($sql);
        if($result){
        
            $data = "";
            $ListProject=array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ListProject[] = $row;
                    $data .= "---------------------------------------\n";
                   
                }
            }
        }
        $conn->close();
    return $ListProject;
}


// xử lý loại 1 2 4
public static function ShowReSultProject_Type2($idDuAN)
{
 // Bước 1: Kết nối đến cơ sở dữ liệu
 $connection = new DatabaseConnection();
 $pw = $connection->getPassword();
 $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
 // Kiểm tra kết nối
 if ($conn->connect_error) {die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);}

//  $sql2="SELECT n.Nhan, nd.Ten ,tv.TacVu,kqn.TuNgu FROM ketquanhan kqn ,nguoidung nd , tacvu tv , nhan n, duan da  
//   WHERE kqn.ID_NguoiDung=nd.ID_NguoiDung and n.ID_Nhan=kqn.ID_Nhan 
//     and tv.ID_TacVu=kqn.ID_TacVu and tv.ID_DuAn=da.ID_DuAn and da.ID_LoaiDuAn IN( 3,5,6) And tv.ID_DuAN='$idDuAN' ";
$sql2="SELECT kqn.ID_KetQuaNhan,tv.ID_TacVu ,n.Nhan, nd.Ten ,tv.TacVu,kqn.TuNgu,da.tenDuAn,lda.TenLoai 
FROM ketquanhan kqn ,nguoidung nd , tacvu tv , nhan n, duan da, loaiduan lda 
WHERE kqn.ID_NguoiDung=nd.ID_NguoiDung and n.ID_Nhan=kqn.ID_Nhan and tv.ID_TacVu=kqn.ID_TacVu 
and tv.ID_DuAn=da.ID_DuAn and da.ID_LoaiDuAn IN( 1,2,4) and da.ID_LoaiDuAn=lda.ID_LoaiDuAn And tv.ID_DuAN='$idDuAN';

";
 
 $result = $conn->query($sql2);
        if($result){
        
            $data = "";
            $ListProject=array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ListProject[] = $row;
                    $data .= "---------------------------------------\n";
                   
                }
            }
        }
        $conn->close();
    return $ListProject;
} 
// Viết cho loại 1 2 4
public static function  WriteReSultProject_Type2($idDuAN)
{
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error); }

    // $sql2="SELECT n.Nhan, nd.Ten ,tv.TacVu,kqn.TuNgu FROM ketquanhan kqn ,nguoidung nd , tacvu tv , nhan n, duan da  
    // WHERE kqn.ID_NguoiDung=nd.ID_NguoiDung and n.ID_Nhan=kqn.ID_Nhan 
    //   and tv.ID_TacVu=kqn.ID_TacVu and tv.ID_DuAn=da.ID_DuAn and da.ID_LoaiDuAn IN( 3,5,6) And tv.ID_DuAN='$idDuAN' ";

    $sql2="SELECT n.Nhan, nd.Ten ,tv.TacVu,kqn.TuNgu,da.tenDuAn,lda.TenLoai 
    FROM ketquanhan kqn ,nguoidung nd , tacvu tv , nhan n, duan da, loaiduan lda 
    WHERE kqn.ID_NguoiDung=nd.ID_NguoiDung and n.ID_Nhan=kqn.ID_Nhan and tv.ID_TacVu=kqn.ID_TacVu 
    and tv.ID_DuAn=da.ID_DuAn and da.ID_LoaiDuAn IN( 1,2,4) and da.ID_LoaiDuAn=lda.ID_LoaiDuAn And tv.ID_DuAN='$idDuAN';
    
    ";

   
     // Bước 4: Lấy dữ liệu từ kết quả truy vấn
     $result = $conn->query($sql2);
   
     // NẾU LOẠI DỰ ÁN LÀ 3 HOẶC 5 HOẶC 6
       if($result)
       {
           
       $data = "";
    
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
            $data .= "Tên Loại Dự Án : " . $row['TenLoai'] . "\n";
            $data .= "Tên  Dự Án : " . $row['tenDuAn'] . "\n";
            $data .= "Tác Vụ : " . $row['TacVu'] . "\n";
            $data .= "Nhãn: " . $row['Nhan'] . "\n";
            $data .= "Tên Người Thực Hiện : " . $row['Ten'] . "\n";
            $data .= "Từ Ngữ Thực Thể: " . $row['TuNgu'] . "\n";
            $data .= "---------------------------------------\n";
               
              
           }
       }
       return $data;
    }
} 

public static function getLoaiDuAn($ID_LoaiDuAn) {
    $allowedValues = array(1, 2, 4);
    
    if (in_array($ID_LoaiDuAn, $allowedValues)) {
      return 2;
    }
    else{
   return 1;
    }
  }

public static function CheckTypeProject($idDuAn)
{
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    $sql="SELECT `ID_DuAn`, `tenDuAn`, `ID_LoaiDuAn`, `moTa` FROM `duan` WHERE ID_DuAn= '$idDuAn' ";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $ID_LoaiDuAn = $row['ID_LoaiDuAn'];
        $loaiDuAn = Project::getLoaiDuAn($ID_LoaiDuAn);
        return $loaiDuAn;
        // Tiếp tục xử lý dữ liệu
        // ...
      }
}


   


    
   



// Viết kết quả cho loại dự án 3 5 6 
public static function  WriteReSultProject($idDuAN) 
{
    // Bước 1: Kết nối đến cơ sở dữ liệu
    $connection = new DatabaseConnection();
    $pw = $connection->getPassword();
    $conn= mysqli_connect("localhost","root", $pw ,"N01_GanNhan");
    // Kiểm tra kết nối
    if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Bước 2: Chuẩn bị truy vấn SELECT
    $sql = "SELECT nd.Ten, da.TenDuAn, lda.TenLoai, tv.TacVu , kqng.ketqua 
    FROM `ketquanhanghi`kqng ,`tacvu` tv , `nguoidung` nd,`loaiduan` lda,`duan` da 
    WHERE kqng.ID_tacvu=tv.ID_TacVu
    and nd.ID_NguoiDung=kqng.ID_NguoiDung and da.ID_DuAn=tv.ID_DuAn and da.ID_LoaiDuAn=lda.ID_LoaiDuAn And tv.ID_DuAN='$idDuAN' AND da.ID_LoaiDuAn IN (3, 5, 6)";



    
    
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
   
    // Bước 4: Lấy dữ liệu từ kết quả truy vấn
    $result = $conn->query($sql);
   
  // NẾU LOẠI DỰ ÁN LÀ 1 HOẶC 2 HOẶC 4
    if($result)
    {
        
    $data = "";
 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            $data .= "Tên Người dùng: " . $row['Ten'] . "\n";
            $data .= "Tên Dự Án: " . $row['TenDuAn'] . "\n";
            $data .= "Tên Loại Dự Án: " . $row['TenLoai'] . "\n";
            $data .= "Tác Vụ: " . $row['TacVu'] . "\n";
            $data .= "Kết Quả: " . $row['ketqua'] . "\n";
           
           
            $data .= "---------------------------------------\n";
            
           
        }
    }
  }





    // Bước 4: Đóng kết nối
 
    return $data;
}


}
?>