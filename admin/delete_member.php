<?php
require('../connection.php');


    if(isset($_GET['action'])){
        $action=$_GET['action'];
        if($action=='memberdel'){
            $id=$_GET['id'];
            mysqli_query($con,"DELETE FROM `member` WHERE `id`='$id'");
            
            ?>
            <script>
                window.alert('Member deleted successfully!');
                window.location.href='member.php';
            </script>
            <?php
        }
    }
?>
