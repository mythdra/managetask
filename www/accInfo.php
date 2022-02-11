<?php
    session_start();
    include('/database/Database.php');
	if(empty($_SESSION['logged_in']))
	{
		$_SESSION['logged_in'] = false;
		header('Location: /account/login.php');
		exit;
	} elseif(!$_SESSION['logged_in']){
		header('Location: /account/login.php');
		exit;
	}
    $id  = $_POST['id'];
    $db = new Database();
    $infor = $db->getUserById($id)['message'];
    
    if ($infor['type'] == 'nv'){
        $type = 'Nhân Viên';
    } else if ($infor['type'] == 'qly'){
        $type = 'Quản lý';
    }
    $free = ($infor['free'] == 1) ? 'Rảnh' : 'Đang nghỉ phép';
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <script src="../main.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="/admin/index.php">Home</a>
        <a href="#">News</a>
        <a href="#">Contact</a>
        <a href="#">About</a>
        <a href="../account/logout.php">Log Out</a>
    </div>
    <button onclick="back()">Back</button>
    <table class="centerTable">
        <tr>
            <th colspan="3">
                <img src="/images/a.jpg" width="280" height="280" alt="">
            </th>
        </tr>
        <tr>
            <td>Tên</td>
            <td colspan="2"><?php echo $infor['name']?></td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td colspan="2"><?php echo $infor['birthday']?></td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td colspan="2"><?php echo $infor['gender']?></td>
        </tr>
        <tr>
            <td>Chức vụ</td>
            <td colspan="2"><?php echo $type ?></td>
        </tr>
        <tr>
            <td>Phòng</td>
            <td colspan="2"><?php echo $infor['room']?></td>
        </tr>
        <tr>
            <td>Mã nhân viên</td>
            <td colspan="2"><?php echo $infor['id']?></td>
        </tr>
        <tr>
            <td>Nghỉ phép</td>
            <td colspan="2"><?php echo $free ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><button>Sửa</button></td>
        </tr>
    </table>
</body>
</html>