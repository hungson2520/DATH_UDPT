<?php
$idNguoiDung=$_GET['idnguoidung'];
$idDuAn=$_GET['idDuAn'];
$role=$_GET['role'];
$idLoaiDuAn=$_GET['idLoaiDuAn'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gán nhãn thực thể</title>
  <link rel="stylesheet" href="./CSS/GanNhanGhi.css" />
</head>
<body>
  <h1>GÁN NHÃN THỰC THỂ</h1>
  <style>
      h1 {
        text-align: center;
        color: navy;
        font-size: 50px;
        font-family: Cambria;
      }
      </style>
  <form method = "post" class="labeling-form" action = "../Controller/Task.php" name="labeling_3">
    <?php
        $idnguoidung = $_GET['idnguoidung'];
        $idtacvu = $_GET['id'];
        // Đường dẫn tới file Controller
        require_once '../Controller/Task.php';
            
        // Khởi tạo đối tượng của Controller
        $taskController = new TaskController();
        
        // Gọi phương thức lấy tất cả các tasks
        $task = $taskController->getDatafromTacVu($idtacvu);

        $labels = $taskController->getDataAndLabelOfTacVu($idtacvu);
    ?>
    
    <input type="hidden" name="idtacvu" value="<?php echo $idtacvu ?>">
    <input type="hidden" name="idnguoidung" value="<?php echo $idnguoidung ?>">
    <input type="hidden" name="idDuAn" value="<?php echo $idDuAn ?>">
    <input type="hidden" name="idLoaiDuAn" value="<?php echo $idLoaiDuAn ?>">
    <input type="hidden" name="role" value="<?php echo $role ?>">

    <div class="input-container">
        <label for="input1">Tác vụ</label>
        <textarea name = "task" type="text" rows="5" style="width: 640px; height: 90px" readonly><?php echo $task['TacVu'] ?></textarea>
    </div>
  
    <div class="input-container">
        <label for="input2">Từ ngữ</label>
        <textarea name = "input2" type="text" rows="5" style="width: 640px; height: 50px" placeholder="Từ ngữ..."></textarea>
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

    <button class="submit-button" type="submit" name="labeling_3">GÁN NHÃN</button>
  </form>
</body>
</html>