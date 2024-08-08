<?php
require('top.php');
?>
<main>
    <article class="container article">
            <!-- 
            - #PROJECTS
        -->

        <section class="projects">

            <div class="section-title-wrapper">
            <h2 class="section-title">Choose Event to view live score</h2>

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

                <!-- <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                    <span class="material-symbols-rounded  icon">more_horiz</span>
                </button> -->

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
                    <a href="event_live.php?id=<?php echo $row['id'] ?> "><?php echo $row['name'] ?></a>
                </h3>

                <div class="card-badge blue"><?php echo $row['location'] ?></div>


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