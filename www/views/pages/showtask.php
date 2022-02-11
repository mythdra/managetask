<table class="centerTable">
        <tr>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Hạn</th>
            <th>Nhân Viên</th>
            <th>Trạng thái</th>
        </tr>

        <?php
            while($row = $result['message']->fetch_assoc()){
                $user = new UserModel();
                $employ = $user->getUserById($row['idnv'])['message']['name'];
                echo '<td>' . ($row['title']) . '</td>';
                echo '<td>' . ($row['mota']) . '</td>'; 
                echo '<td>' . ($row['time']) . '</td>';
                echo '<td>' . ($employ) . '</td>';
                echo '<td>' . ($row['status']) . '</td>';
                echo '<td> <form action="" method="post"> <input type="hidden" name="username" value="" /> <input type="submit" value="Xem chi tiết" /> </form> </td>';
                echo '<td>' ;
                if ($row["status"] == "New"){
                    echo '<form action="?" method="post"> <input type="hidden" name="username" value="" /> <input type="submit" value="Xóa" /> </form>';
                }
                echo '</td>';
                echo '</tr>';
            }
        ?>
        <tr>
            <td colspan="6"></td>
            <td colspan="2"> 
                <form id="myForm" onsubmit="return confirmFormDialog('','')" action="?controller=task&action=newtask" method="post"> 
                    <input type="hidden" name="room" value="<?=@$room?>"/>
                    <input type="submit" value="Tạo task mới" /> 
                </form>
            </td>
        </tr>
        
</table>