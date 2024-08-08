<?php
require('top.php');
if(isset($_GET['id'])){
    $event_id=$_GET['id'];
    $event_res=mysqli_query($con,"SELECT * FROM `event` where `id`='$event_id'");
    $event_row=mysqli_fetch_assoc($event_res);
}
if(isset($_SESSION['KEEPER_LOGIN'])){
    $user_id=$_SESSION['KEEPER_ID'];
      $res=mysqli_query($con,"SELECT * FROM `scorekeeper` where `id`='$user_id'");
      $row=mysqli_fetch_assoc($res);
      $score_id=$row['id'];

}

?>
<main>
    <article class="container article">
        <style>
            /* Styles for the overlay background */
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                align-items: center;
                justify-content: center;
                z-index: 1;
            }

            /* Styles for the popup form */
            .popup {
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                position: relative;
               
            }

            /* Styles for the close button */
            .close-btn {
                font-size:20px;
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }

            /* Styles for the event form fields */
            .form-field {
                margin-bottom: 15px;
            }

            label {
                display: block;
                margin-bottom: 5px;
            }

            input {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
             
                border-radius:5px;
            }


            /* Styles for the submit button */
            .submit-btn {
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .form-group {
                    position: relative;
                    margin-bottom: 20px;
                }

                #file {
                    display: none;
                }

                .img-area {
                    position: relative;
                    width: 100%;
                    border: 2px dashed #3498db;
                    text-align: center;
                    padding: 20px;
                    cursor: pointer;
                    transition: border 0.3s;
                }

                .img-area:hover {
                    border: 2px dashed #2980b9;
                }

                .icon {
                    font-size: 40px;
                    color: #3498db;
                }

                h3 {
                    margin: 10px 0;
                    color: #555;
                }

                .preview-image {
                    max-width: 100%; /* Set maximum width to 100% of the parent container */
                    max-height: 200px; /* Set maximum height as needed */
                    margin: 10px auto; /* Center the image horizontally */
                    display: block; /* Make the image visible */
                }
                #select {
                    display: block;
                    margin-top: 10px;
                    text-align: center;
                }

                .select_btn {
                    background-color: #3498db;
                    color: #fff;
                    padding: 8px 16px;
                    border-radius: 5px;
                    cursor: pointer;
                    text-decoration: none;
                    transition: background-color 0.3s;
                }

                .select_btn:hover {
                    background-color: #2980b9;
                }
        </style>
        

            <!-- 
            - #PROJECTS
        -->

        <section class="home">
            

            <div class="section-title-wrapper">
            <h2 class="section-title"><?php echo $event_row['name'] ?></h2>
            <style>
                .member {
                    width: 100%;
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 10px; /* Adjust the gap between items as needed */
                }
                .card {
                    width: 300px; /* Set a fixed width for each card */
                   
                    padding: 20px; /* Adjust padding as needed */
                    box-sizing: border-box; /* Include padding in the total width */
                }

                .profile-card-wrapper {
                    /* Add styling for profile card wrapper if needed */
                }

                .card-avatar img {
                    width: 48px; /* Set a fixed width for the avatar image */
                    height: 48px; /* Set a fixed height for the avatar image */
                    object-fit: cover; /* Maintain aspect ratio while covering the container */
                    border-radius: 50%; /* Make it circular */
                }
                /* Styles for the overlay background */
                .overlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    align-items: center;
                    justify-content: center;
                    z-index: 1;
                }

                /* Styles for the popup form */
                .popup {
                    background-color: white;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    position: relative;
                }

                /* Styles for the close button */
                .close-btn {
                    font-size:20px;
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    cursor: pointer;
                }

                /* Styles for the event form fields */
                .form-field {
                    margin-bottom: 15px;
                }

                label {
                    display: block;
                    margin-bottom: 5px;
                }

                input {
                    width: 100%;
                    padding: 8px;
                    box-sizing: border-box;
                
                    border-radius:5px;
                }
                select{
                    width: 100%;
                    padding: 8px;
                    box-sizing: border-box;
                
                    border-radius:5px;
                }


                /* Styles for the submit button */
                .submit-btn {
                    padding: 10px;
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                    max-width: 800px;
                    margin: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    overflow-x: auto; /* Add horizontal scrollbar if necessary */
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: center;
                    font-size: 14px;
                    min-width: 30px;
                }

                th {
                    background-color: #3498db;
                    color: white;
                    position: sticky;
                    top: 0;
                }

                tr:hover {
                    background-color: #f5f5f5;
                }

                td.selected {
                    background-color: #e74c3c;
                    color: white;
                }
                td input[type="text"] {
                    width: 40px;
                    padding: 5px;
                    border: 1px solid #ddd;
                    border-radius: 3px;
                    text-align: center;
                    font-size: 12px;
                    outline: none;
                    transition: 0.3s;
                }

                td input[type="text"]:focus {
                    border-color: #3498db;
                    box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
                }

                @media (max-width: 768px) {
                    .overlay {
                        display: none;
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                        align-items: center;
                        justify-content: center;
                        z-index: 1;
                    }

                    .popup {
                        overflow: auto; /* Add this line to handle overflow with a scroll bar */
                        max-height: 80%; /* You can adjust the maximum height as needed */
                        background-color: #fefefe;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 80%;
                        position: relative;
                    }

                    th, td {
                        border: 1px solid #ddd;
                        padding: 10px;
                        text-align: center;
                        font-size: 12px;
                        min-width: 30px;
                    }

                    td input[type="text"] {
                        width: 30px;
                        padding: 1px;
                        border: 1px solid #ddd;
                        border-radius: 3px;
                        text-align: center;
                        font-size: 11px;
                        outline: none;
                        transition: 0.3s;
                    }
                }



                /* Responsive layout */
                @media (max-width: 1024px) {
                    .member {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }

                @media (max-width: 600px) {
                    .member {
                        grid-template-columns: repeat(1, 1fr);
                    }
                    .card {
                        width: 350px; /* Set a fixed width for each card */
                        
                    }
                }
                
                

                /* Add any additional styling for your other elements */
            </style>

            <!-- <div class="member">
                <?php
                $join_res = mysqli_query($con, "SELECT * FROM `event_join` WHERE `event_id`='$event_id' and `scorekeeper_id`='$score_id' ORDER BY `id` DESC");
                while ($join_row = mysqli_fetch_assoc($join_res)) {
                    $member_id = $join_row['member_id'];
                    $res = mysqli_query($con, "SELECT * FROM `member` WHERE `id`='$member_id'");
                    $row = mysqli_fetch_assoc($res);
                ?>
                    <div class="card profile-card">
                        <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                            <span class="material-symbols-rounded icon">more_horiz</span>
                        </button>

                        <ul class="ctx-menu">
                            <li class="divider"></li>
                            
                                <li class="ctx-item">
                                    <a class="ctx-menu-btn red icon-box" id="delete" onclick="openEventForm(<?php echo $member_id; ?>)">
                                        <span class="material-symbols-rounded icon" aria-hidden="true">input</span>
                                        <span class="ctx-menu-text">Insert Score</span>
                                    </a>
                                </li>
                        </ul>

                        <div class="profile-card-wrapper">
                            <figure class="card-avatar">
                                <img src="../media/image/<?php echo $row['image'] ?>" alt="Profile Image" width="48" height="48">
                            </figure>

                            <div>
                                <p class="card-title"><?php echo $row['name'] ?></p>
                                <p class="card-subtitle">Member</p>
                            </div>
                        </div>

                        <ul class="contact-list">
                            <li>
                                <a href="mailto:<?php echo $row['email'] ?>" class="contact-link icon-box">
                                    <span class="material-symbols-rounded icon">mail</span>
                                    <p class="text"><?php echo $row['email'] ?></p>
                                </a>
                            </li>

                            <li>
                                <a href="tel:<?php echo $row['phone'] ?>" class="contact-link icon-box">
                                    <span class="material-symbols-rounded icon">call</span>
                                    <p class="text"><?php echo $row['phone'] ?></p>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="contact-link icon-box">
                                    <span class="material-symbols-rounded icon">map</span>
                                    <p class="text"><?php echo $row['address'] ?></p>
                                </a>
                            </li>
                        </ul>

                        <div class="divider card-divider"></div>
                    </div>
                <?php } ?>
            </div> -->
            

          
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    
                    th, td {
                        padding: 10px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;
                    }
                    td a:hover{
                        cursor:pointer;
                    }
                    
                    th {
                        background-color: #f2f2f2;
                        color: #333;
                    }
                    
                    tr:nth-child(even) {
                        background-color: #f9f9f9;
                    }
                    
                    @media (max-width: 600px) {
                        table, thead, tbody, th, td, tr {
                            display: block;
                        }
                        
                        thead tr {
                            position: absolute;
                            top: -9999px;
                            left: -9999px;
                        }
                        
                        tr {
                            border: 1px solid #ccc;
                            margin-bottom: 10px; /* Add margin between rows */
                        }
                        
                        td {
                            border: none;
                            border-bottom: 1px solid #eee;
                            position: relative;
                            padding-left: 50%;
                            width: 100%;
                            word-wrap: break-word; /* Corrected property */
                            white-space: normal; /* Corrected property */
                        }
                        
                        td:before {
                            position: absolute;
                            top: 6px;
                            left: 6px;
                            width: 45%;
                            padding-right: 10px;
                            white-space: nowrap;
                        }
                        
                        td:nth-of-type(1):before { content: "Profile"; }
                        td:nth-of-type(2):before { content: " Name"; }
                        td:nth-of-type(3):before { content: " Email"; }
                        td:nth-of-type(4):before { content: " Mobile"; }
                        td:nth-of-type(5):before { content: " Address"; }
                        td:nth-of-type(6):before { content: " Scorekeeper"; }
                        /* Add more nth-of-type() as needed for additional columns */
                    }
                </style>
                <table>
                    <thead>
                        <tr>
                            <th>profile</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th></th>
                            <!-- Add more th elements for additional holes -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $join_res = mysqli_query($con, "SELECT * FROM `event_join` WHERE `event_id`='$event_id' and `scorekeeper_id`='$score_id' ORDER BY `id` DESC");
                        while ($join_row = mysqli_fetch_assoc($join_res)) {
                            $member_id = $join_row['member_id'];
                            $res = mysqli_query($con, "SELECT * FROM `member` WHERE `id`='$member_id'");
                            $row = mysqli_fetch_assoc($res);
                        ?>
                        <tr>
                            <td><img src="../media/image/<?php echo $row['image'] ?>" alt="Profile Image" width="48" height="48"></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><a class="ctx-menu-btn red icon-box" id="delete" onclick="openEventForm(<?php echo $member_id; ?>)">
                                        <span class="material-symbols-rounded icon" aria-hidden="true">input</span>
                                        <span class="ctx-menu-text">Insert Score</span>
                                    </a></td>
                            <!-- Add more td elements for additional holes -->
                        </tr>
                        <?php } ?>
                        
                        <!-- Add more rows for additional players -->
                    </tbody>
                </table>
          

            <!-- Popup overlay -->
            <div id="overlay" class="overlay">
                <!-- Popup form -->
                <div class="popup">
                    <span class="close-btn" onclick="closeEventForm()">&times;</span>
                    <h4>Player Score</h4>
                    <?php
                        if(isset($_POST['insert'])){
                            $member_id=$_POST['m_id'];
                            $fst=$_POST['1'];
                            $sec=$_POST['2'];
                            $thd=$_POST['3'];
                            $fot=$_POST['4'];
                            $five=$_POST['5'];
                            $six=$_POST['6'];
                            $sev=$_POST['7'];
                            $eig=$_POST['8'];
                            $nin=$_POST['9'];
                            $ten=$_POST['10'];
                            $ele=$_POST['11'];
                            $twe=$_POST['12'];
                            $thr=$_POST['13'];
                            $for=$_POST['14'];
                            $fir=$_POST['15'];
                            $sir=$_POST['16'];
                            $ser=$_POST['17'];
                            $eir=$_POST['18'];
                        
                            date_default_timezone_set('Asia/Yangon');
                            $date=date('Y-m-d h:i:s');
                        
                        
                            $score_res=mysqli_query($con,"SELECT * FROM `score` where `event_id`='$event_id' and `m_id`='$member_id'");
                            if(mysqli_num_rows($score_res)>0){
                                mysqli_query($con,"UPDATE `score` SET `scorekeeper_id`='$score_id',`1`='$fst',`2`='$sec',`3`='$thd',`4`='$fot',`5`='$five',`6`='$six',`7`='$sev',`8`='$eig',`9`='$nin',`10`='$ten',`11`='$ele',`12`='$twe',`13`='$thr',`14`='$for',`15`='$fir',`16`='$sir',`17`='$ser',`18`='$eir',`date`='$date' WHERE `event_id`='$event_id' and `m_id`='$member_id'");
                            }else{
                                 mysqli_query($con,"INSERT INTO `score`(`m_id`, `scorekeeper_id`, `event_id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `date`) VALUES ('$member_id','$score_id','$event_id','$fst','$sec','$thd','$fot','$five','$six','$sev','$eig','$nin','$ten','$ele','$twe','$thr','$for','$fir','$sir','$ser','$eir','$date')");
                            }
                        }
                     ?>
                    <form action="" method="post">
                        <table id="myTable">
                            <thead>
                                <tr >
                                    <td>(w)Tee</td>
                                    <td>374</td>
                                    <td>389</td>
                                    <td>552</td>
                                    <td>203</td>
                                    <td>547</td>
                                    <td>181</td>
                                    <td>467</td>
                                    <td>397</td>
                                    <td>417</td>
                                    <td>3522</td>
                                    <td>404</td>
                                    <td>553</td>
                                    <td>154</td>
                                    <td>433</td>
                                    <td>431</td>
                                    <td>196</td>
                                    <td>291</td>
                                    <td>409</td>
                                    <td>400</td>
                                    <td>3373</td>
                                    <td>Total</td>
                                    <td>Par</td>
                                    <td>Birdie</td>
                                    <td>HC</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="background:lightgreen">
                                    <td>(M)Tee</td>
                                    <td>374</td>
                                    <td>389</td>
                                    <td>552</td>
                                    <td>203</td>
                                    <td>547</td>
                                    <td>181</td>
                                    <td>467</td>
                                    <td>397</td>
                                    <td>417</td>
                                    <td>3522</td>
                                    <td>404</td>
                                    <td>553</td>
                                    <td>154</td>
                                    <td>433</td>
                                    <td>431</td>
                                    <td>196</td>
                                    <td>291</td>
                                    <td>409</td>
                                    <td>400</td>
                                    <td>3373</td>
                                    <td>Total</td>
                                    <td>Par</td>
                                    <td>Birdie</td>
                                    <td>HC</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="background:lightyellow">
                                    <td>(Y)Tee</td>
                                    <td>374</td>
                                    <td>389</td>
                                    <td>552</td>
                                    <td>203</td>
                                    <td>547</td>
                                    <td>181</td>
                                    <td>467</td>
                                    <td>397</td>
                                    <td>417</td>
                                    <td>3522</td>
                                    <td>404</td>
                                    <td>553</td>
                                    <td>154</td>
                                    <td>433</td>
                                    <td>431</td>
                                    <td>196</td>
                                    <td>291</td>
                                    <td>409</td>
                                    <td>400</td>
                                    <td>3373</td>
                                    <td>Total</td>
                                    <td>Par</td>
                                    <td>Birdie</td>
                                    <td>HC</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="background:red">
                                    <td>(Z)Tee</td>
                                    <td>374</td>
                                    <td>389</td>
                                    <td>552</td>
                                    <td>203</td>
                                    <td>547</td>
                                    <td>181</td>
                                    <td>467</td>
                                    <td>397</td>
                                    <td>417</td>
                                    <td>3522</td>
                                    <td>404</td>
                                    <td>553</td>
                                    <td>154</td>
                                    <td>433</td>
                                    <td>431</td>
                                    <td>196</td>
                                    <td>291</td>
                                    <td>409</td>
                                    <td>400</td>
                                    <td>3373</td>
                                    <td>Total</td>
                                    <td>Par</td>
                                    <td>Birdie</td>
                                    <td>HC</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="background:lightblue">
                                    <td>Hole</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td></td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td rowspan="7"></td>
                                    
                                </tr>

                            </thead>
                            <tbody>
                                <tr >
                                    <td>HDCP</td>
                                    <td>9</td>
                                    <td>7</td>
                                    <td>11</td>
                                    <td>15</td>
                                    <td>13</td>
                                    <td>17</td>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>8</td>
                                    <td>14</td>
                                    <td>2</td>
                                    <td>18</td>
                                    <td>4</td>
                                    <td>16</td>
                                    <td>291</td>
                                    <td>12</td>
                                    <td>6</td>
                                    <td>10</td>
                                    <td></td>
                                    <td>Par</td>
                                    <td>Birdie</td>
                                    <td>HC</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr >
                                    <?php 
                                    $par_res=mysqli_query($con,"SELECT * FROM `hole` where id='1'");
                                    $par_row=mysqli_fetch_assoc($par_res);
                                    $fst_total=$par_row['1']+$par_row['2']+$par_row['3']+$par_row['4']+$par_row['5']+$par_row['6']+$par_row['7']+$par_row['8']+$par_row['9'];
                                    $sec_total=$par_row['10']+$par_row['11']+$par_row['12']+$par_row['13']+$par_row['14']+$par_row['15']+$par_row['16']+$par_row['17']+$par_row['18'];
                                    $all_total=$fst_total+$sec_total;
                                    ?>
                                    <td>Par</td>
                                    <td><?php echo $par_row['1'] ?></td>
                                    <td><?php echo $par_row['2'] ?></td>
                                    <td><?php echo $par_row['3'] ?></td>
                                    <td><?php echo $par_row['4'] ?></td>
                                    <td><?php echo $par_row['5'] ?></td>
                                    <td><?php echo $par_row['6'] ?></td>
                                    <td><?php echo $par_row['7'] ?></td>
                                    <td><?php echo $par_row['8'] ?></td>
                                    <td><?php echo $par_row['9'] ?></td>
                                    <td><?php echo $fst_total ?></td>
                                    <td><?php echo $par_row['10'] ?></td>
                                    <td><?php echo $par_row['11'] ?></td>
                                    <td><?php echo $par_row['12'] ?></td>
                                    <td><?php echo $par_row['13'] ?></td>
                                    <td><?php echo $par_row['14'] ?></td>
                                    <td><?php echo $par_row['15'] ?></td>
                                    <td><?php echo $par_row['16'] ?></td>
                                    <td><?php echo $par_row['17'] ?></td>
                                    <td><?php echo $par_row['18'] ?></td>
                                    <td><?php echo $sec_total ?></td>
                                    <td><?php echo $all_total ?></td>
                                    <td>Par</td>
                                    <td>Birdie</td>
                                    <td>HC</td>
                                    <td>NET</td>
                                    <td>+/-</td>
                                </tr>
                                <tr >
                                    
                                    <td ><input type="text" id="m_id" name="m_id" required style="min-width:70px;height:50px;text-wrap: wrap;display:none"><input type="text" id="m_name" required style="min-width:70px;height:50px;text-wrap: wrap;border:none" readonly></td>
                                    <td><input type="text" id="1" name="1" required></td>
                                    <td><input type="text" id="2" name="2" required></td>
                                    <td><input type="text" id="3" name="3" required></td>
                                    <td><input type="text" id="4" name="4" required></td>
                                    <td><input type="text" id="5" name="5" required></td>
                                    <td><input type="text" id="6" name="6" required></td>
                                    <td><input type="text" id="7" name="7" required></td>
                                    <td><input type="text" id="8" name="8" required></td>
                                    <td><input type="text" id="9" name="9" required></td>
                                    <td>0</td>
                                    <td><input type="text" id="10" name="10" required></td>
                                    <td><input type="text" id="11" name="11" required></td>
                                    <td><input type="text" id="12" name="12" required></td>
                                    <td><input type="text" id="13" name="13" required></td>
                                    <td><input type="text" id="14" name="14" required></td>
                                    <td><input type="text" id="15" name="15" required></td>
                                    <td><input type="text" id="16" name="16" required></td>
                                    <td><input type="text" id="17" name="17" required></td>
                                    <td><input type="text" id="18" name="18" required></td>
                                    <td></td>
                                    <td>0</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>0</td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <input type="submit" value="Insert Score" name="insert" class="submit-btn">
                    </form>

                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
            <script>
                // Function to open the event form
                function openEventForm(memberId) {
                    document.getElementById('overlay').style.display = 'flex';
                    //document.getElementById('member_id').value = memberId;
                    // AJAX Call to fetch member details
                    $.ajax({
                        type: "POST",
                        url: "get_score_details.php?event_id=<?php echo $event_row['id'] ?>&member_id="+memberId,
                        data: { memberId: memberId },
                        dataType: 'json', // Expect JSON response
                        success: function (response) {
                            // Update form fields with member details
                            // document.getElementById('nameField').value = response.name;
                            // document.getElementById('m_name').value = response.name;
                            document.getElementById('m_id').value = response.m_id;
                            document.getElementById('m_name').value  = response.name;
                            document.getElementById('1').value = response.fst;
                            document.getElementById('2').value = response.sec;
                            document.getElementById('3').value = response.thd;
                            document.getElementById('4').value = response.fot;
                            document.getElementById('5').value = response.five;
                            document.getElementById('6').value = response.six;
                            document.getElementById('7').value = response.sev;
                            document.getElementById('8').value = response.eig;
                            document.getElementById('9').value = response.nin;
                            document.getElementById('10').value = response.ten;
                            document.getElementById('11').value = response.ele;
                            document.getElementById('12').value = response.twe;
                            document.getElementById('13').value = response.thr;
                            document.getElementById('14').value = response.for;
                            document.getElementById('15').value = response.fir;
                            document.getElementById('16').value = response.sir;
                            document.getElementById('17').value = response.ser;
                            document.getElementById('18').value = response.eir;
                            // Add more fields as needed

                            // Example: Log response for debugging
                            console.log('Member details:', response);
                        },
                        error: function (error) {
                            console.error('Error fetching member details:', error);
                        }
                    });
                }

                // Function to close the event form
                function closeEventForm() {
                    document.getElementById('overlay').style.display = 'none';
                }
            </script>

            
        </section>
    </article>
</main>





<?php
require('foot.php');
?>