<table class="centerTable">
        <tr>
            <th>Tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Chức vụ</th>
            <th>Phòng ban</th>
            <th>Nghỉ phép</th>
            <th>Đặt lại mật khẩu</th>
            <th>Xóa tài khoản</th>
        </tr>

        <?php
            while($row = $result['message']->fetch_assoc()){
                if ($row['type'] == 'nv'){
                    $type = 'Nhân Viên';
                } else if ($row['type'] == 'qly'){
                    $type = 'Quản lý';
                }
                $free = ($row['free'] == 1) ? 'Đang làm việc' : 'Đang nghỉ phép';
                $str = '<form action="?controller=account&action=showEmpl" method="post">
                    <button type="submit" name="username" value="'. $row['username'] .'" class="btn-link">'. $row['name'] .'</button>
                </form>';
                echo '<tr>';
                echo '<td>' . $str . '</td>';
                echo '<td>' . ($row['gender']) . '</td>';
                echo '<td>' . ($row['birthday']) . '</td>';
                echo '<td>' . ($type) . '</td>';
                echo '<td>' . ($row['room']) . '</td>';
                echo '<td>' . ($free) . '</td>';
                echo '<td> <form class="resetpass" method="post"> <input type="hidden" name="username" value="'. $row['username'].'" /> <input type="submit" value="Đặt lại mật khẩu" /> </form> </td>';
                echo '<td> <form class="removeacc" method="post"> <input type="hidden" name="username" value="'. $row['username'] .'" /> <input type="hidden" name="id" value="'. $row['id'] .'" /> <input type="submit" value="Xóa tài khoản" /> </form> </td>';
                echo '</tr>';
            }
        ?>
        <tr>
            <td colspan="6"></td>
            <td colspan="2"> 
                <form id="myForm" action="?controller=account&action=newaccount" method="post"> 
                    <input type="submit" value="Tạo tài khoản mới" /> 
                </form>
            </td>
        </tr>
        
</table>