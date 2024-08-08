<?php
require('connection.php');
$result=array();
$res=mysqli_query($con,"select * from member order by id ASC");
while($row=mysqli_fetch_assoc($res)){
    $result[]=$row;
}
echo json_encode($result);
?>