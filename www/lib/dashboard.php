<?php
    function admindashboard()
    {
        return array(
            array('controller' => 'account', 'action' => 'showEmpls', 'data' => 'Quản lý nhân viên'),
            array('controller' => 'room', 'action' => 'showRooms', 'data' => 'Quản lý phòng ban'),
        );
    }

    function qlydashboard()
    {
        return array(
            array('controller' => 'task', 'action' => 'showTasks','data' => 'Nhiệm vụ'),
        );
    }

    function nvdashboard()
    {
        return array(
            array('controller' => 'task', 'action' => 'receiveTask','data' => 'Nhiệm vụ'),

        );
    }
?>