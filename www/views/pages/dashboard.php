<div class="col-sm-2 sidenav hidden-xs">
  <h2>DashBoard</h2>
  <h4><?=@$username?></h4>
  <ul class="nav nav-pills nav-stacked">
    <li><a href="?controller=home&action=index">Trang chủ</a></li>    
    <?php
      foreach($menu as $key){
        echo "<li><a href=?controller=". $key['controller']. "&action=" . $key['action'] . '>' . $key["data"] . "</a></li>";
      };
    ?>
    <li><a href="?controller=account&action=changepass">Thay đổi mật khẩu</a></li>
    <li><a href="?controller=account&action=showinfo">Thông tin cá nhân</a></li>
    <li><a href="?controller=account&action=logout">Đăng xuất</a></li>
  </ul><br>
</div>