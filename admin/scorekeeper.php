<?php
require('top.php');
?>

<style>
    .container {
       
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    @media only screen and (max-width: 768px) {
        table {
            width: auto;
        }

        th, td {
            width: auto;
        }
    }

    @media only screen and (max-width: 600px) {
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
        td:nth-of-type(2):before { content: "Name"; }
        td:nth-of-type(3):before { content: "Email"; }
        td:nth-of-type(4):before { content: "Mobile"; }
        td:nth-of-type(5):before { content: "Address"; }
        td:nth-of-type(6):before { content: "HC"; }
    }
</style>
<main>
    <article class="container article">
        <section class="container">
            <div class="section-title-wrapper">
                <h2 class="section-title">All Scorekeeper</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th></th>
 

                    </tr>
                </thead>
                <tbody>
                <?php
                        $res=mysqli_query($con,"SELECT * FROM `scorekeeper` order by `date` DESC");
                        while($row=mysqli_fetch_assoc($res)){

                        ?>
                    <tr>
                        <td><img src="../media/image/<?php echo $row['image'] ?>" alt="Profile Image" width="48" height="48"></td>
                        <td><?php echo $row['name'] ?></td><td>
                        <?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                       
                        <td>
                                <?php
                                    $score_id=$row['id'];
                                    if($row['action']=='accept'){
                                        ?>
                                        <li class="ctx-item">
                                            <a class="ctx-menu-btn red icon-box" id="delete" href="scorekeeper_accept.php?action=not_accept&id=<?php echo $row['id'] ?>">
                                                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>
                                                <span class="ctx-menu-text">NO Accept</span>
                                            </a>
                                        </li>
                                        <?php
                                    }else{
                                        ?>
                                        <li class="ctx-item">
                                            <a class="ctx-menu-btn red icon-box" id="delete" href="scorekeeper_accept.php?action=accept&id=<?php echo $row['id'] ?>">
                                                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>
                                                <span class="ctx-menu-text">Accept</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                ?>

                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </article>
   

</main>





<?php
require('foot.php');
?>