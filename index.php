<?php
require('connection.php');

if(isset($_SESSION['USER_LOGIN']))
{
    $user_id=$_SESSION['USER_ID'];
    $res=mysqli_query($con,"SELECT * FROM `member` where `id`='$user_id'");
    $row=mysqli_fetch_assoc($res);
    $member_id=$row['id'];

}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cherry Lwin Golf Club</title>

        <!-- CSS FILES -->   
        <link rel="shortcut icon" href="./images/logo.png" type="image/svg+xml">             
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
        
    </head>
    
    <body>

        <main>

            <nav class="navbar navbar-expand-lg">                
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img src="images/logo.png" class="navbar-brand-image img-fluid">
                       
                    </a>

                    <div class="d-lg-none ms-auto me-3">
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Membership</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6">Contact Us</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="event-listing.html">Event Listing</a></li>

                                    <li><a class="dropdown-item" href="event-detail.html">Event Detail</a></li>
                                </ul>
                            </li>
                        </ul>

                        <?php
                            if(isset($_SESSION['USER_LOGIN']))
                            {
                            $user_id=$_SESSION['USER_ID'];
                            $res=mysqli_query($con,"SELECT * FROM `member` where `id`='$user_id'");
                            $row=mysqli_fetch_assoc($res);
                            ?>
                            <span style="color:#fff;"><?php echo $row['name'] ?></span>
                            <div class="d-none d-lg-block ms-lg-3">
                                <a href="logout.php" class="btn custom-btn custom-border-btn" >Logout</a>
                            </div>
                            <?php
                            
                            }else{
                            ?>
                            <div class="d-none d-lg-block ms-lg-3">
                                <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a>
                            </div>
                            
                            <?php
                            }
                        ?>

                        
                    </div>
                </div>
            </nav>

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">                
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Member Login</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body d-flex flex-column">
                    <form class="custom-form member-login-form" action="register_member.php" method="post" role="form">

                        <div class="member-login-form-body">
                            <div class="mb-4">
                                <label class="form-label mb-2" for="member-login-number">Membership Email</label>

                                <input type="email" name="email" id="member-login-number" class="form-control" placeholder="Example@gmail.com" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label mb-2" for="member-login-password">Password</label>

                                <input type="password" name="password" id="member-login-password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Password" required="">
                            </div>

                            <!-- <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div> -->

                            <div class="col-lg-5 col-md-7 col-8 mx-auto">
                                <button type="submit" class="form-control" name="login">Login</button>
                            </div>

                            <!-- <div class="text-center my-4">
                                <a href="#">Forgotten password?</a>
                            </div> -->
                        </div>
                    </form>

                    <div class="mt-auto mb-5">
                        <p>
                            <strong class="text-white me-3">Any Questions?</strong>

                            <a href="tel: 010-020-0340" class="contact-link">
                            	010-020-0340
                            </a>
                        </p>
                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </div>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

                <div class="section-overlay"></div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <h2 class="text-white">Welcome to Cherry Lwin Golf Club</h2>

                            <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                                <span>This Club is</span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Refresh</b>
                                    <b>Resort</b>
                                    <b>Modern</b>
                                </span>
                            </h1>

                            <div class="custom-btn-group">
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3">Our Story</a>

                                <a href="#section_3" class="link smoothscroll">Become a member</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            
                        </div>

                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </section>


            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-lg-5 mb-4">About Golf Club</h2>
                        </div>

                        <div class="col-lg-5 col-12 me-auto mb-4 mb-lg-0">
                            <h3 class="mb-3">Golf Club History</h3>

                            <p><strong>ချယ်ရင်လွင် တပ်မတော်ဂေါက်ကွင်း</strong>သည် မန္တလေးတိုင်းဒေသကြီး၊ ပြင်ဦးလွင်ခရိုင်၊ ပြင်ဦးလွင်မြို့နယ်၊ ပြင်ဦးလွင်မြို့၊ စစ်တက္ကသိုလ်၊ အဆင့်မြင့်စာပေပညာဗဟိုဌာန ကျောင်းဧရိယာ ပရိဝုဏ်အတွင်း တည်ရှိပါသည်။</p>

                            <p> Thank you for visiting.</p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="images/pol.jpg" class="member-block-image img-fluid" alt="">

                                    <!-- <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul> -->
                                </div>

                                <!-- <div class="member-block-info d-flex align-items-center">
                                    <h4>Michael</h4>

                                    <p class="ms-auto">Founder</p>
                                </div> -->
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="images/pol3.jpg" class="member-block-image img-fluid" alt="">

                                    <!-- <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul> -->
                                </div>

                                <!-- <div class="member-block-info d-flex align-items-center">
                                    <h4>Michael</h4>

                                    <p class="ms-auto">Founder</p>
                                </div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="section-bg-image">
                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="section-bg-image-block">
                                <h2 class="mb-lg-3">Get our newsletter</h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore et dolore.</p>

                                <form action="#" method="get" class="custom-form mt-lg-4 mt-2" role="form">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bi-envelope" id="basic-addon1"></span>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">

                                        <button type="submit" class="form-control">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>
            </section>


            <section class="membership-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center mx-auto mb-lg-5 mb-4">
                            <h2><span>Membership</span> at Golf Club</h2>
                        </div>

                        <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                            <h4 class="mb-4 pb-lg-2">Membership Fees</h4>

                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width: 34%;">Yearly Access</th>
                                            
                                            <th style="width: 22%;">Free</th>
                                            
                                            <th style="width: 22%;">Free</th>
                                            
                                            <th style="width: 22%;">Free</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-start">Golf Insurance</th>
                                            
                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                            
                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                            
                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Club Facilities</th>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Country Club</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Weekend Seasonal</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Premium Courses</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row" class="text-start">Pro's Networking</th>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mx-auto">
                        <h4 class="mb-4 pb-lg-2">Please join us!</h4>
                        <style>
                            .img-area {
                                position: relative;
                                width: 100%;
                                height: 240px;
                                background: #fff;
                                margin-bottom: 30px;
                                border-radius: 15px;
                                overflow: hidden;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                flex-direction: column;
                            }
                            .img-area .icon {
                                font-size: 100px;
                            }
                            .img-area h3 {
                                font-size: 20px;
                                font-weight: 500;
                                margin-bottom: 6px;
                            }
                            .img-area p {
                                color: #999;
                            }
                            .img-area p span {
                                font-weight: 600;
                            }
                            .img-area img {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                object-position: center;
                                z-index: 100;
                            }
                            .img-area::before {
                                content: attr(data-img);
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, .5);
                                color: #fff;
                                font-weight: 500;
                                text-align: center;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                pointer-events: none;
                                opacity: 0;
                                transition: all .3s ease;
                                z-index: 200;
                            }
                            .img-area.active:hover::before {
                                opacity: 1;
                            }
                            .select_btn {
                                display: block;
                                width: 100%;
                                padding: 16px 0;
                                border-radius: 15px;
                                background: #fff;
                                color: blue;
                                font-weight: 500;
                                font-size: 16px;
                                border: none;
                                cursor: pointer;
                                transition: all .3s ease;
                                text-align:center;
                            }
                            .select-image:hover {
                                background: blue;
                                color:#fff;
                            }
                        </style>
                        <form action="register_member.php" method="post" class="custom-form membership-form shadow-lg" role="form" enctype="multipart/form-data">

                            <h4 class="text-white mb-4">Register as a member</h4>

                            <div class="form-group">
                                <label for="profile-picture">Profile Picture</label>
                                <input type="file" id="file" accept="image/*" name="image" hidden>
                                <div class="img-area" data-img="">
                                    <i class='bx bxs-cloud-upload icon'></i>
                                    <h3>Upload Cover Image</h3>
                                    <p>Image size must be less than <span>2MB</span></p>
                                    
                                </div>
                                <div>
                                    <a class="select_btn" id="select">Select Image</a>
                                    <br>
                                    
                                </div>
                            </div>

                            <!-- Other Form Fields -->
                            <div class="form-floating">
                                <input type="text" name="full_name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                <label for="full-name">Full Name</label>
                            </div>

                            <div class="form-floating">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                <label for="email">Email address</label>
                            </div>

                            <div class="form-floating">
                                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone Number" required="">
                                <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-floating">
                                <input type="address" name="address" id="address" class="form-control" placeholder="Address" required="">
                                <label for="phone">Address</label>
                            </div>
                            <div class="form-floating">
                                <input type="address" name="hc" id="hc" class="form-control" placeholder="HC" required="">
                                <label for="phone">HC</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Create Password" required="">
                                <label for="password">Create Password</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" name="verify_password" id="verify_password" class="form-control" placeholder="Verify Password" required="">
                                <label for="verify_password">Verify Password</label>
                                <div id="password-error" class="error-message"></div>
                            </div>

                            <button type="submit" class="btn btn-primary" name="register_member" id="submit-btn">Submit</button>
                            </form>
                            <!-- Bootstrap JS and jQuery -->
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                const selectImageBtn = document.getElementById('select');
                                const saveImageBtn = document.getElementById('save');
                                const inputFile = document.getElementById('file');
                                const imgArea = document.querySelector('.img-area');
                                const uploadedImage = document.getElementById('uploaded-image');

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
                                            const allImg = imgArea.querySelectorAll('img');
                                            allImg.forEach(item=> item.remove());
                                            const imgUrl = reader.result;
                                            const img = document.createElement('img');
                                            img.src = imgUrl;
                                            imgArea.appendChild(img);
                                            imgArea.classList.add('active');
                                            imgArea.dataset.img = image.name;
                                            };
                                        reader.readAsDataURL(image);
                                    } else {
                                        alert('Image size more than 100MB');
                                    }
                                });

                                $("#verify_password").on("input", function () {
                                    var password = $("#password").val();
                                    var verifyPassword = $(this).val();

                                    if (password !== verifyPassword) {
                                        $("#password-error").html("Passwords do not match");
                                        $("#submit-btn").prop("disabled", true);
                                    } else {
                                        $("#password-error").html("");
                                        $("#submit-btn").prop("disabled", false);
                                    }
                                });
                                


                            });

                            </script>

                        </div>

                    </div>
                </div>
            </section>


            <section class="events-section section-bg section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-lg-3">Upcoming Events</h2>
                        </div>

                     
                        <?php
                        $res = mysqli_query($con, "SELECT * FROM `event` ORDER BY `date` DESC");
                        while ($row = mysqli_fetch_assoc($res)) {
                            $event_id = $row['id'];
                        ?>

                            <div class="row custom-block custom-block-bg">
                                <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                                    <div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                        <h6><?php echo $row['time'] ?></h6>
                                        <strong class="text-white"><?php echo $row['date'] ?></strong>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                                    <div class="custom-block-image-wrap">
                                        <a>
                                            <img src="media/image/<?php echo $row['image'] ?>" class="custom-block-image img-fluid" alt="">
                                            <i class="custom-block-icon bi-link" id="join_event_<?php echo $row['id'] ?>"></i>
                                        </a>
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
                                                max-width: 400px;
                                                width: 100%;
                                            }

                                            /* Styles for the close button */
                                            .close-btn {
                                                font-size: 20px;
                                                position: absolute;
                                                top: 10px;
                                                right: 10px;
                                                cursor: pointer;
                                            }

                                            /* Styles for the submit button */
                                            .submit-btn {
                                                padding: 10px;
                                                background-color: #4CAF50;
                                                color: white;
                                                border: none;
                                                border-radius: 5px;
                                                cursor: pointer;
                                                margin-right: 10px;
                                                margin-bottom: 10px;
                                                /* Adjust the margin as needed */
                                            }

                                            /* Styles for the popup content (text and buttons) */
                                            .popup h4 {
                                                margin-bottom: 15px;
                                            }

                                            .popup p {
                                                margin-bottom: 20px;
                                            }

                                            /* Styles for the buttons in the popup */
                                            .popup button {
                                                width: 100%;
                                            }

                                            /* Responsive styles for the popup */
                                            @media screen and (max-width: 600px) {
                                                .popup {
                                                    max-width: 100%;
                                                }
                                            }
                                        </style>
                                        <div id="overlay_<?php echo $row['id'] ?>" class="overlay">
                                            <!-- Popup form -->
                                            <div class="popup" id="joinEventPopup_<?php echo $row['id'] ?>">
                                                <span class="close-btn" onclick="closeJoinEventPopup('<?php echo $row['id'] ?>')">&times;</span>
                                                <h4>Join Event Confirmation</h4>
                                                <p>Are you sure you want to join this event?</p>
                                                <button class="submit-btn" onclick="joinEvent('<?php echo $row['id'] ?>')">Join Event</button>
                                                <button class="submit-btn" onclick="closeJoinEventPopup('<?php echo $row['id'] ?>')">Cancel</button>
                                            </div>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            // Open popup when join_event is clicked
                                            document.getElementById('join_event_<?php echo $row['id'] ?>').addEventListener('click', function() {
                                                openJoinEventPopup('<?php echo $row['id'] ?>');
                                            });

                                            // Function to open the join event popup
                                            function openJoinEventPopup(eventId) {
                                                document.getElementById('overlay_' + eventId).style.display = 'flex';
                                            }

                                            // Function to close the join event popup
                                            function closeJoinEventPopup(eventId) {
                                                document.getElementById('overlay_' + eventId).style.display = 'none';
                                            }

                                            // Function to handle joining the event (you can customize this function)
                                            function joinEvent(eventId) {
                                                // Add your logic to handle joining the event
                                                // For this example, let's send an AJAX request to a PHP script

                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'join_event.php?member_id=<?php echo $member_id ?>&event_id=' + eventId,
                                                    data: {
                                                        event_id: eventId
                                                        // Add other data you want to send to the PHP script
                                                    },
                                                    success: function(response) {
                                                        // Handle the response from the PHP script
                                                        if (response.status === 'success') {
                                                            alert('Event joined successfully!');
                                                            closeJoinEventPopup(eventId);
                                                        } else if (response.status === 'joined') {
                                                            alert('Event already joined!');
                                                            closeJoinEventPopup(eventId);
                                                        } else {
                                                            alert('Error joining the event. Please try again.');
                                                        }
                                                    },
                                                    error: function() {
                                                        alert('An error occurred. Please try again later.');
                                                    }
                                                });
                                            }
                                        </script>

                                    </div>
                                </div>

                                <div class="col-lg-6 col-12 order-3 order-lg-0">
                                    <div class="custom-block-info mt-2 mt-lg-0">
                                        <a href="#" class="events-title mb-3"><?php echo $row['name'] ?></a>

                                        <p class="mb-0"><?php echo $row['des'] ?></p>

                                        <div class="d-flex flex-wrap border-top mt-4 pt-3">

                                            <div class="mb-4 mb-lg-0">
                                                <div class="d-flex flex-wrap align-items-center mb-1">
                                                    <span class="custom-block-span">Location:</span>
                                                    <p class="mb-0"><?php echo $row['location'] ?></p>
                                                </div>

                                                <div class="d-flex flex-wrap align-items-center">
                                                    <span class="custom-block-span">Prize:</span>
                                                    <p class="mb-0"><?php echo $row['prize'] ?></p>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center ms-lg-auto">
                                                <a onclick="list_show(<?php echo $row['id'] ?>)" class="btn btn-primary">Contestants</a>
                                                <a onclick="live_show(<?php echo $row['id'] ?>)" class="btn custom-btn">Live Score(36)</a>
                                                <a onclick="live_show_normal(<?php echo $row['id'] ?>)" class="btn custom-btn">Live Score(N)</a>
                                            </div>

                                            <div class="modal" id="playerlistModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Contestants of <?php echo $row['name'] ?></h5>
                                                            <div id="datetime"></div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <script>
                                                                function updateDateTime() {
                                                                    const datetimeElement = document.getElementById('datetime');
                                                                    const now = new Date();
                                                                    const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
                                                                    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
                                                                    const dateString = now.toLocaleDateString(undefined, dateOptions);
                                                                    const timeString = now.toLocaleTimeString(undefined, timeOptions);
                                                                    datetimeElement.textContent = dateString + ' ' + timeString;
                                                                }

                                                                // Update the date and time every second (1000 milliseconds)
                                                                setInterval(updateDateTime, 1000);

                                                                // Initial update
                                                                updateDateTime();
                                                            </script>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Table to display live scores -->
                                                            <table id="myTable" class="">
                        
                                                                <thead>
                                                                    
                                                                    <tr style="background:lightblue">
                                                                        <td>Group</td>
                                                                        <td>Profile</td>
                                                                        <td>Name</td>
                                                                        <td>Email</td>
                                                                        <td>Phone</td>
                                                                        <td>Address</td>
                                                                        <td>HC</td>
                                                                        <td>ScoreKeeper</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="list">
                                                                   
                                                                    
                                                                    
                                                                    
                                                                </tbody>
                                                                
                                                                <script>
                                                                    
                                                                </script>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <style>
                                                .modal-dialog {
                                                    margin: 10rem auto;
                                                    max-width: 80%;
                                                }
                                                .modal-content {
                                                    overflow: auto;
                                                
                                                }

                                                table {
                                                    border-collapse: collapse;
                                                    width: 100%;
                                                    max-width: 800px;
                                                    margin: auto;
                                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                                    overflow-x: auto;
                                                }

                                                th, td {
                                                    border: 1px solid #ddd;
                                                    padding: 10px;
                                                    text-align: center;
                                                    font-size: 14px;
                                                    min-width: 50px;
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
                                                .circle {
                                                            display: inline-flex;
                                                            align-items: center;
                                                            justify-content: center;
                                                            width: 30px;
                                                            height: 30px;
                                                            text-align: center;
                                                            border: 2px solid #ec2a44;
                                                            border-radius: 50%;
                                                            font-size: 13px;
                                                            color:#000; /* Adjust font size as needed */
                                                        }
                                                        .triangle {
                                                        font-weight:700px; 
                                                        width: 0;
                                                        height: 0;
                                                        border-style: inset;
                                                        border-width: 0  15px 30px 15px;
                                                        border-color: transparent transparent gold transparent;
                                                        
                                                    }

                                                    .triangle span{
                                                        position: relative;
                                                        top: 9px;
                                                        left: -4px;
                                                        font-weight:700px; 
                                                        color: #000; /* Text color */
                                                    }
                                                    .square {
                                                            display: inline-block;
                                                            width: 30px;
                                                            height: 30px;
                                                            align-items: center;
                                                            justify-content: center;
                                                            text-align: center;
                                                            border: 2px solid #07eb40;
                                                            line-height: 30px; /* Center the text vertically */
                                                        }
                                                        .double_square {
                                                            display: inline-block;
                                                            width: 30px;
                                                            height: 30px;
                                                            align-items: center;
                                                            justify-content: center;
                                                            text-align: center;
                                                            border: 5px double #3509d1;
                                                            line-height: 20px; /* Center the text vertically */
                                                        }

                                                @media (max-width: 768px) {
                                                    .modal-content {
                                                        max-width: 100%;
                                                    }

                                                    table {
                                                        width: 100%;
                                                    }

                                                    th, td {
                                                        font-size: 11px;
                                                        min-width: 15px;
                                                    }
                                                }
                                            </style>
                                            
                                            <div class="modal" id="liveScoreModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Live Scores </h5>
                                                            <div id="datetime"></div>
                                                            <script>
                                                                function updateDateTime() {
                                                                    const datetimeElement = document.getElementById('datetime');
                                                                    const now = new Date();
                                                                    const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
                                                                    const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
                                                                    const dateString = now.toLocaleDateString(undefined, dateOptions);
                                                                    const timeString = now.toLocaleTimeString(undefined, timeOptions);
                                                                    datetimeElement.textContent = dateString + ' ' + timeString;
                                                                }

                                                                // Update the date and time every second (1000 milliseconds)
                                                                setInterval(updateDateTime, 1000);

                                                                // Initial update
                                                                updateDateTime();
                                                            </script>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Table to display live scores -->
                                                            <table id="myTable" class="">
                        
                                                                <thead>
                                                                    
                                                                    <tr style="background:lightblue">
                                                                        <td></td>
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
                                                                        <td>First</td>
                                                                        <td>10</td>
                                                                        <td>11</td>
                                                                        <td>12</td>
                                                                        <td>13</td>
                                                                        <td>14</td>
                                                                        <td>15</td>
                                                                        <td>16</td>
                                                                        <td>17</td>
                                                                        <td>18</td>
                                                                        <td>Second</td>
                                                                        <td>Total</td>
                                                                        <td id="mark">Mark</td>
                                                                        <td>HC</td>
                                                                        <td>Birdie</td>
                                                                        <td>Par</td>
                                                                        <td>Net</td>
                                                                        
                                                                        
                                                                    </tr>
                                                                    <tr >
                                                                        <?php 
                                                                        $par_res=mysqli_query($con,"SELECT * FROM `hole` where id='1'");
                                                                        $par_row=mysqli_fetch_assoc($par_res);
                                                                        $fst_total=$par_row['1']+$par_row['2']+$par_row['3']+$par_row['4']+$par_row['5']+$par_row['6']+$par_row['7']+$par_row['8']+$par_row['9'];
                                                                        $sec_total=$par_row['10']+$par_row['11']+$par_row['12']+$par_row['13']+$par_row['14']+$par_row['15']+$par_row['16']+$par_row['17']+$par_row['18'];
                                                                        $all_total=$fst_total+$sec_total;
                                                                        ?>
                                                                        <td></td>
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
                                                                        <td><?php echo $fst_total?></td>
                                                                        <td><?php echo $par_row['10'] ?></td>
                                                                        <td><?php echo $par_row['11'] ?></td>
                                                                        <td><?php echo $par_row['12'] ?></td>
                                                                        <td><?php echo $par_row['13'] ?></td>
                                                                        <td><?php echo $par_row['14'] ?></td>
                                                                        <td><?php echo $par_row['15'] ?></td>
                                                                        <td><?php echo $par_row['16'] ?></td>
                                                                        <td><?php echo $par_row['17'] ?></td>
                                                                        <td><?php echo $par_row['18'] ?></td>
                                                                        <td><?php echo $sec_total?></td>
                                                                        <td><?php echo $all_total?></td>
                                                                        <td id="mark_c"><?php echo 0 ?></td>
                                                                        <td><?php echo 0 ?></td>
                                                                        <td><?php echo 0 ?></td>
                                                                        <td><?php echo 0 ?></td>
                                                                        <td><?php echo 0 ?></td>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="score_list">
                                                                    
                                                                    
                                                                    

                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    
                                                                    
                                                                </tbody>
                                                                
                                                                <script>
                                                                    
                                                                </script>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                            <script>
                                                function list_show(id) {
                                                    // Show the modal
                                                    $('#playerlistModal').modal('show');
                                                    // Reset group index for each event ID
                                                    resetGroupIndex();
                                                    list(id);
                                                }


                                                function list(id) {
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "get_player.php?id=" + id,
                                                        dataType: 'json',
                                                        success: function (response) {
                                                            // Group players by scorekeeper
                                                            var groupedPlayers = groupByScorekeeper(response);
                                                            // Update UI with grouped player data
                                                            listdata(groupedPlayers);
                                                        },
                                                        error: function (error) {
                                                            console.error('Error fetching player data:', error);
                                                        }
                                                    });
                                                }
                                                var groupColors = ['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0', '#ffb3e6', '#ff6666', '#c2f0c2', '#d9b3ff', '#e6f2ff'];
                                                var currentGroupIndex = 1;

                                                function listdata(groupedData) {
                                                    // Clear existing rows in the player list tbody
                                                    $('#list').empty();

                                                    // Iterate through grouped data and append rows to the player list
                                                    $.each(groupedData, function (scorekeeper, players) {
                                                        // Assign group number sequentially starting from 1
                                                        var groupNumber = getGroupNumber();
                                                        var groupColor = getGroupColor();
                                                        $.each(players, function (index, player) {
                                                            var row = '<tr style="background-color:' + groupColor + ';">';
                                                            row += '<td><div"><span>' + groupNumber + '</span></div></td>'; 
                                                            row += '<td> <img src="media/image/' + player.image + '" style="width:50px;height:50px;border-radius:50%"></td>';
                                                            row += '<td>' + player.name + '</td>';
                                                            row += '<td><div><span>' + player.email + '</span></div></td>';
                                                            row += '<td><div><span>' + player.phone + '</span></div></td>';
                                                            row += '<td><div><span>' + player.address + '</span></div></td>';
                                                            row += '<td><div"><span>' + player.hc + '</span></div></td>';
                                                            row += '<td><div"><span>' + player.scorekeeper + '</span></div></td>';
                                                            row += '</tr>';
                                                            $('#list').append(row);
                                                        });
                                                    });
                                                }

                                                function getGroupNumber() {
                                                    // Increment and return the current group number
                                                    return currentGroupIndex++;
                                                }

                                                function getGroupColor() {
                                                    // Return the color from the groupColors array based on currentGroupIndex
                                                    return groupColors[currentGroupIndex % groupColors.length];
                                                }

                                                // Reset currentGroupIndex for each event ID
                                                function resetGroupIndex() {
                                                    currentGroupIndex = 1;
                                                }


                                                function groupByScorekeeper(players) {
                                                    var groupedPlayers = {};
                                                    players.forEach(function (player) {
                                                        var scorekeeper = player.scorekeeper;
                                                        if (!groupedPlayers[scorekeeper]) {
                                                            groupedPlayers[scorekeeper] = [];
                                                        }
                                                        groupedPlayers[scorekeeper].push(player);
                                                    });
                                                    return groupedPlayers;
                                                }



                                                var liveShowInterval; 
                                                function live_show(eventId) {
                                                    clearInterval(liveShowInterval);
                                                    // Fetch live scores and display the modal
                                                    fetchAllScoreData(eventId);
                                                    $('#liveScoreModal').modal('show');
                                                    $('#mark').css('display', '');
                                                    $('#mark_c').css('display', '');


                                                    function fetchAllScoreData(eventId) {
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "get_scores.php?id="+eventId,
                                                        dataType: 'json',
                                                        success: function (response) {
                                                            // Update your UI with the fetched data
                                                            displayScoreData(response);
                                                        },
                                                        error: function (error) {
                                                            console.error('Error fetching score data:', error);
                                                        }
                                                    });
                                                    }
                                                    liveShowInterval = setInterval(function () {
                                                        fetchAllScoreData(eventId);
                                                    }, 1000);

                                                    function displayScoreData(data) {
                                                        // Clear existing rows in the score_list tbody
                                                        $('#score_list').empty();
                                                                            
                                                        // Iterate through the fetched data and append rows to the score_list
                                                        $.each(data, function(index, score) {
                                                            var fstsum = 0;
                                                            var secsum = 0;
                                                            var allsum = 0;
                                                            var marks = 0;

                                                            for (var i = 1; i <= 9; i++) {
                                                                fstsum += parseInt(score[i]) || 0;
                                                            }
                                                            for (var i = 10; i <= 18; i++) {
                                                                secsum += parseInt(score[i]) || 0;
                                                            }
                                                            for (var i = 1; i <= 18; i++) {
                                                                allsum += parseInt(score[i]) || 0;
                                                            }
                                                            for (var i = 1; i <= 18; i++) {
                                                                marks += parseInt(score.marks[i]) || 0;
                                                            }
                                                            var HC = 36 - marks;
                                                            var NET = allsum - (HC + 72);

                                                            var row = '<tr>';
                                                            row += '<td> <img src="media/image/' + score.image + '" style="width:50px;height:50px;border-radius:50%"></td>';
                                                            row += '<td>' + score.name + '</td>'; // Replace with actual column names
                                                            row += '<td> <div class="'+score.class['1']+'"><span>' + score['1'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['2']+'"><span>' + score['2'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['3']+'"><span>' + score['3'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['4']+'"><span>' + score['4'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['5']+'"><span>' + score['5'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['6']+'"><span>' + score['6'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['7']+'"><span>' + score['7'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['8']+'"><span>' + score['8'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['9']+'"><span>' + score['9'] + '</span></div></td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + fstsum + '</td>';
                                                            row += '<td><div class="'+score.class['10']+'"><span>' + score['10'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['11']+'"><span>' + score['11'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['12']+'"><span>' + score['12'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['13']+'"><span>' + score['13'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['14']+'"><span>' + score['14'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['15']+'"><span>' + score['15'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['16']+'"><span>' + score['16'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['17']+'"><span>' + score['17'] + '</span></div></td>';
                                                            row += '<td><div class="'+score.class['18']+'"><span>' + score['18'] + '</span></div></td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + secsum + '</td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + allsum + '</td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + score.sumOfMarks + '</td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + HC + '</td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + score.birdieCount + '</td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + score.parCount + '</td>';
                                                            row += '<td style="font-weight:600;font-style: italic">' + score.NET + '</td>';
                                                            // Add more columns as needed
                                                            row += '</tr>';

                                                            $('#score_list').append(row);
                                                        });

                                                    }

                                                    // Example: Call the fetchAllScoreData function on page load or as needed
                                                                    
                                                    // 1000 milliseconds = 1 second// Replace with actual value

                                                    
                                                }
                                                
                                                function live_show_normal(eventId) {
                                                    clearInterval(liveShowInterval);
                                                    // Fetch live scores and display the modal
                                                    fetchAllScoreDataNormal(eventId);
                                                    $('#liveScoreModal').modal('show');
                                                    $('#mark').css('display', 'none');
                                                    $('#mark_c').css('display', 'none');

                                                    function fetchAllScoreDataNormal(eventId) {
                                                                        $.ajax({
                                                                            type: "GET",
                                                                            url: "get_scores_normal.php?id="+eventId,
                                                                            dataType: 'json',
                                                                            success: function (response) {
                                                                                // Update your UI with the fetched data
                                                                                displayScoreData(response);
                                                                            },
                                                                            error: function (error) {
                                                                                console.error('Error fetching score data:', error);
                                                                            }
                                                                        });
                                                                    }
                                                                    liveShowInterval = setInterval(function () {
                                                                        fetchAllScoreDataNormal(eventId);
                                                                    }, 1000);
                                                                    

                                                                    function displayScoreData(data) {
                                                                            // Clear existing rows in the score_list tbody
                                                                            
                                                                            $('#score_list').empty();
                                                                            
                                                                            // Iterate through the fetched data and append rows to the score_list
                                                                            $.each(data, function(index, score) {
                                                                                var fstsum = 0;
                                                                                var secsum = 0;
                                                                                var allsum = 0;
                                                                                var marks = 0;

                                                                                for (var i = 1; i <= 9; i++) {
                                                                                    fstsum += parseInt(score[i]) || 0;
                                                                                }
                                                                                for (var i = 10; i <= 18; i++) {
                                                                                    secsum += parseInt(score[i]) || 0;
                                                                                }
                                                                                for (var i = 1; i <= 18; i++) {
                                                                                    allsum += parseInt(score[i]) || 0;
                                                                                }
                                                                                for (var i = 1; i <= 18; i++) {
                                                                                    marks += parseInt(score.marks[i]) || 0;
                                                                                }
                                                                                var HC = 36 - marks;
                                                                                var NET = allsum - (HC + 72);

                                                                                var row = '<tr>';
                                                                                row += '<td> <img src="media/image/' + score.image + '" style="width:50px;height:50px;border-radius:50%"></td>';
                                                                                row += '<td>' + score.name + '</td>'; // Replace with actual column names
                                                                                row += '<td> <div class="'+score.class['1']+'"><span>' + score['1'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['2']+'"><span>' + score['2'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['3']+'"><span>' + score['3'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['4']+'"><span>' + score['4'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['5']+'"><span>' + score['5'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['6']+'"><span>' + score['6'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['7']+'"><span>' + score['7'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['8']+'"><span>' + score['8'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['9']+'"><span>' + score['9'] + '</span></div></td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + fstsum + '</td>';
                                                                                row += '<td><div class="'+score.class['10']+'"><span>' + score['10'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['11']+'"><span>' + score['11'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['12']+'"><span>' + score['12'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['13']+'"><span>' + score['13'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['14']+'"><span>' + score['14'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['15']+'"><span>' + score['15'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['16']+'"><span>' + score['16'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['17']+'"><span>' + score['17'] + '</span></div></td>';
                                                                                row += '<td><div class="'+score.class['18']+'"><span>' + score['18'] + '</span></div></td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + secsum + '</td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + allsum + '</td>';
                                                                                //row += '<td style="font-weight:600;font-style: italic">' + score.sumOfMarks + '</td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + score.hc + '</td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + score.birdieCount + '</td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + score.parCount + '</td>';
                                                                                row += '<td style="font-weight:600;font-style: italic">' + score.NET + '</td>';
                                                                                // Add more columns as needed
                                                                                row += '</tr>';

                                                                                $('#score_list').append(row);
                                                                            });

                                                }
                                                
                                                // 1000 milliseconds = 1 second// Replace with actual value
                                                }
                                                $('#liveScoreModal').on('hidden.bs.modal', function () {
                                                    // Clear the interval when the modal is hidden (closed)
                                                    clearInterval(liveShowInterval);
                                                });
                                                                    

                                               

                                                


                                                                    
                                                                    
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </section>

            


            <section class="contact-section section-padding" id="section_6">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12">
                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <h2 class="mb-4 pb-2">Contact Programmers</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">
                                            
                                            <label for="floatingInput">Full Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>
                                            
                                            <label for="floatingTextarea">Message</label>
                                        </div>

                                        <button type="submit" class="form-control">Submit Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="contact-info mt-5">
                                <div class="contact-info-item">
                                    <div class="contact-info-body">
                                        <strong>London, United Kingdom</strong>

                                        <p class="mt-2 mb-1">
                                            <a href="tel: 010-020-0340" class="contact-link">
                                                (020) 
                                                010-020-0340
                                            </a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="mailto:info@company.com" class="contact-link">
                                                info@company.com
                                            </a>
                                        </p>
                                    </div>

                                    <div class="contact-info-footer">
                                        <a href="#">Directions</a>
                                    </div>
                                </div>

                                <img src="images/WorldMap.svg" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                        <a class="navbar-brand d-flex align-items-center" href="index.html">
                            <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="">
                           
                        </a>
                    </div>

                    <div class="col-lg-3 col-12">
                        <h5 class="site-footer-title mb-4">Join Us</h5>

                        <p class="d-flex border-bottom pb-3 mb-3 me-lg-3">
                            <span>Mon-Fri</span>
                            6:00 AM - 6:00 PM
                        </p>

                        <p class="d-flex me-lg-3">
                            <span>Sat-Sun</span>
                            6:30 AM - 8:30 PM
                        </p>
                        <br>
                    </div>

                        <div class="col-lg-2 col-12 ms-auto">
                            <ul class="social-icon mt-lg-5 mt-3 mb-4">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>
                            
                        </div>

                </div>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#81B29A" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/animated-headline.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>