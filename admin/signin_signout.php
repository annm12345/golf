<?php
require('../connection.php');
if(isset($_POST['signup'])){
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        if (!empty($image_temp_name)) {
        move_uploaded_file($image_temp_name,'../media/image/'.$image);
        }
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        date_default_timezone_set('Asia/Yangon');
        $date=date('Y-m-d h:i:s');

        mysqli_query($con,"INSERT INTO `admin`(`image`, `name`, `email`, `phone`, `address`, `passowrd`, `date`) VALUES ('$image','$name','$email','$phone','$address','$password','$date')");
        ?>
            <script>
                window.location.href='login.php';
            </script>
            <?php
    }
}
if(isset($_POST['signin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $res=mysqli_query($con,"SELECT * FROM `admin` where `email`='$email' and `passowrd`='$password'");
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
       
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_EMAIL']=$row['email'];
        $_SESSION['ADMIN_ID']=$row['id'];
            ?>
            <script>
                window.location.href='index.php';
            </script>
            <?php
        
    }else{
        ?>
        <script>
            window.alert('Incorrect Login Deatil');
            window.location.href='login.php';
        </script>
        <?php
    }
}
?>