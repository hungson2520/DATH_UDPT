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
          <li>Nhóm 1 UDPT</li>
        </div>
        <div class="nav_ul_right">
          <li><i class="fa-solid fa-sun"></i></li>

          <li>ENV<i class="fa-sharp fa-solid fa-caret-down"></i></li>

          <a href="../View/Login.php"><button class="btn_LOGIN">Đăng Nhập</button></a>
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
    </script>
