<?php

$role = $_GET['role'];
$idNguoiDung=$_GET['idnguoidung'];
$idDuAn=$_GET['idDuAn'];
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
          <li style="width:200px;color:white">Nhóm 1: Ứng dụng Phân Tán</li>
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
          <li class="NavContent_Left_li label">
            <i class="fa-solid fa-tag icon"></i>Label
          </li>
          <li class="NavContent_Left_li member">
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
                  <th >ID</th>

                  <th class="text-header">Text</th>
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
            require_once '../Controller/Project_Controller.php';
            // Khởi tạo đối tượng của Controller
            $taskController = new TaskController();
            $projectController = new ProjectController();
            // Gọi phương thức lấy tất cả các <<<<<<< 

           
            $tasks = $taskController->getTaskProject($idDuAn);
            
            // liên kết tới Controller
            require_once '../Controller/User_Controller.php';

            // Khởi tạo đối tượng của UserController
            $UserController = new UserController();

            // Gọi phương thức lấy tất cả người dùng để phân công
            $phanCongNguoiDung = $UserController->ShowBangPhanCong_Controller();

            
            ?>
            
            <?php foreach ($tasks as $task): ?>
                    <tr>
                        
                        <td><?php echo $task['ID_TacVu']; ?></td>
                        <td><?php echo $task['TacVu']; ?></td>
                        <td class="LabelLinks">
                        <?php
                        $duAn = $projectController->getProject($idDuAn);
                            $loaiDuan = $duAn['ID_LoaiDuAn'];

                              if ($loaiDuan ==1 || $loaiDuan==4 || $loaiDuan==2) {
                        
                             $url = "../View/GanNhan.php?action=create&id=" . $task['ID_TacVu'] . "&idnguoidung=" . $idNguoiDung;
                              } else {
                          // URL cho trang href mặc định
                           $url = "../View/GanNhanGhi.php?action=create&id=" . $task['ID_TacVu'] . "&idnguoidung=" . $idNguoiDung;
                               }
                        ?>

                        <a href="<?php echo $url; ?>">Gán Nhãn</a>
                        <!-- <a href="../View/GanNhanGhi.php?action=view&id=<?php echo $task['ID_TacVu']; ?>&idnguoidung=<?php echo $idNguoiDung;?>">Gán Nhãn</a> -->
                      
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
   
   
   // Giao diện của DATASET 
   document.addEventListener('DOMContentLoaded', function() {
    var datasetLi = document.querySelector('.dataset');
    var navItems = document.querySelectorAll('.NavContent_Left_li');
   var contentRight = document.querySelector('.NavContent_right');
    var originalContent = contentRight.innerHTML;

   
    var urlParams = new URLSearchParams(window.location.search);
var ID_DuAn = urlParams.get('idDuAn');
// <input type="text" name="ID_DuAn" value="${ID_DuAn}">
    datasetLi.addEventListener('click', function() {
        contentRight.innerHTML=`<form action="../Controller/index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID_DuAn" value="${ID_DuAn}">
        <h1 style="margin-left:200px;margin-top:200px">Choose a file txt in here: <input type="file" name="file" accept="text/plain"></h1>
        <input style="margin-left:400px"  type="submit" name="SubmitUploadFile">
    </div>
</form>`;
console.log("giao diện dataset",contentRight.innerHTML);
        
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

/**-------------------------------Kết thúc Dataset -------------------------------*/

/**---------------------------- Bắt đầu MEMBER------------------------- ----------------- -------*/

// GIAO DIỆN MEMBER
var memberInformation = document.createElement("div");
  memberInformation.id = "memberInformation";
  memberInformation.innerHTML = `
    <h1 style="margin-left: 450px; color: green;">Phân Công</h1>
    <table>
      <thead>
        <tr>
          <th>ID_NguoiDung</th>
          <th>Tên Người Dùng</th>
          <th>Số điện Thoại</th>
          <th>Vai Trò</th>
          <th>Phân Công</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($phanCongNguoiDung as $pcnd): ?>
          <tr>
            <td><?php echo $pcnd['ID_NguoiDung']; ?></td>
            <td><?php echo $pcnd['Ten']; ?></td>
            <td><?php echo $pcnd['SDT']; ?></td>
            <td><?php echo $pcnd['TenVaiTro']; ?></td>
            <td><input class="PhanCongNguoiDung" type="checkbox" style="width: 20px; height: 20px;"></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <input type="submit" value="Save" id="saveButton_phancong">
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
        overflow: auto;
      }

      th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color: #f2f2f2;
      }

      input[type="checkbox"] {
        width: 20px;
        height: 20px;
      }

      input[type="submit"] {
        padding: 10px 20px;
        margin-left: 500px;
        margin-top: 20px;
        border-radius: 5px;
        cursor: pointer;
        background-color: darkgreen;
        color: white;
      }

      input[type="submit"]:hover {
        background-color: green;
      }
      tr:hover{
        background-color: gray;
        cursor:pointer;
      }
    </style>
  `;
  
  document.addEventListener('DOMContentLoaded', function() {
 
    var memberLi = document.querySelector('.member');
  var contentRight = document.querySelector('.NavContent_right');
  var navItems = document.querySelectorAll('.NavContent_Left_li');


    memberLi.addEventListener('click', function() {
   
      contentRight.innerHTML=memberInformation.innerHTML;

     
        for (var i = 0; i < navItems.length; i++) {
        navItems[i].addEventListener('click', function() {
            if (!this.classList.contains('member')) {
              console.log("navItem không chứa member");
                contentRight.innerHTML = originalContent;
            }
        });
    }
  });

  })


  var saveButton = document.getElementById('saveButton_phancong');





/**-------------------------------Kết thúc Member -------------------------------*/

/**---------------------------- Bắt đầu Label------------------------- ----------------- -------*/
  // GIAO DIỆN LABEL
  document.addEventListener('DOMContentLoaded', function() {
    var labelLi = document.querySelector('.label');
    var contentRight = document.querySelector('.NavContent_right');
    var originalContent = contentRight.innerHTML;


    labelLi.addEventListener('click', function() {
        contentRight.innerHTML=`<style>
    .table-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .create-button {
        background-color: #2ecc71;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .create-form {
      display: none;
        position: relative;
        background-color: #fff;
        padding: 10px;
        width: 200px;
    }
</style>

<div class="table-container">
    <button class="create-button" onclick="showCreateForm()">Create</button>

    <form class="create-form" id="createForm">
        <label for="labelName">Label Name:</label>
        <input type="text" id="labelName" name="labelName">
        <input type="submit" value="Submit">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID_Nhan</th>
                <th>tenNhan</th>
            </tr>
        </thead>
        <tbody>
            <!-- Thêm các hàng dữ liệu vào đây -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
            </tr>
            <!-- Các hàng dữ liệu khác -->
        </tbody>
    </table>

</div>




`;
});
});
function showCreateForm() {
        var form = document.getElementById('createForm');
        form.style.display = 'block';
    }

document.addEventListener('DOMContentLoaded', function() {
  var navItems = document.querySelectorAll('.NavContent_Left_li');

  // Đặt màu nền mặc định cho thẻ li đầu tiên
  navItems[0].style.backgroundColor = 'yellow';

  for (let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', function() {
      console.log("thẻ LI ĐƯỢC THẮP SÁNG LÀ ",i)
      // Xóa màu nền của tất cả các thẻ li khác
      for (let j = 0; j < navItems.length; j++) {
        
        navItems[j].style.backgroundColor = '';
        
      }
     
    
      this.style.backgroundColor = 'yellow';
      var saveButton = document.getElementById('saveButton_phancong');
     if(saveButton  &&  navItems[3].style.backgroundColor==='yellow');
 {
 
      console.log("navItem[3] có màu vàng nè");
      
      console.log("nút saveButton",saveButton);
      saveButton?.addEventListener('click', function() {
    // Lấy tất cả các ô checkbox trong bảng
    var checkboxes = document.querySelectorAll('.PhanCongNguoiDung');
    console.log("checkboxs là ",checkboxes);

    // Lưu trữ các ID_NguoiDung đã được chọn
    var selectedIDs = [];

    // Duyệt qua từng ô checkbox và kiểm tra xem có được chọn hay không
    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        // Nếu ô checkbox được chọn, lưu trữ ID_NguoiDung tương ứng
        var row = checkboxes[i].parentNode.parentNode;
        var idNguoiDung = row.cells[0].textContent;
        selectedIDs.push(idNguoiDung);
      }
    }
    var url = new URL(window.location.href);

// Lấy đối tượng URLSearchParams từ URL
var searchParams = new URLSearchParams(url.search);

// Lấy giá trị của tham số idDuAn
var idDuAn = searchParams.get('idDuAn');

console.log("id Du An là",idDuAn);
    // Dùng AJAX ĐỂ GỬI Các ID được chọn QUA PHP 
    var xhr = new XMLHttpRequest();
xhr.open('POST', '../Controller/index.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    console.log(xhr.responseText);
  }
};
      
// Chuyển đổi danh sách ID thành chuỗi JSON và gửi đi
var dataID_NguoiDung = JSON.stringify(selectedIDs);
var dataID_DuAn =JSON.stringify(idDuAn);
xhr.send('selectedIDs=' + encodeURIComponent(dataID_NguoiDung)+'&idDuAn=' + encodeURIComponent(dataID_DuAn));
    

    // Hiển thị các ID_NguoiDung đã được chọn
  
  });


     }
      
    });
  }
});
        
    </script>

