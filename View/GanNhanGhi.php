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
        <textarea name = "input2" type="text" rows="5" style="width: 640px; height: 90px" readonly><?php echo $task['TacVu'] ?></textarea>
    </div>
  
    <div class="input-container">
        <label for="input2">Câu trả lời</label>
        <textarea name = "input2" type="text" rows="5" style="width: 640px; height: 50px" placeholder="Kết quả nhãn ghi..."></textarea>
    </div>
    <button class="submit-button" type="submit" name="labeling">GÁN NHÃN</button>
  </form>
  </div>
</body>
</html>