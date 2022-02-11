<?php    
    $message ='';
    $getuser = $user->getUserById($info['manager']);
    if ($getuser['message'] != null){
        $username = $getuser['message']['name'];
    } else {
        $username = '';
    }
?>

    
<div class="container center">
    <form id="fChangeRoom" method="POST"></form>
    <table>
        <tr>
            <td colspan="3" class="title">Thông tin phòng</td>
        </tr>

        <tr>
            <td>Tên phòng</td>
            <td colspan="2">
                <?=@$info['name']?>
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td colspan="2">
                <?=@$info['mota']?>
            </td>
        </tr>

        <tr>
            <td>Số lượng phòng</td>
            <td colspan="2">
                <?=@$info['count']?>
            </td>
        </tr>

        <tr>
            <td>Số lượng task</td>
            <td colspan="2">
                <?=@$numbTasks?>
            </td>
        </tr>

        <tr>
            <td>Quản lý</td>
            <td colspan="2">
                <?=@$username?>
            </td>
        </tr>

        <tr>
            <td>Nhân viên</td>
            <td></td>
        </tr>

        <?php
            while ($nameU = $users->fetch_assoc()){
                echo "<tr>";
                echo "<td></td>";
                echo "<td>";
                echo $nameU['name'] . " : Nhân viên";
                echo "</td>";
                echo "</tr>";   
            }
        ?>
        
    </table>
</div>