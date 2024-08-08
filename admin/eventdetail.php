<?php
require('top.php');
if(isset($_GET['id'])){
    $event_id=$_GET['id'];
    $event_res=mysqli_query($con,"SELECT * FROM `event` where `id`='$event_id'");
    $event_row=mysqli_fetch_assoc($event_res);
}
?>
<main>

        

          
                <style>
                    .table{
                        width:90%;
                        margin:auto;
                        margin-top:3rem;
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
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                        box-shadow:5px 10px 10px 10px lightgray;
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
                    
                    @media (max-width: 900px) {
                        table {
                                width: auto;
                            }

                            th, td {
                                width: auto;
                            }
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

        <div class="table">
            <div class="section-title-wrapper">
            <h2 class="section-title"><?php echo $event_row['name'] ?></h2>


                <table>
                    <thead>
                        <tr>
                            <th>profile</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Scorekeeper</th>
                            <!-- Add more th elements for additional holes -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $join_res = mysqli_query($con, "SELECT * FROM `event_join` WHERE `event_id`='$event_id' ORDER BY `id` DESC");
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
                            <td><?php
                            if ($join_row['scorekeeper_id'] != '0') {
                                $scorekeeper_id = $join_row['scorekeeper_id'];
                                $score_res = mysqli_query($con, "SELECT * FROM `scorekeeper` WHERE `id`='$scorekeeper_id'");
                                $score_row = mysqli_fetch_assoc($score_res);
                            ?>
                                
                                    <a class="ctx-menu-btn red icon-box" id="delete" onclick="openEventForm(<?php echo $member_id; ?>)">
                                        <span class="material-symbols-rounded icon" aria-hidden="true">refresh</span>
                                        <span class="ctx-menu-text"><?php echo $score_row['name'] ?></span>
                                    </a>
                               
                            <?php
                            } else {
                            ?>
                               
                                    <a class="ctx-menu-btn red icon-box" id="delete" onclick="openEventForm(<?php echo $member_id; ?>)">
                                        <span class="material-symbols-rounded icon" aria-hidden="true">refresh</span>
                                        <span class="ctx-menu-text">Select Scorekeeper</span>
                                    </a>
                          
                            <?php
                            }
                            ?></td>
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
                    <h4>Select Scorekeeper</h4>
                    <form id="eventForm" method="post" enctype="multipart/form-data" action="create_event.php">
                        <div class="form-field">
                            <input type="hidden" name="event_id" id="event_id" value=<?php  echo $event_id ?>>
                            <input type="hidden" name="member_id" id="member_id">
                            <label for="scorekeeper_id">Scorekeeper:</label>
                            <select name="scorekeeper_id" id="scorekeeper_id">
                                <option value="">Select Scorekeeper</option>
                                <?php
                                $s_res = mysqli_query($con, "SELECT * FROM `scorekeeper` ORDER BY `id` ASC");
                                while ($s_row = mysqli_fetch_assoc($s_res)) {
                                ?>
                                    <option value="<?php echo $s_row['id']; ?>"><?php echo $s_row['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="submit-btn" name="select_score">Submit Event</button>
                    </form>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <script>
                // Function to open the event form
                function openEventForm(memberId) {
                    document.getElementById('overlay').style.display = 'flex';
                    document.getElementById('member_id').value = memberId;
                }

                // Function to close the event form
                function closeEventForm() {
                    document.getElementById('overlay').style.display = 'none';
                }
            </script>
        </div>

            

 
</main>





<?php
require('foot.php');
?>