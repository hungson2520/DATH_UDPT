<?PHP
// hàm kết nối dữ liệu
$conn= mysqli_connect("localhost","root","quanbinhmu123","N01_GanNhan");

if(!$conn){
  echo "Kết nối thất bại";
}
else{
    echo "Kết nối thành công";
}



?>