
<?php
    $message ='';
    if (isset($_POST['username'])){

        $accinfo = array(
            'username' => $_POST['username'],
            'name' => $_POST['name'],
            'birthday' => date("d/m/Y", strtotime($_POST['birthday'])),
            'gender' => $_POST['gender'],
            'room' => $_POST['room']
        );
        $user = new UserModel();
        $result = $user->newaccount($accinfo);
        $message = $result['message'];
        if(!$result['code']){
            header('Location: ?controller=account&action=showEmpls');
        }
        
    }
?>
<form class="center" method="POST">

    <table>
        <!---row2--->
        <tr>
            <td><div>Tên</div></td>
            <td><input type="text" required name="name"></td>
        </tr>

        <!---row3--->
        <tr>
            <td><div>Ngày sinh</div></td>
            <td><input type="date" name="birthday"></td>
        </tr>

        <!---row4--->
        <tr >
            <td><div>Tên đăng nhập</div></td>
            <td><input type="text" required name="username"></td>
        </tr>

        <!---row6--->
        <tr >
            <td><div>Giới tính</div></td>
            <td>
                
                <input type="radio" name="gender" required value="male">Male
                <input type="radio" name="gender" value="female">Female
            </td>
        </tr>

        <tr >
            <td><div>Phòng</div></td>
            <td>
                <select name="room">
                <?php 
                    $room = new RoomModel();
                    $result = $room->getRooms();
                    while ($row = $result->fetch_assoc()){
                        echo "<option value='". $row['name'] ."'>". $row['name'] ."</option>";
                    }
                ?>

            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div><?=@$message?></div>
            </td>
        </tr>
        <!---row8--->
        <tr>
            <td colspan="2">
                <input type="Submit">
            </td>
        </tr>
    </table>
</form>