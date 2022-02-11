<?php    

    if ($infor['type'] == 'nv'){
        $type = 'Nhân Viên';
    } else if ($infor['type'] == 'qly'){
        $type = 'Quản lý';
    } else if ($infor['type'] == 'admin'){
        $type = 'Giám đốc';
    }
    $free = ($infor['free'] == 1) ? 'Rảnh' : 'Đang nghỉ phép';
?>




<div class="container2 center">
    <div class="card">
        <img src="images/a.jpg" alt="John">
        <div class="main">
            <h1><?= @$infor['name']?></h1>
            <p> <?=@ $infor['birthday']?> </p>
            <p> <?=@ $infor['username']?> </p>
            <p> <?=@ $type?> </p>
            <p> <?=@ $free?> </p>
            <p>Lập trình viên 7 năm kinh nghiệm</p>
            <p>
                <a href="?controller=account&action=changeinfo">
                    <button>Sửa</button>
                </a>
            </p>
        </div>
    </div>
</div>
