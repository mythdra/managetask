<?php    
    $message ='';
    if (isset($_POST['name'])){
        $result = (new RoomModel())->getRoomByName($_POST['name']);
        $room = $result['message'];
        $user = new UserModel();
        $getuser = $user->getUserById($room['manager']);
        if ($getuser['message'] != null){
            $username = $getuser['message']['name'];
        } else {
            $username = '';
        }
    }
    if (isset($_POST['nameN'])){

        $roominfo = array(
            'name' => $_POST['nameN'],
            'mota' => $_POST['motaN'],
            'count' => $_POST['countN'],
            'manager' => $_POST['managerN'],
            'id' => $_POST['id'],
        );
        $roomM = new RoomModel();
        $result = $roomM->updateRoom($roominfo);
        $user = new UserModel();
        $user->updateType($_POST['manager'], 'nv');
        $user->updateType($_POST['managerN'], 'qly');
        $user->updateRoom($_POST['nameO'], $_POST['nameN']);
        $message = $result['message'];
        if (!$result['code']){
            header('Location: ?controller=room&action=showRooms');    
        } else {
            
        }
    }

?>

    
<div class="container center">
    <form id="fChangeRoom" method="POST"></form>
    <table>
        <tr>
            <td colspan="3" class="title">Cập nhật thông tin phòng</td>
        </tr>

        <tr>
            <td>Tên phòng</td>
            <td colspan="2">
                <input form="fChangeRoom" required="required" type="text" class="form-control" value="<?=@$room['name']?>" name="nameN">
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td colspan="2">
                <input form="fChangeRoom" required="required" type="text" class="form-control" value="<?=@$room['mota']?>" name="motaN">
            </td>
        </tr>

        <tr>
            <td>Số lượng</td>
            <td colspan="2">
                <input form="fChangeRoom" required="required" type="number" class="form-control" value="<?=@$room['count']?>" name="countN">
            </td>
        </tr>

        <tr>
            <td>Quản lý</td>
            <td colspan="2">
                <select name="managerN" form="fChangeRoom" required="required" class="form-control">
                <option value="<?=@$room['manager']?>"> <?=@$username?> </option>
                <?php 
                    $user = new UserModel();
                    $result = $user->getUsersNotManager($_SESSION['username'], $room['name']);
                    while ($row = $result['message']->fetch_assoc()){
                        echo "<option value='". $row['id'] ."'>". $row['name'] ."</option>";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <?php echo $message ?>
        </tr>
        <tr>
            <input form="fChangeRoom" hidden name="id" value="<?=@$room['id']?>"></input>
            <input form="fChangeRoom" hidden name="manager" value="<?=@$room['manager']?>"></input>
            <input form="fChangeRoom" hidden name="nameO" value="<?=@$room['name']?>"></input>
            <td colspan="3">
                <button form="fChangeRoom" type="submit" class="btn btn-default">Submit</button>
            </td>
        </tr>
    </table>
</div>