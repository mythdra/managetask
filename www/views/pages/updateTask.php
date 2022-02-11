<?php    
    $message ='';
    $namenv = (new UserModel())->getUserById($info['idnv'])['message']['name'];
?>

    
<div class="container center">
    <form id="fChangeRoom" method="POST"></form>
    <table>
        <tr>
            <td colspan="3" class="title">Thông tin task</td>
        </tr>

        <tr>
            <td>Tiêu đề</td>
            <td colspan="2">
                <?=@$info['title']?>
            </td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td colspan="2">
                <?=@$info['mota']?>
            </td>
        </tr>

        <tr>
            <td>Deadline</td>
            <td colspan="2">
                <?=@$info['time']?>
            </td>
        </tr>

        <tr>
            <td>Nhân viên thực hiện</td>
            <td colspan="2">
                <?=@$namenv?>
            </td>
        </tr>

        <tr>
            <td>Tình trạng</td>
            <td colspan="2">
                <?=@$info['status']?>
            </td>
        </tr>
        
        <?php
            if ($info['status'] == "New"){
                echo
                "<td colspan='3'>" . 
                    "<form action='?controller=task&action=starttask' method='post'>" .
                        "<input hidden name='id' value=" . $info['id'] . ">" .
                        "<input type='submit' value='Start'>" .
                    "</form>" .
                "</td>";
            }
        ?>
    </table>
</div>