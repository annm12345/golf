<?php
require('top.php');
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
        <button class="submit-btn" onclick="openEventForm()">Create Event</button>

        <!-- Popup overlay -->
        <div id="overlay" class="overlay">
            <!-- Popup form -->
            <div class="popup">
                <span class="close-btn" onclick="closeEventForm()">&times;</span>
                
                <h4>Event Refill Form</h4>

                <form id="eventForm" method="post" enctype="multipart/form-data" action="create_event.php">
                    <div class="form-group">
                        
                        <input type="file" id="file" accept="image/*" name="image" hidden>
                        <div class="img-area" data-img="">
                            <i class='bx bxs-cloud-upload icon'></i>
                            <h3>Upload  Image</h3>
                            <!--<p>Image size must be less than <span>2MB</span></p> -->
                            <img id="image-preview" alt="Preview" class="preview-image">
                        </div>
                        <div>
                            <a class="select_btn" id="select">Select Image</a>
                            <br>
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="eventName">Event Name:</label>
                        <input type="text" id="eventName" name="eventName" required>
                    </div>
                    <div class="form-field">
                        <label for="location">Location:</label>
                        <input type="text" id="location" name="location" required>
                    </div>
                    <div class="form-field">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="form-field">
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="form-field">
                        <label for="prize">Prize:</label>
                        <input type="text" id="prize" name="prize" required>
                    </div>
                    <div class="form-field">
                        <label for="prize">Description:</label>
                        <textarea id="des" name="des" required></textarea>
                    </div>

                    <!-- Add more form fields as needed -->

                    <button type="submit" class="submit-btn" onclick="submitEventForm()" name="create_event">Submit Event</button>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <script>
            // Function to open the event form
            function openEventForm() {
                document.getElementById('overlay').style.display = 'flex';
            }

            // Function to close the event form
            function closeEventForm() {
                document.getElementById('overlay').style.display = 'none';
            }

            // // Function to submit the event form (you can customize this)
            // function submitEventForm() {
            //     // Add your logic to handle form submission
            //     alert('Event form submitted!');
            //     closeEventForm(); // Close the form after submission
            // }
            
            
             document.addEventListener('DOMContentLoaded', function () {
                const selectImageBtn = document.getElementById('select');
                const inputFile = document.getElementById('file');
                const imgArea = document.querySelector('.img-area');
                const imgPreview = document.getElementById('image-preview');

                selectImageBtn.addEventListener('click', function () {
                    inputFile.click();
                });

                inputFile.addEventListener('change', function () {
                    const image = this.files[0];
                    if (!image) {
                        return;
                    }

                    if (image.size < 100000000) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            imgPreview.src = reader.result;
                            imgArea.dataset.img = image.name;
                            imgPreview.style.display = 'block';
                        };
                        reader.readAsDataURL(image);
                    } else {
                        alert('Image size more than 100MB');
                    }
                });
            });
                              
        </script>

            <!-- 
            - #PROJECTS
        -->

        <section class="projects">

            <div class="section-title-wrapper">
            <h2 class="section-title"> Events</h2>

            <!-- <button class="btn btn-link icon-box">
                <span>View All</span>

                <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
            </button> -->
            </div>

            <ul class="project-list">
        
            <?php
            $res=mysqli_query($con,"SELECT * FROM `event` order by `date` DESC");
            while($row=mysqli_fetch_assoc($res)){
                $event_id=$row['id'];
            
            ?>

            <li class="project-item">
                <div class="card project-card">

                <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                    <span class="material-symbols-rounded  icon">more_horiz</span>
                </button>

                <ul class="ctx-menu">

                    <!-- <li class="ctx-item">
                    <button class="ctx-menu-btn icon-box">
                        <span class="material-symbols-rounded  icon" aria-hidden="true">visibility</span>

                        <span class="ctx-menu-text">View</span>
                    </button>
                    </li>

                    <li class="ctx-item">
                    <button class="ctx-menu-btn icon-box">
                        <span class="material-symbols-rounded  icon" aria-hidden="true">edit</span>

                        <span class="ctx-menu-text">Edit</span>
                    </button>
                    </li> -->

                    <li class="divider"></li>

                    <li class="ctx-item">
                        <a class="ctx-menu-btn red icon-box" id="delete" href="create_event.php?action=delete&id=<?php echo $row['id'] ?>">
                            <span class="material-symbols-rounded  icon" aria-hidden="true">delete</span>
                            <span class="ctx-menu-text">Delete</span>
                        </a>
                    </li>

                </ul>

                <time class="card-date" datetime="2022-04-09"><?php echo $row['date'] ?> <?php echo $row['time'] ?> </time>

                <h3 class="card-title">
                    <a href="eventdetail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                </h3>

                <div class="card-badge blue"><?php echo $row['location'] ?></div>

                <p class="card-text">
                <?php echo $row['des'] ?>
                </p>

                <!-- <div class="card-progress-box">

                    <div class="progress-label">
                    <span class="progress-title">Progress</span>

                    <data class="progress-data" value="75">0</data>
                    </div>

                    <div class="progress-bar">
                    <div class="progress" style="--width: 75%; --bg: var(--emerald);"></div>
                    </div>

                </div> -->

                <ul class="card-avatar-list">
                    <?php
                        $event_join_res=mysqli_query($con,"SELECT * FROM `event_join` where `event_id`='$event_id'");
                        while($event_join_row=mysqli_fetch_assoc($event_join_res)){
                            $member_id=$event_join_row['member_id'];
                            $member_res=mysqli_query($con,"SELECT * FROM `member` where `id`='$member_id'");
                            $member_row=mysqli_fetch_assoc($member_res);
                            ?>
                            <li class="card-avatar-item">
                                <a href="#">
                                    <img src="../media/image/<?php echo $member_row['image'] ?>" alt="Elizabeth Foster" width="32" height="32">
                                </a>
                            </li>
                            <?php
                        }
                    ?>

                    

                </ul>

                </div>
            </li>
            <?php }
            ?>


            </ul>

        </section>
    </article>
</main>





<?php
require('foot.php');
?>