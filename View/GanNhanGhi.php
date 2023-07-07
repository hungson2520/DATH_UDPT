<?php
$idNguoiDung=$_GET['idnguoidung'];
$idLoaiDuAn=$_GET['idLoaiDuAn'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gán nhãn ghi</title>
  <link rel="stylesheet" href="./CSS/GanNhanGhi.css" />
</head>
<body>
  <?php
    if ($idLoaiDuAn == 5) {
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
      }
      </style>
      <h1> Gán nhãn câu trả lời của cặp câu hỏi và văn bản</h1>';
    }elseif($idLoaiDuAn == 3){
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
      }
      </style>
      <h1> DỊCH MÁY</h1>';
    }elseif($idLoaiDuAn == 6){
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
      }
      </style>
      <h1> TÌM CÂU HỎI ĐỒNG NGHĨA</h1>';
    }
  ?>
  <div class="label-form">
  <form method = "post" class="labeling-form" action = "../Controller/Task.php" name="labeling_2">
    <?php
        $idnguoidung = $_GET['idnguoidung'];
        $idtacvu = $_GET['id'];
        // Đường dẫn tới file Controller
        require_once '../Controller/Task.php';
            
        // Khởi tạo đối tượng của Controller
        $taskController = new TaskController();
        
        // Gọi phương thức lấy tất cả các tasks
        $task = $taskController->getDatafromTacVu($idtacvu);
    ?>
    
    <input type="hidden" name="idtacvu" value="<?php echo $idtacvu ?>">
    <input type="hidden" name="idnguoidung" value="<?php echo $idnguoidung ?>">
    <div class="input-container">
        <label for="input1">Tác vụ</label>
        <input type="text" style="width: 700px; height: 150px" readonly value="<?php echo $task['TacVu'] ?>">
    </div>
  
    <div class="input-container">
        <label for="input2">Câu trả lời của bạ</label>
        <input type="text" style="width: 700px; height: 150px" id="input2" name="input2" placeholder="Kết quả nhãn ghi...">
    </div>
    <button class="submit-button" type="submit" name="labeling">GÁN NHÃN</button>
  </form>
  </div>
</body>
</html>