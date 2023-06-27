<?php

$role = $_GET['role'];


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nhóm 1: Ứng Dụng Phân Tán</title>
    <script
      src="https://kit.fontawesome.com/901acbd329.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navigation">
      <ul class="nav_ul">
        <div class="nav_ul_left">
          <li><i class="fa-solid fa-bars"></i></li>
          <li>Test</li>
        </div>
        <div class="nav_ul_right">
          <li style="width: 200px;color:yellow"> Role: <?php if ($role == 1) {
    echo " Người gán nhãn cấp 1";
} elseif ($role == 2) {
    echo " Người gán nhãn cấp 2";
} elseif ($role == 3) {
    echo "Quản lý";
} ?> </li>
          <li><i class="fa-solid fa-sun"></i></li>

          <li>ENV<i class="fa-sharp fa-solid fa-caret-down"></i></li>
          <li>PROJECTS</li>
         
          <li><i class="fa-solid fa-bars"></i></li>
          <li></li>
        </div>
      </ul>
    </nav>

    <div class="NavContent">
      <div class="NavContent_left">
        <button class="NavContent_Left_Btn">
          <i class="fa-regular fa-circle-play"></i>Start Annovation
        </button>
        <ul class="NavContent_Left_ul">
          <li class="NavContent_Left_li">
            <i class="fa-solid fa-house icon"></i>Home
          </li>
          <li  class="NavContent_Left_li dataset">
            <i class="fa-solid fa-database icon"></i>Dataset
          </li>
          <li class="NavContent_Left_li">
            <i class="fa-solid fa-tag icon"></i>Label
          </li>
          <li class="NavContent_Left_li">
            <i class="fa-solid fa-user icon"></i>
            Members
          </li>
          <li class="NavContent_Left_li">
            <i class="fa-solid fa-book-open-reader icon"></i>Guideline
          </li>
          <li class="NavContent_Left_li">
            <i class="fa-solid fa-chart-simple icon"></i>Statistics
          </li>
        </ul>
      </div>
      <div class="NavContent_right">
        <div class="NavContent_right_btn">
          <button class="NavContent_Left_Btn" style="width: 100px">
            Action
            <i class="fa-sharp fa-solid fa-caret-down"></i>
          </button>
          <button
            style="
              width: 80px;
              border-radius: 5px;
              padding: 5px 10px;
              cursor: pointer;
            "
          >
            Detail
          </button

    
        >
        <div class="NavContent_right_search">
          <div class="NavContent_right_search_top">
         <i class="fa-solid fa-magnifying-glass"></i>Search
          </div>
          <div class="NavContent_right_search_top_left">
            <table class="table">
              <thead>
                <tr >
                  <!-- <th><input type="checkbox" id="checkbox-all"></th> -->
                  <th class="text-header">ID</th>

                  <th>Text</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <td><input type="checkbox"></td>
                  <td>Row 1</td>
                  <td> <button class="NavContent_Left_Btn" style="width: 100px">
                    Annotate
                   
                  </button></td>
                </tr>
                <tr>
                  <td><input type="checkbox"></td>
                  <td>Row 2</td>
                 
                  <td><button class="NavContent_Left_Btn" style="width: 100px">
                    Annotate
                   
                  </button></td>
                </tr>
                <tr>
                  <td><input type="checkbox"></td>
                  <td>Row 3</td>
                  
                  <td><button class="NavContent_Left_Btn" style="width: 100px">
                    Annotate
                   
                  </button></td>
                </tr>
                <tr>
                  <td><input type="checkbox"></td>
                  <td>Row 4</td>
                  
                  <td><button class="NavContent_Left_Btn" style="width: 100px">
                    Annotate
                   
                  </button></td>
                </tr> -->
                <?php
            // Đường dẫn tới file Controller
            require_once '../Controller/Task.php';

            // Khởi tạo đối tượng của Controller
            $taskController = new TaskController();

            // Gọi phương thức lấy tất cả các tasks
            $tasks = $taskController->getAllTasks();

            
            ?>
            
            <?php foreach ($tasks as $task): ?>
                    <tr>
                        
                        <td><?php echo $task['ID_TacVu']; ?></td>
                        <td><?php echo $task['TacVu']; ?></td>
                        <td class="actionLinks">
                        <a href="../View/GanNhanGhi.php?action=view&id=<?php echo $task['ID_TacVu']; ?>">OK</a>
                      
                        </td>
                    </tr>
            <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="NavContent_Right_bottom">
          Rows Per Page
          <select>
            <!-- <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option> -->
            <option selected value="10">10</option>
          </select>
          1-4 of 4
          <div class="Nav_bottom_icon">
            <i class="fa-solid fa-angles-left"></i>
            <i class="fa-solid fa-arrow-left"></i>
            <i class="fa-solid fa-arrow-right"></i>
            <i class="fa-solid fa-angles-right"></i>

          </div>
         
        </div>
      </div>
    </div>
    <div></div>
  </body>
  <script src="./index.js"></script>
  
  <link rel="stylesheet" href="./CSS/Labeling.css" />
</html>

<style>
        .NavContent_Left_li {
            cursor: pointer;
        }
        .selected {
            background-color: yellow;
        }
        
        
    </style>
<script>
       
   // khi ấn vô li data set thì nội dung ở bên phải sẽ thay đổi
   // Nếu ta không ấn vô thẻ li khác thì nội dung sẽ được giữ nguyên
   

   
  
        document.addEventListener('DOMContentLoaded', function() {
    var datasetLi = document.querySelector('.dataset');
    var contentRight = document.querySelector('.NavContent_right');
    var originalContent = contentRight.innerHTML;

    var navItems = document.querySelectorAll('.NavContent_Left_li');
    var urlParams = new URLSearchParams(window.location.search);
var ID_DuAn = urlParams.get('ID_DuAn');

    datasetLi.addEventListener('click', function() {
        contentRight.innerHTML=`<form action="../Controller/index.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="ID_DuAn" value="${ID_DuAn}">
        <h1 style="margin-left:200px;margin-top:200px">Choose a file txt in here: <input type="file" name="file" accept="text/plain"></h1>
        <input style="margin-left:400px"  type="submit" name="SubmitUploadFile">
    </div>
</form>`;
        
        var fileInput = document.querySelector('input[type="file"]');
        fileInput.addEventListener('change', function(event) {
            var selectedFile = event.target.files[0];
            console.log(selectedFile); // In ra thông tin của file được chọn
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                var fileContent = event.target.result;
                console.log(fileContent); // In ra nội dung của file
            };
            fileReader.readAsText(selectedFile);
        });
    });

    for (var i = 0; i < navItems.length; i++) {
        navItems[i].addEventListener('click', function() {
            if (!this.classList.contains('dataset')) {
                contentRight.innerHTML = originalContent;
            }
        });
    }
});





        document.addEventListener('DOMContentLoaded', function() {
  var navItems = document.querySelectorAll('.NavContent_Left_li');

  // Đặt màu nền mặc định cho thẻ li đầu tiên
  navItems[0].style.backgroundColor = 'yellow';

  for (var i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', function() {
      // Xóa màu nền của tất cả các thẻ li
      for (var j = 0; j < navItems.length; j++) {
        navItems[j].style.backgroundColor = '';
      }
     
      // Đặt màu nền màu vàng cho thẻ li được click
    //  this.style.innerHTML='<h1 style="margin-left:200px;margin-top:200px">Choose a file txt in here: <input type="file" accept="text/plain"></h1>';
      this.style.backgroundColor = 'yellow';
    
      
    });
  }
});
        
    </script>

