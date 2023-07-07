<?php
$idNguoiDung=$_GET['idnguoidung'];
$idLoaiDuAn=$_GET['idLoaiDuAn'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Trang web với các ô nhập kích cỡ lớn</title>
  
  <link rel="stylesheet" href="./CSS/GanNhanGhi.css" />
</head>
<body>
<?php
    if ($idLoaiDuAn == 1) {
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
        font-family: Cambria;
      }
      </style>
      <h1>PHÂN LOẠI VĂN BẢN</h1>';
    }elseif($idLoaiDuAn == 2){
      echo '<style>
      h1 {
        text-align: center;
        color: navy;
        font-family: Cambria;
      }
      </style>
      <h1>HỎI ĐÁP</h1>';
    }
  ?>
  <form method = "post" class="labeling-form" action = "../Controller/Task.php" name="labeling_2">
    <?php
        $idnguoidung = $_GET['idnguoidung'];
        $idtacvu = $_GET['id'];
        // Đường dẫn tới file Controller
        require_once '../Controller/Task.php';
            
        // Khởi tạo đối tượng của Controller
        $taskController = new TaskController();
        
        // Gọi phương thức lấy du lieu cua task
        $task = $taskController->getDatafromTacVu($idtacvu);
        // Gọi phương thức lấy tất cả các nhan cua task
        $labels = $taskController->getDataAndLabelOfTacVu($idtacvu);
    ?>
    
    <input type="hidden" name="idtacvu" value="<?php echo $idtacvu ?>">
    <input type="hidden" name="idnguoidung" value="<?php echo $idnguoidung ?>">

    <div class="input-container">
        <label for="input1">Tác vụ</label>
        <textarea name = "input2" type="text" rows="5" style="width: 640px; height: 90px" readonly><?php echo $task['TacVu'] ?></textarea>
    </div>

    
    

    <div class="form-group">
        <label for="Label">Nhãn</label>
        <select id="label_of_task" name="label_of_task" required>
            <option value="">-- Chọn nhãn cho tác vụ --</option>

            <?php
            foreach ($labels as $label) {
                echo '<option value="' . $label["ID_Nhan"] . '">' . $label["Nhan"] . '</option>';
            }
        ?>
            
        </select>
    </div>

    <button class="submit-button" type="submit" name="labeling_2">GÁN NHÃN</button>
  
    
    
  </form>
</body>
</html>