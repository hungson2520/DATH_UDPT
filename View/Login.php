<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
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

          <a style="transform: translateY(10px);"  href="../View/RegisterView.php"><button style="padding: 10px 20px;background-color: white;color:#428bca;" class="btn_LOGIN">Đăng Ký</button></a>
        </div>
      </ul>
    </nav>
    <div class="container">
      <form class="login-form" method="post" action="../Controller/index.php" name="login" >
        <h2>Đăng Nhập</h2>

        <input class="user" type="text" placeholder="Username" name="username" required />

        <input
        class="pass"
          type="password"
          placeholder="Password"
          name="password"
          required
        />

        <button type="submit" name="login">Đăng Nhập</button>
      </form>
    </div>
  </body>
</html>

<script>
<<<<<<< Updated upstream
const params = new URLSearchParams(window.location.search);
if (params.has('error')) {
  const error = decodeURIComponent(params.get('error'));
  alert("Thông Tin Đăng Nhập Không Chính Xác!");
  params.delete('error'); // Xóa tham số 'error' khỏi URL
  const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
}


</script>
=======

  // Mục đích của dòng này là để show thông báo lỗi ra
  if (typeof URLSearchParams !== 'undefined' && window.location.search) {
    const params = new URLSearchParams(window.location.search);
    if (params.has('error'))
     {
      // Lấy giá trị biến error từ URL và giải mã URL
      const error = decodeURIComponent(params.get('error'));
      // Hiển thị thông báo lỗi
      alert("Thông Tin Đăng Nhập Không Chính Xác!");
      params.delete('error');
      const newUrl = `${window.location.pathname}?${params.toString()}`;
  window.history.replaceState({}, '', newUrl);
      
    }
  }


</script>

>>>>>>> Stashed changes
