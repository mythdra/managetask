<?php    


?>




<div class="container2 center">
    <div class="card">
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
