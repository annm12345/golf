<?php
require('connection.php');

$response = array(); // Initialize the response array

if (isset($_GET['event_id']) && isset($_GET['member_id'])) {
    $eventId = $_GET['event_id'];
    $memberId = $_GET['member_id'];

    $res = mysqli_query($con, "SELECT * FROM `event_join` WHERE `event_id`='$eventId' AND `member_id`='$memberId'");

    if (mysqli_num_rows($res) > 0) {
        $response['status'] = 'joined';
    } else {
        date_default_timezone_set('Asia/Yangon');
        $date = date('Y-m-d h:i:s');
        
        $insertQuery = "INSERT INTO `event_join`(`event_id`, `member_id`,`scorekeeper_id`, `date`) VALUES ('$eventId','$memberId','0','$date')";
        if (mysqli_query($con, $insertQuery)) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
        }
    }
} else {
    $response['status'] = 'error';
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
