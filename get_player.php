<?php
require('connection.php');

if (isset($_GET['id'])) {
    $event_id = $_GET['id']; // Define $event_id correctly
    $player_res = mysqli_query($con, "SELECT * FROM `event_join` WHERE `event_id`='$event_id'");
    while ($player_row = mysqli_fetch_assoc($player_res)) {
        $player_id=$player_row['member_id'];
        $scorekeepr_id=$player_row['scorekeeper_id'];
        $player=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `member` WHERE `id`='$player_id'"));
        $scorekeepr=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `scorekeeper` where `id`='$scorekeepr_id'"));
    
        $row['image']=$player['image'];
        $row['name']=$player['name'];
        $row['email']=$player['email'];
        $row['address']=$player['address'];
        $row['phone']=$player['phone'];
        $row['hc']=$player['hc'];
        $row['scorekeeper']=$scorekeepr['name'];
       
       

        $playerList[] = $row;
    }
}

// You can use $scoreData array as needed
echo json_encode($playerList);
?>
