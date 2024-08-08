<?php
require('../connection.php');

if(isset($_GET['event_id']) && isset($_GET['member_id'])){
    $event_id = $_GET['event_id'];
    $member_id = $_GET['member_id'];
    
    $res = mysqli_query($con, "SELECT `score`.*, `member`.`name` FROM `score`, `member` WHERE `event_id`='$event_id' AND `m_id`='$member_id' AND `member`.`id`='$member_id'");
    
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        echo json_encode(array(
            'm_id' => $member_id,
            'name' => $row['name'],
            'fst' => $row['1'],
            'sec' => $row['2'],
            'thd' => $row['3'],
            'fot' => $row['4'],
            'five' => $row['5'],
            'six' => $row['6'],
            'sev' => $row['7'],
            'eig' => $row['8'],
            'nin' => $row['9'],
            'ten' => $row['10'],
            'ele' => $row['11'],
            'twe' => $row['12'],
            'thr' => $row['13'],
            'for' => $row['14'],
            'fir' => $row['15'],
            'sir' => $row['16'],
            'ser' => $row['17'],
            'eir' => $row['18'],
        ));
    } else {
        $res = mysqli_query($con, "SELECT * FROM `member` WHERE `id`='$member_id'");
        $row = mysqli_fetch_assoc($res);
        echo json_encode(array(
            'm_id' => $row['id'],
            'name' => $row['name'],
            'fst' => '0',
            'sec' => '0',
            'thd' => '0',
            'fot' => '0',
            'five' => '0',
            'six' => '0',
            'sev' => '0',
            'eig' => '0',
            'nin' => '0',
            'ten' => '0',
            'ele' => '0',
            'twe' => '0',
            'thr' => '0',
            'for' => '0',
            'fir' => '0',
            'sir' => '0',
            'ser' => '0',
            'eir' => '0',
        ));
    }
}
