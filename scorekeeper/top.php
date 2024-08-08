<?php
require('../connection.php');
if(isset($_SESSION['KEEPER_LOGIN'])){
            $user_id=$_SESSION['KEEPER_ID'];
              $res=mysqli_query($con,"SELECT * FROM `scorekeeper` where `id`='$user_id'");
              $row=mysqli_fetch_assoc($res);
              if($row['action']=='accept'){
                
              }else{
                ?>
                <script>
                    window.location.href='login.php';
                </script>
              <?php
              }

}else{
          ?>
            <script>
                window.location.href='login.php';
            </script>
            <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scorekeeper Dashboard</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../images/logo.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">


  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;900&display=swap"
    rel="stylesheet">

  <!-- 
    - material icon link
  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />

</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">Scorekeeper</a>
      </h1>

      <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
        <span class="material-symbols-rounded  icon">menu</span>
      </button>

      <nav class="navbar">
        <div class="container">

          <ul class="navbar-list">

            <li>
              <a href="index.php" class="navbar-link active icon-box">
                <span class="material-symbols-rounded  icon">grid_view</span>

                <span>Home</span>
              </a>
            </li>

            <li>
              <a href="event.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">Event</span>

                <span>Event</span>
              </a>
            </li>

            <li>
              <a href="livescore.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">cast</span>

                <span>Live Score(36)</span>
              </a>
            </li>
            <li>
              <a href="livescore_normal.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">cast</span>

                <span>Live Score(N)</span>
              </a>
            </li>
            <li>
              <a href="setting.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">settings</span>

                <span>Settings</span>
              </a>
            </li>

          </ul>

          <ul class="user-action-list">

            <!-- <li>
              <a href="#" class="notification icon-box">
                <span class="material-symbols-rounded  icon">notifications</span>
              </a>
            </li> -->
            <?php
            if(isset($_SESSION['KEEPER_LOGIN'])){
              $user_id=$_SESSION['KEEPER_ID'];
              $res=mysqli_query($con,"SELECT * FROM `scorekeeper` where `id`='$user_id'");
              $row=mysqli_fetch_assoc($res);
              ?>
              <li>
              <a href="#" class="header-profile">

                <figure class="profile-avatar">
                  <img src="../media/image/<?php echo $row['image'] ?>" alt="Elizabeth Foster" width="32" height="32">
                </figure>

                <div>
                  <p class="profile-title"><?php echo $row['name'] ?></p>

                  <p class="profile-subtitle">Scorekeeper</p>
                </div>

              </a>
            </li>
            <li>
              <a href="logout.php" class="header-profile">

                
                <div>
                  <p class="profile-title">Logout</p>

                  
                </div>

              </a>
            </li>
              <?php
            } else{
              ?>
              <li>
              <a href="login.php" class="header-profile">

                
                <div>
                  <p class="profile-title">Login</p>

                  
                </div>

              </a>
            </li>
              <?php
            }
            ?>

            
            


          </ul>

        </div>
      </nav>

    </div>
  </header>