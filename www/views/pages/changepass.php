<?php    
    $message ='';
    
    function change(){
        if ($_POST['pwd'] == $_POST['cf_pwd']){
            if ($_SESSION['username'] != $_POST['pwd']){
                $model = new UserModel();
                $result = $model->changePass($_SESSION['username'], $_POST['pwd']);
                if (!$result['code']){
                    $_SESSION['changepass'] = false;
                    $_SESSION['password'] = $_POST['pwd'];
                    header('Location: index.php');
                }
            } else {
                return 'Mật khẩu mới không hợp lệ';
            }
        } else {
            return 'Mật khẩu không trùng khớp';
        }
    }

    if(isset($_POST['pwd']) && isset($_POST['cf_pwd'])){
        if (!empty($_POST['old_pwd'])){
            if ($_POST['old_pwd'] == $_SESSION['password']){
                change();
            } else{
                $message = 'Mật khẩu cũ không chính xác';
            }
        } else{
            print_r('asdasd');
            $message = change();
        }
    }
?>

    
<div class="container center">
    <form id="fChangePass" action="?controller=account&action=changepass" method="POST"></form>
    <table>
        <tr>
            <td colspan="3" class="title">NEW PASS</td>
        </tr>
        <tr class="<?=@ ($_SESSION['changepass'])? 'hide':'' ?>">
            <td>Old PassWord</td>
            <td colspan="2">
                <input form="fChangePass" <?=@ ($_SESSION['changepass'])? '':'required="required"' ?> minlength="6" type="password" class="form-control" placeholder="Enter Old Password" name="old_pwd">
            </td>
        </tr>
        <tr>
            <td>New PassWord</td>
            <td colspan="2">
                <input form="fChangePass" required="required" minlength="6" type="password" class="form-control" placeholder="Enter New Password" name="pwd">
            </td>
        </tr>
        <tr>
            <td>Re-Enter PassWord</td>
            <td colspan="2">
                <input form="fChangePass" required="required" minlength="6" type="password" class="form-control" placeholder="ReEnter Password" name="cf_pwd">
            </td>
        </tr>
        <tr>
            <?php echo ($message != '')? '<td colspan="3">'. $message . '</td>' : '<td colspan="3" id="hide"></td>' ?>
        </tr>
        <tr>
            <td colspan="3">
                <button form="fChangePass" type="submit" class="btn btn-default">Submit</button>
            </td>
        </tr>
    </table>
</div>