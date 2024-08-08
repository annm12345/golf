<?php
require('connection.php');

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $code = $_GET['code'];

    $res = mysqli_query($con, "SELECT * FROM `member` WHERE `email`='$email' AND `verificationCode`='$code'");
    
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
        echo "Verification failed. Please try again.";
    }
} else {
    // Display an error message or redirect to an error page
    echo "Invalid verification link.";
}
?>
