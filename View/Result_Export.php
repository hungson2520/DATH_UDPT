<?php
require_once '../Controller/Result_Export_Controller.php';
require_once '../Controller/Project_Controller.php';
$projectController = new ProjectController();
$result1= new Result_export_controller();
$projectController = new ProjectController();

if(isset($_GET['idDuAn'])&& isset($_GET['role']))
{ 

  $idnguoidung =$_GET['id'];
  $idDuAn= $_GET['idDuAn'];
  $role=$_GET['role'];
  $type=$result1->CheckTypeProject_Controller($idDuAn);
  $duAn = $projectController->getProject($idDuAn);
  $tenDuAn = $duAn['tenDuAn'];
  // 3 5 6
$filterResult = [];
  if($type==1){
  
  $KetQua1 = $result1->ShowResultProject_Controller($idDuAn);
  }
  // 1 2 4 
  elseif($type==2){
    $KetQua1=$result1->ShowResultProject_Type2_Controller($idDuAn);
    
  }
  $duAn = $projectController->getProject($idDuAn);
  $loaiDuan = $duAn['ID_LoaiDuAn'];
  foreach ($KetQua1 as $KQ) {
    if ($KQ['ID_NguoiDung'] == $idnguoidung) {
        $filterResult[] = $KQ;
    }
  }
  if($role==1)
  {
    $KetQua=$filterResult;
  }
  else
  {
    $KetQua=$KetQua1;
  }
}
// 3 5 6: gán nhãn ghi.php
// 1 2 :gannhan.php
//4:gannhanthucthe
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TRANG RESULT EXPORT .HTML</title>
    <link rel="stylesheet" href="./CSS/Result_Export.css" />
    <script
      src="https://kit.fontawesome.com/901acbd329.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <input type="hidden" name="role" value="<?php echo $role ?>">
    <nav class="navigation">
      <ul class="nav_ul">
        <div class="nav_ul_left">
          <li><i class="fa-solid fa-bars"></i></li>
          <li style="width:250px;color:white">Nhóm 1 Ứng Dụng Phân Tán</li>
        </div>
        <div class="nav_ul_right">
          <li style="width: 200px;color:yellow" >
          Role: <?php if ($role == 1) {
    echo " Người gán nhãn cấp 1";
} elseif ($role == 2) {
    echo " Người gán nhãn cấp 2";
} elseif ($role == 3) {
    echo "Quản lý";
} ?> 
        
        </li>
          <li><i class="fa-solid fa-sun"></i></li>

          <li>ENV<i class="fa-sharp fa-solid fa-caret-down"></i></li>
          <li>PROJECTS</li>
         
        </div>
      </ul>
    </nav>
    <h1 style="margin-Left:560px;color:green;">Kết quả của dự án :<?php echo  $tenDuAn ?></h1>

    <?php 
  

