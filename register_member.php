<?php
require('connection.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['register_member'])){
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        if (!empty($image_temp_name)) {
        move_uploaded_file($image_temp_name,'media/image/'.$image);
        }
        $name=$_POST['full_name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        $hc=$_POST['hc'];
        date_default_timezone_set('Asia/Yangon');
        $date=date('Y-m-d h:i:s');
        $verificationCode = md5(uniqid(rand(), true));

        $res=mysqli_query($con,"SELECT * FROM `member` where email='$email'");
        if(mysqli_num_rows($res)>0){
            ?>
            <script>
                window.alert('Your email address already exist!');
            </script>
            <?php
        }else{
            mysqli_query($con,"INSERT INTO `member`(`image`, `name`, `email`, `phone`, `address`,`hc`, `password`,`verificationCode`, `date`) VALUES ('$image','$name','$email','$phone','$address','$hc','$password','$verificationCode','$date')");

            require 'PHPMailer_master/src/Exception.php';
            require 'PHPMailer_master/src/PHPMailer.php';
            require 'PHPMailer_master/src/SMTP.php';
            
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';  // Specify the SMTP server
                $mail->SMTPAuth   = true;               // Enable SMTP authentication
                $mail->Username   = 'aungnyinyimin32439@gmail.com';   // SMTP username
                $mail->Password   = 'gdbcegflheqtzjjd';    // SMTP password
                $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                // TCP port to connect to, use 587 for TLS, 465 for SSL
            
                //Recipients
                $mail->setFrom('aungnyinyimin32439@gmail.com', 'beautiful life');
                $mail->addAddress($email);
            
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Email Verification';
                $mail->Body = "<p><a href='http://localhost/golf/verify_email.php?email=$email&code=$verificationCode' style='display: inline-block; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; border-radius: 5px;'>Verify Email</a></p>";
            
                $mail->send();
                echo 'Check your email to verify the email account';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
             
            ?>
            <script>
                //window.location.href='index.php';
            </script>
            <?php
        }
        
    }
    
}

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $res = mysqli_query($con, "SELECT * FROM `member` WHERE `email`='$email' AND `password`='$password'");
    
    if (mysqli_num_rows($res) > 0) {
        // Update the user status to 'verified' in the database
        //mysqli_query($con, "UPDATE `member` SET `status`='1' WHERE `email`='$email'");
        $row=mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_EMAIL']=$row['email'];
        $_SESSION['USER_ID']=$row['id'];

        ?>
        <script>
            window.location.href='index.php';
        </script>
        <?php

    } else {
        // Display an error message or redirect to an error page
        ?>
        <script>
            window.alert('Incorrect login detail');
            window.location.href='index.php';
            
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/svg+xml">
    <!-- Other head elements (stylesheets, scripts, etc.) go here -->
</head>

<body>
    <!-- Your HTML content goes here -->

    <?php
    // More PHP code can be added here if needed
    ?>
</body>

</html>