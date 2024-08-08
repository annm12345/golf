<?php
require('../connection.php');
if(isset($_POST['create_event'])){
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        if (!empty($image_temp_name)) {
        move_uploaded_file($image_temp_name,'../media/image/'.$image);
        }
        $name=$_POST['eventName'];
        $location=$_POST['location'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $prize=$_POST['prize'];
        $des=$_POST['des'];
        

        mysqli_query($con,"INSERT INTO `event`(`image`, `name`, `location`, `date`,`time`, `prize`,`des`) VALUES ('$image','$name','$location','$date','$time','$prize','$des')");
        ?>
            <script>
                window.alert('Event form submitted!');
                window.location.href='event.php';
            </script>
            <?php
    }
}
if(isset($_GET['action'])){
    $action=$_GET['action'];
    $id=$_GET['id'];
    if($action=='delete'){
        mysqli_query($con,"DELETE FROM `event` WHERE `id`='$id'");
        ?>
            <script>
                window.alert('Event Deleted!');
                window.location.href='event.php';
            </script>
            <?php
    }
}
if(isset($_POST['select_score'])){
    $score_id=$_POST['scorekeeper_id'];
    $event_id=$_POST['event_id'];
    $member_id=$_POST['member_id'];
    $res=mysqli_query($con,"SELECT * FROM `event_join` where `event_id`='$event_id' and `member_id`='$member_id'");
    if(mysqli_num_rows($res)>0){
        mysqli_query($con,"UPDATE `event_join` SET `scorekeeper_id`='$score_id' where `event_id`='$event_id' and `member_id`='$member_id'");
        ?>
            <script>
                window.alert('Scorekeeper selected');
                window.location.href='eventdetail.php?id=<?php echo $event_id ?>';
            </script>
            <?php
    }
}
?>