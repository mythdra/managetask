<?php
    $message = '';
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $controller = new LoginController();
        $controller->Checklogin();
        $message = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    
?>


<div class="center">
    <h1>Login</h1>
    <form method="post">
        <div class="txt_field">
            <input required="required" minlength="6" type="username" class="form-control" id="user" name="username">
            <span></span>
            <label>Username</label>
        </div>
        <div class="txt_field">
            <input required="required" minlength="6" type="password" class="form-control" id="pwd" name="password">
            <span></span>
            <label>Password</label>
        </div>
        <?php echo ($message != '')? '<td colspan="3">'. $message . '</td>' : '<td colspan="3" id="hide"></td>' ?>
        <br>
        <br>
        <input type="submit" value="Login">
        <br>
        <br>
        <br>
    </form>
</div>