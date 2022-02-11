
<?php
    $message ='';
    if (isset($_POST['title'])){
        $taskinfo = array(
            'title' => $_POST['title'],
            'mota' => $_POST['mota'],
            'time' => date("d/m/Y", strtotime($_POST['time'])),
            'idnv' => $_POST['employ'],
            'room' => $_POST['room'],
            'status' => 'New',
        );
        $task = new TaskModel();
        $result = $task->newtask($taskinfo);
        $message = $result['message'];
        if (!$result['code']){
            header('Location: ?controller=task&action=showTasks');    
        }
        
    }
?>
<form class="center" method="POST">

    <table>
        <!---row2--->
        <tr>
            <td><div>Tiêu đề</div></td>
            <td><input type="text" required name="title"></td>
        </tr>

        <tr >
            <td><div>Mô tả</div></td>
            <td><input type="text" required name="mota"></td>
        </tr>

        <tr >
            <td><div>Deadline</div></td>
            <td><input type="date" required name="time"></td>
        </tr>
        <!---row5--->
        <tr >
            <td><div>Nhân Viên</div></td>
            <td>
                <select name="employ">
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
                <input hidden name="room" value="<?=@$_POST['room']?>">
                <input type="Submit">
            </td>
        </tr>
    </table>
</form>