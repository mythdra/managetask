<?php
    session_start();
    session_unset();
    unset($_SESSION['username']);
            unset($_SESSION['password']);
            unset($_SESSION['changepass']);
    
    $message = '';
    
    // print_r(password_verify('nguyencan','$2y$10$Xifmrf1B1jt.SBGCJOTSJ.q2u05dHRncdowhyxZnS3xA7G2RWBzLy'))
    print_r(password_hash('123456', PASSWORD_BCRYPT));
?>
