
<!DOCTYPE html>
<html>
<head>
  <title>Trang web với các ô nhập kích cỡ lớn</title>
  
  <style>
    .input-container {
      margin-bottom: 10px;
    }
    .input-container input {
      width: 300px;
      height: 50px;
      font-size: 18px;
      padding: 10px;
    }
    .submit-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>
  
  <form method = "post" class="labeling-form" action = "../Controller/Task.php" name="labeling">
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
        <label for="input1">Input 1:</label>
        <input type="text" style="width: 700px; height: 150px" readonly value="<?php echo $task['TacVu'] ?>">
    </div>
  
    <div class="input-container">
        <label for="input2">Input 2:</label>
        <input type="text" style="width: 700px; height: 150px" id="input2" name="input2" placeholder="Kết quả nhãn ghi...">
    </div>
    <button class="submit-button" type="submit" name="labeling">Submit</button>
  </form>
</body>
</html>