if ($type == 1) {
    // 3 5 6
  ?>
    <div class="table-container">
    <table class="table">
  <thead>
    <tr>
      <th style="width: 15%;">Tên Người Dùng</th>
      <th style="width: 15%;">Tên Dự Án</th>
      <th style="width: 15%;">Tên Loại Dự Án</th>
      <th style="width: 15%;">Tác Vụ</th>
      <th style="width: 15%;">Kết Quả</th>
      <?php if($role>1) {?>
      <th style="width: 15%;">Sửa Kết Quả</th>
      <?php }?>
    </tr>
  </thead>
  <tbody>
  <?php if (!empty($KetQua)): ?>
            <?php foreach ($KetQua as $KQ): ?>
    <tr>
      <td><?php echo $KQ['Ten']; ?></td>
      <td><?php echo $KQ['TenDuAn']; ?></td>
      <td><?php echo $KQ['TenLoai']; ?></td>
      <td><?php echo $KQ['TacVu']; ?></td>
      <td><?php echo $KQ['ketqua']; ?></td>
      <?php if($role>1) {?>
      <th><a class="edit" href="../View/GanNhanGhi.php?action=update&id=<?php echo $idDuAn?>&role=<?php echo $role?>&idnguoidung=<?php echo $idnguoidung?>&idLoaiDuAn=<?php echo $loaiDuan ?>&idKQNG=<?php echo $KQ['ID_KetQuaNhanGhi']; ?>">Sửa</a></th>
      <?php }?>
    </tr>

    <?php endforeach; ?>
  

    </div>
    <?php else: ?>
                <tr>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                </tr>
                <?php endif; ?>
              </tbody>


              </table>

<?php } 
elseif ($type == 2) { ?>

<!-- Loại Dự Án 3 5 6  -->


<div class="table-container">
    <table class="table">
  <thead >
    <tr>
    <th style="width: 10%;">Tên Loại Dự Án</th>
      <th style="width: 10%;">Tên Dự Án</th>
    <th style="width: 10%;">Tác Vụ</th>
      <th style="width: 10%;">Nhãn</th>
      <th style="width: 10%;">Tên Người Làm</th>
      <th style="width: 10%;">Từ Ngữ Thực Thể</th>
      <?php if($role>1) {?>
      <th style="width: 10%;">Sửa Kết Quả</th>
      <?php }?>

     
     
    </tr>
  </thead>
  <tbody>
  <?php if (!empty($KetQua)): ?>
            <?php foreach ($KetQua as $KQ): ?>
    <tr>
      <td><?php echo $KQ['TenLoai']; ?></td>
      <td><?php echo $KQ['tenDuAn']; ?></td>
      <td><?php echo $KQ['TacVu']; ?></td>
      <td><?php echo $KQ['Nhan']; ?></td>
      <td><?php echo $KQ['Ten']; ?></td>
      <td><?php echo $KQ['TuNgu']; ?></td>
      <?php if($role>1) {?>
      <th><a class="edit" href="../View/GanNhan.php?action=update&id=<?php echo $idDuAn?>&role=<?php echo $role?>&idnguoidung=<?php echo $idnguoidung?>&idLoaiDuAn=<?php echo $loaiDuan ?>&idKQN=<?php echo $KQ['ID_KetQuaNhan']; ?>&idTacVu=<?php echo $KQ['ID_TacVu']; ?>">Sửa</a></th>
      <?php }?>
    </tr>

    <?php endforeach; ?>
  

    </div>
    <?php else: ?>
                <tr>
                <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                  <td style="text-align: center">Không có tác vụ nào</td>
                </tr>
                <?php endif; ?>
              </tbody>


              </table>


<?php } ?>

           
</div>
<?php if($role>2) {?>
<button id="exportBtn">Xuất kết quả</button>
<?php }?>
<div id="formContainer" style="display: none;">
  <form id="exportForm" >
    <input type="text" id="fileNameInput" placeholder="Nhập vào tên file">
    <button id="submitForm" name="submitName" >Submit</button>
  </form>

  </body>



  <script>
  document.getElementById('exportBtn').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    formContainer.style.display = 'block';
    console.log("export btn click");
  });

  document.getElementById('submitForm').addEventListener('click', function(event) {
    event.preventDefault();
   // var formContainer = document.getElementById('formContainer');
   
   console.log("submit form đc click");
   setTimeout(function(){
    var fileNameInput = document.getElementById('fileNameInput');
  var fileName = fileNameInput.value;
  console.log(fileNameInput)
  console.log("chạy vô setTimeOut");
  console.log("tên file là : ",fileName);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../Controller/Result_Export_Controller.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

var urlParams = new URLSearchParams(window.location.search);
var idDuAn = urlParams.get('idDuAn');

var data_TenFile = JSON.stringify(fileName);
var dataID_DuAn =JSON.stringify(idDuAn);
xhr.send('data_TenFile=' + encodeURIComponent(data_TenFile)+'&idDuAn=' + encodeURIComponent(dataID_DuAn))
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    console.log(xhr.responseText);
    console.log(xhr);
  }

setTimeout(function(){
  var formContainer = document.getElementById('formContainer');
    formContainer.style.display = 'none';},100)
};
     
     
// Chuyển đổi danh sách ID thành chuỗi JSON và gửi đi
;


   },500)
  
  
   

    
   
  });


  if (typeof URLSearchParams !== 'undefined' && window.location.search) {
    const params = new URLSearchParams(window.location.search);
    if (params.has('success_xuatfile'))
     {
      // Lấy giá trị biến error từ URL và giải mã URL
      const error = decodeURIComponent(params.get('error'));
      // Hiển thị thông báo lỗi
      alert("Đã Tải xuống file rồi!");
      params.delete('success_xuatfile');
      const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
      
    }
  }




</script>
<script>
var url_gannhan = window.location.href;
var searchParams = new URLSearchParams(url_gannhan);
var msgValue = searchParams.get("lmsg"); 
console.log(searchParams);

var msg = msgValue || "";
  if(msg!=""){
    if(msg=="success")
    {
      alert("Cập nhật nhãn thành công");
      const params = new URLSearchParams(window.location.search);
      const error = decodeURIComponent(params.get('lmsg'));
      params.delete('lmsg'); // Xóa tham số 'error' khỏi URL
      const newUrl = `${window.location.pathname}?${params.toString()}`;
      window.history.replaceState({}, '', newUrl);
    }
    else
    {
      alert("Cập nhật thất bại");
      const params = new URLSearchParams(window.location.search);
      const error = decodeURIComponent(params.get('lmsg'));
      params.delete('lmsg'); // Xóa tham số 'error' khỏi URL
      const newUrl = `${window.location.pathname}?${params.toString()}`;
      window.history.replaceState({}, '', newUrl);
    }
    searchParams.delete("msg");
  } 
  else 
  {
    console.log("Không tìm thấy URL trong chuỗi");
  }
  </script>

<script>
var url_gannhan = window.location.href;
var searchParams = new URLSearchParams(url_gannhan);
var msgValue = searchParams.get("lmsg_2"); 
console.log(searchParams);

var msg = msgValue || "";
  if(msg!=""){
    if(msg=="success")
    {
      alert("Cập nhật nhãn thành công");
      const params = new URLSearchParams(window.location.search);
      const error = decodeURIComponent(params.get('lmsg_2'));
      params.delete('lmsg_2'); // Xóa tham số 'error' khỏi URL
      const newUrl = `${window.location.pathname}?${params.toString()}`;
      window.history.replaceState({}, '', newUrl);
    }
    else
    {
      alert("Cập nhật thất bại");
      const params = new URLSearchParams(window.location.search);
      const error = decodeURIComponent(params.get('lmsg_2'));
      params.delete('lmsg_2'); // Xóa tham số 'error' khỏi URL
      const newUrl = `${window.location.pathname}?${params.toString()}`;
      window.history.replaceState({}, '', newUrl);
    }
    searchParams.delete("msg");
  } 
  else 
  {
    console.log("Không tìm thấy URL trong chuỗi");
  }
  </script>