<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/svg+xml">  
    <title>Cherry Lwin Golf Club</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main>
      <div class="box" style="height: 856px;">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="signin_signout.php" class="sign-in-form" method="post" enctype="multipart/form-data">
              <div class="logo">
                <img src="../images/logo.png" alt="easyclass" />
                <h4>Cherry Lwin Golf Club</h4>
              </div>

              <div class="heading">
                <h2>Cherry Lwin Golf Club</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
              
                <div class="input-wrap">
                  <input
                    name="email"
                    type="text"
                    minlength="4"
                    class="input-field"
                    
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    name="password"
                    type="password"
                    minlength="4"
                    class="input-field"
                    
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" name="signin"/>

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="signin_signout.php" autocomplete="off" class="sign-up-form" method="post" enctype="multipart/form-data">
              <div class="logo">
                <img src="../images/logo.png" alt="easyclass" />
                <h4>Cherry Lwin Golf Club</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>
              <style>
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
                    width: 100%;
                    height: 100%;
                    margin-top: 10px;
                    object-fit: cover;
                    display: none;

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
              <div class="actual-form">
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


                
                <div class="input-wrap">
                  <input
                    name="name"
                    type="text"
                    minlength="4"
                    class="input-field"
                    
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    name="email"
                    type="email"
                    class="input-field"
                    
                    required
                  />
                  <label>Email</label>
                </div>
                <div class="input-wrap">
                  <input
                    name="phone"
                    type="tel"
                    class="input-field"
                  
                    required
                  />
                  <label>Phone</label>
                </div>
                <div class="input-wrap">
                  <input
                    name="address"
                    type="address"
                    class="input-field"
                 
                    required
                  />
                  <label>Addess</label>
                </div>

                <div class="input-wrap">
                  <input
                    name="password"
                    type="password"
                    minlength="4"
                    class="input-field"
                    
                    required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" name="signup" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
                            <script>
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
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/driver.jpg" class="image img-1 show" alt="" />
              <img src="./img/golf.jpg" class="image img-2" alt="" />
              <img src="./img/golf-1.jpg" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Refresh</h2>
                  <h2>Training</h2>
                  <h2>Event</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
  </body>
</html>
