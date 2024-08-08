<?php
require('../connection.php');


    if(isset($_GET['action'])){
        $action=$_GET['action'];
        if($action=='accept'){
            $id=$_GET['id'];
            mysqli_query($con,"UPDATE `scorekeeper` SET `action`='accept' WHERE `id`='$id'");
            
            ?>
            <script>
                window.alert('Scorekeeper accept successfully!');
                window.location.href='scorekeeper.php';
            </script>
            <?php
        }
        if($action=='not_accept'){
            $id=$_GET['id'];
            mysqli_query($con,"UPDATE `scorekeeper` SET `action`='not_accept' WHERE `id`='$id'");
            
            ?>
            <script>
                window.alert('Scorekeeper Not accept successfully!');
                window.location.href='scorekeeper.php';
            </script>
            <?php
        }
    }
?>
