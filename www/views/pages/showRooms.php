<table class="centerTable">
        <tr>
            <th>Tên phòng</th>
            <th>Mô tả</th>
            <th>Số lượng phòng</th>
            <th>Quản lý</th>
            <th></th>
        </tr>

        <?php
            $user = new UserModel();

            while($row = $result->fetch_assoc()){

                if ($row['manager'] == -1){
                    $manager = 'Chưa có quản lý';
                } else {
                    $manager = $user->getUserById($row['manager'])['message']['name'];
                }
                $str = '<form action="?controller=room&action=roominfo" method="post">
                    <button type="submit" name="id" value="'. $row['id'] .'" class="btn-link">'. $row['name'] .'</button>
                </form>';
                echo '<tr>';
                echo '<td>' . $str . '</td>';
                echo '<td>' . ($row['mota']) . '</td>';
                echo '<td>' . ($row['count']) . '</td>';
                echo '<td>' . $manager . '</td>';
                echo '<td> <form class="myform" action="?controller=room&action=changeroom" method="post"> <input type="hidden" name="name" value="'. $row['name'] .'" /> <input type="submit" value="Sửa phòng" /> </form> </td>';
                echo '</tr>';
            }
        ?>
        <tr>
            <td colspan="4"></td>
            <td colspan="1"> 
                <form id="myForm" action="?controller=room&action=newroom" method="post"> 
                    <input type="submit" value="Tạo phòng mới" /> 
                </form>
            </td>
        </tr>
        
</table>