
<?php
    $message ='';
    if (isset($_POST['name'])){
        $roominfo = array(
            'name' => $_POST['name'],
            'mota' => $_POST['mota'],
            'count' => $_POST['count'],
            'manager' => $_POST['manager']
        );
        $room = new RoomModel();
        $result = $room->newroom($roominfo);
        $message = $result['message'];
        if (!$result['code']){
            header('Location: ?controller=room&action=showRooms');    
        }
        
    }
?>
<form class="center" method="POST">

    <table>
        <!---row2--->
        <tr>
            <td><div>Tên phòng</div></td>
            <td><input type="text" required name="name"></td>
        </tr>

        <tr >
            <td><div>Mô tả</div></td>
            <td><input type="text" required name="mota"></td>
        </tr>

        <tr >
            <td><div>Số lượng phòng</div></td>
            <td><input type="number" required name="count"></td>
        </tr>
        <!---row5--->
        <tr >
            <td><div>Quản lí</div></td>
            <td>
                <select name="manager">
                <option value="-1" default>Chưa Cập Nhật</option>
                <?php
                    while($row = $user->fetch_assoc()){
                        echo '<option value="'. $row['id'] . '">' . ($row['name']) . '</option>';
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