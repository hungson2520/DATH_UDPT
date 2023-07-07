<?php

session_start();

require_once '../Model/Project.php';

Class Result_export_controller {
  public $result;

  public function __construct() {
    // Constructor logic goes here
    $this->result = new Project(); // Example of initializing a property
}
  public function ShowResultProject_Controller($idDuAN) {
    // Gọi phương thức trong Model để lấy dữ liệu
    $Resultprojects = $this->result->ShowReSultProject($idDuAN);
   
    return $Resultprojects;
}

public function WriteResultProject_Controller($idDuAN) {
  // Gọi phương thức trong Model để lấy dữ liệu
  $Resultprojects = $this->result->WriteReSultProject($idDuAN);
 
  return $Resultprojects;
}
public function CheckTypeProject_Controller($idDuAN)
{
  // Gọi phương thức trong Model để lấy dữ liệu
  $Resultprojects = $this->result->CheckTypeProject($idDuAN);
 
  return $Resultprojects;

}
public function ShowResultProject_Type2_Controller($idDuAN) {
  // Gọi phương thức trong Model để lấy dữ liệu
  $Resultprojects = $this->result->ShowReSultProject_Type2($idDuAN);
 
  return $Resultprojects;
}
public function WriteReSultProject_Type2_Controller($idDuAN) {
  // Gọi phương thức trong Model để lấy dữ liệu
  $Resultprojects = $this->result->WriteReSultProject_Type2($idDuAN);
 return $Resultprojects;
}



}


// $idDuAn=1;
// $result2= new Result_export_controller();
// $result2->ShowResultProject_Controller(1);



if (isset($_POST['ID_DuAn_Export']))
 { 
    
    $idDuAn= json_decode($_POST['ID_DuAn_Export']);
   
    echo "ID DỰ ÁN EXPORT NHẬN BÊN CONTROLLER " .$IdDuAn;
    $result2= new Result_export_controller();
    $result2->ShowResultProject_Controller($idDuAn);



 }
 // XUẤT FILE NÈ
 if(isset($_POST['data_TenFile'])&&isset($_POST['idDuAn']))
 { 
  $fileName = json_decode($_POST['data_TenFile']);
  $IdDuAn=json_decode($_POST['idDuAn']);
  $fileName=$fileName .".txt";
  echo "đang ở trang result export controller";
echo "ID dự án nhận được : " .$IdDuAn;
echo "Tên File Nhận được là : " .$fileName;
 $pathName = "C:\\Users\\ASUS\\Downloads\\";
$filenameExport = $pathName .$fileName;
$result2= new Result_export_controller();
$type= $result2->CheckTypeProject_Controller($IdDuAn);
echo "Loại là : " .$type;

if($type==1){
$data=$result2->WriteResultProject_Controller($IdDuAn);
}
if($type==2){
  $data=$result2->WriteReSultProject_Type2_Controller($IdDuAn);
  echo "TYPE 2 NÈ";
  
}
header('Location:../View/Result_Export.php?action=all&idDuAn=' .$ID_DuAn.'&success_xuatfile='. urlencode($success_xuatfile));

  $file = fopen($filenameExport, 'w');

//  // Ghi dữ liệu vào tệp tin
 fwrite($file, $data);

 // Đóng tệp tin
fclose($file);

//    // Thiết lập header để tải xuống tệp tin văn bản
   header('Content-Type: application/octet-stream');
   header('Content-Disposition: attachment; filename="' . $filenameExport . '"');
   header('Content-Length: ' . filesize($filenameExport));

//    // Gửi nội dung tệp tin cho người dùng

$success_xuatfile="Đã Tải xuống file thành công!";
  
  //readfile($$filenameExport);
   

  


 }
?>