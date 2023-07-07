<!DOCTYPE html>
<html>
  <head>
    <title>Đăng Ký Tài Khoản</title>
    <link rel="stylesheet" href="./CSS/Login.css" />
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
          <li style="width:250px;">Nhóm 1 Ứng Dụng Phân Tán</li>
        </div>
        <div class="nav_ul_right">
          <li><i class="fa-solid fa-sun"></i></li>

          <li>ENV<i class="fa-sharp fa-solid fa-caret-down"></i></li>

          <a style="transform: translateY(10px);" href="../View/Login.php"><button  style="padding: 10px 20px;background-color: white;color:#428bca;" class="btn_LOGIN">Đăng Nhập</button></a>
        </div>
      </ul>
    </nav>
    <div class="container">
      <form class="login-form" method="post" action="../Controller/index.php" name="register" >
        <h2>Đăng Ký Tài Khoản</h2>

        <input type="text" placeholder="Tên Người Dùng" name="name" required />
        <input type="text" placeholder="Số điện Thoại/Tên Đăng Nhập" name="phone" required />
        <input type="text" placeholder="Địa Chỉ" name="address" required />
        <input
          type="password"
          placeholder="Password"
          name="password"
          required
          id="password"
        />
        <input
          type="password"
          placeholder="Nhập lại Password"
          name="confirm_password"
          required
          onblur="checkPassword()"
          id="confirm_password"
        />


        <button type="submit" name="register" id="btn">Đăng Ký Tài Khoản</button>
      </form>
    </div>
  </body>
</html>
<script>
      function checkPassword() {
        var password = document.getElementById("password").value;
        console.log("password",password);
        var confirm_password = document.getElementById("confirm_password").value;
   console.log("confirm_password",confirm_password);
        if (password !== confirm_password) {
            
          alert("Mật Khẩu không khớp")
        } else {
         console.log("Nhập Đúng MK RỒI");
        }
      }


<<<<<<< Updated upstream

      

const params = new URLSearchParams(window.location.search);
if (params.has('error')) {
  const error = decodeURIComponent(params.get('error'));
  alert("Đã Tồn Tại Tài Khoản!");
  params.delete('error'); // Xóa tham số 'error' khỏi URL
  const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
}
const params2 = new URLSearchParams(window.location.search);
if (params2.has('success')) {
  const error = decodeURIComponent(params2.get('success'));
  alert("Tạo Tài Khoản Thành Công!");
  params.delete('success'); // Xóa tham số 'error' khỏi URL
  const newUrl = `${window.location.pathname}?${params2.toString()}`;
  window.history.replaceState({}, '', newUrl);
}


=======
       // Mục đích của dòng này là để show thông báo lỗi ra
  if (typeof URLSearchParams !== 'undefined' && window.location.search) {
    const params = new URLSearchParams(window.location.search);
    if (params.has('error'))
     {
      // Lấy giá trị biến error từ URL và giải mã URL
      const error = decodeURIComponent(params.get('error'));
      // Hiển thị thông báo lỗi
      alert("Tên đăng nhập đã tồn tại rồi!");
      params.delete('error');
      const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
      
    }
    if (params.has('success'))
     {
      // Lấy giá trị biến error từ URL và giải mã URL
      const error = decodeURIComponent(params.get('success'));
      // Hiển thị thông báo lỗi
      alert("Bạn đã đăng ký tài khoản thành công rồi!");
      params.delete('success');
      const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
      
    }
  }




  if (typeof URLSearchParams !== 'undefined' && window.location.search) {
    const params = new URLSearchParams(window.location.search);
    if (params.has('success_xuatfile'))
     {
      // Lấy giá trị biến error từ URL và giải mã URL
      const error = decodeURIComponent(params.get('success_xuatfile'));
      // Hiển thị thông báo tải xuống thành công
      alert("Đã tải xuống file thành công!");
      params.delete('success_xuatfile');
      const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
      
    }
  }
>>>>>>> Stashed changes

    </script>
