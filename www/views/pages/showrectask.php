<table class="centerTable">
        <tr>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Hạn</th>
            <th>Trạng thái</th>
        </tr>

        <?php
            while($row = $result['message']->fetch_assoc()){
                echo '<tr>';
                echo '<td>' . ($row['title']) . '</td>';
                echo '<td>' . ($row['mota']) . '</td>'; 
                echo '<td>' . ($row['time']) . '</td>';
                echo '<td>' . ($row['status']) . '</td>';

                echo '<td> <form action="?controller=task&action=updateTask" method="post"> <input type="hidden" name="id" value='. $row['id'] .' /> <input type="submit" value="Cập nhật trạng thái" /> </form> </td>';
                echo '</tr>';
            }
        ?>
        
</table>