<?php
$idLoaiDuAn=$_GET['idLoaiDuAn'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gán nhãn ghi</title>
  <link rel="stylesheet" href="./CSS/GanNhanGhi.css" />
</head>
<body>
  <input type="hidden" name="role" value="<?php echo $role ?>">
  <?php
    if ($idLoaiDuAn == 5) {
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
        font-family: Cambria;
      }
      </style>
      <h1> Gán nhãn câu trả lời của cặp câu hỏi và văn bản</h1>';
    }elseif($idLoaiDuAn == 3){
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
        font-family: Cambria;
      }
      </style>
      <h1> DỊCH MÁY</h1>';
    }elseif($idLoaiDuAn == 6){
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
        font-family: Cambria;
      }
      </style>
      <h1> TÌM CÂU HỎI ĐỒNG NGHĨA</h1>';
    }
  ?>
   <?php
       
        $action=$_GET['action'];
        // Đường dẫn tới file Controller
        require_once '../Controller/Task.php';
         require_once '../Controller/Result_Export_Controller.php';  
     
        if ($action=="create"){
          $idNguoiDung=$_GET['idnguoidung'];
    $idDuAn=$_GET['idDuAn'];
    $role=$_GET['role'];
   // Khởi tạo đối tượng của Controller
   $taskController = new TaskController();
        
   // Gọi phương thức lấy tất cả các tasks
   
   $idnguoidung = $_GET['idnguoidung'];
   $idtacvu = $_GET['id'];
   $task = $taskController->getDatafromTacVu($idtacvu);




    ?>

  
  <div class="label-form">
   <form method = "post" class="labeling-form" action = "../Controller/Task.php" name="labeling_2"> 
   
    
    <input type="hidden" name="idtacvu" value="<?php echo $idtacvu ?>">
    <input type="hidden" name="idnguoidung" value="<?php echo $idnguoidung ?>">
    <input type="hidden" name="idDuAn" value="<?php echo $idDuAn ?>">
    <input type="hidden" name="idLoaiDuAn" value="<?php echo $idLoaiDuAn ?>">
    <input type="hidden" name="role" value="<?php echo $role ?>">

    <div class="input-container">
        <label for="input1">Tác vụ</label>
        <textarea name = "input2" type="text" rows="5" style="width: 640px; height: 90px" readonly><?php echo $task['TacVu'] ?></textarea>
    </div>
  
    <div class="input-container">
        <label for="input2">Câu trả lời</label>
        <textarea id="input2" name = "input2" type="text" rows="5" style="width: 640px; height: 50px" placeholder="Kết quả nhãn ghi..."></textarea>
    </div>
    <button id="submitbutton" class="submit-button" type="submit" name="labeling">GÁN NHÃN</button>
  </form>
  
  </div>
  <?php } elseif  ($action=="update") {
    
    $idnguoidung = $_GET['idnguoidung'];
    $idKQNG = $_GET['idKQNG'];
    $role=$_GET['role'];
    $idDuAn=$_GET['id'];
    
    $taskController1 = new TaskController();
   $KQNG=$taskController1->getDataFromKetQuaNhanGhi_Controller($idKQNG);
  //  echo "<h1>$KQNG['KetQua']</h1>";
   
   
    ?>
    <div class="label-form">
   <form method = "post" class="labeling-form" action = "../Controller/Task.php" name="update_labeling_2"> 
   
    
    <input type="hidden" name="idKQNG" value="<?php echo $idKQNG ?>">
    <input type="hidden" name="idnguoidung" value="<?php echo $idnguoidung ?>">
    <input type="hidden" name="role" value="<?php echo $role ?>">
    <input type="hidden" name="id_duan" value="<?php echo $idDuAn ?>">
    <div class="input-container">
        <label for="input1">Kết Quả Hiện Tại</label>
        <textarea name = "input2" type="text" rows="5" style="width: 640px; height: 90px" readonly><?php if (isset($KQNG['KetQua'])) { echo $KQNG['KetQua']; }  ?></textarea>
    </div>
  
    <div class="input-container">
        <label for="input2">Câu trả lời</label>
        <textarea id="input2" name = "input2" type="text" rows="5" style="width: 640px; height: 50px" placeholder="Kết quả nhãn ghi..."></textarea>
    </div>
    <button id="submitbutton" class="submit-button" type="submit" name="labeling_update_1">CẬP NHẬT KẾT QUẢ</button>
  </form>
  
  </div>

  <?php }?>




</body>
</html>


<!-- <script>
  var searchParams = new URLSearchParams(url.search);
  action=searchParams.get('action');
document.getElementById("submitbutton").addEventListener("click",function(){
  if(action=="update"){
  // xử lý khi dùng để update dữ liệu kết quả nhãn ghi
  var xhr = new XMLHttpRequest();
xhr.open('POST', '../Controller/Task.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    console.log(xhr.responseText);
  }
};
   
ketqua=document.getElementById("input2").value;

// Lấy giá trị của tham số idDuAn
var idnguoidung = searchParams.get('idnguoidung');
var idKQNG=searchParams.get('idKQNG');

// Chuyển đổi danh sách ID thành chuỗi JSON và gửi đi
var data_idnguoidung = JSON.stringify(idnguoidung);
var data_idkqng=JSON.stringify(idKQNG);
var data_ketqua=ketqua;
xhr.send('data_idnguoidung=' + encodeURIComponent(data_idnguoidung)+'&data_idkqng=' + encodeURIComponent(data_idkqng)
+'&data_ketqua=' + encodeURIComponent(data_ketqua)
);

  }

})
</script> -->