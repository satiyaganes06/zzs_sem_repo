<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - Login</title>
    
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

     <!--Bootstrap Script-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/userLoginView.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Assert/web_logo.png"/>
</head>

<body>

    <!-- Toast -->
    <?php include('../Common/alert.php'); ?>
    
    <div class="container-md-8 container-sm-12 row d-flex justify-content-center">

        <!-- Header Section -->
        <?php
          include_once('../Common/applicantHeader.html');
        ?>


        <!-- Content Section -->
        <section class="contentPart row p-4 mt-3 bg-white shadow">
            <!-- Content -->

            <div class="grid1 container d-flex flex-column justify-content-around col-md-7 col-sm-12">
                

                  <!-- Carousel wrapper -->
                    <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                      <!-- Indicators -->
                      <div class="carousel-indicators">
                        <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true"
                          aria-label="Slide 1"></button>
                        <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
                      </div>

                      <!-- Inner -->
                      <div class="carousel-inner rounded-5 shadow-4-strong">
                        <!-- Single item -->
                        <div class="carousel-item active">
                          <img src="../../Assert/Carousel 1.jpg" class="d-block w-100"
                            alt="Marriage" />

                            <div class="carousel-caption d-none d-md-block text-center" >
                            
                              <blockquote class="blockquote border-0">
                                  <p class="font-bold lead small ">Sistem ini yang disediakan berasaskan proses kerja untuk kegunaan semua Jabatan Agama Islam Negeri (JAIN) khususnya Pejabat Agama Islam Daerah (PAID) di Malaysia secara lebih efisien dan teratur. </p>
                                  
                              </blockquote>
                            </div>
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item">
                          <img src="../../Assert/Carousel 2-1.jpg" class="d-block w-100"
                            alt="Canyon at Nigh" />

                            <div class="carousel-caption d-none d-md-block text-center pb-5">

                              <blockquote class="blockquote border-0">
  
                                  <p class="font-italic lead small"> <i class="fa fa-quote-left mr-3 text-dark"></i>Semakin banyak kemanisan yang kita ambil sebelum pernikahan, Semakin tawar dan hambar sesebuah perkahwinan itu.</p>
                                  
                                  <footer class="blockquote-footer text-dark bg-warning rounded-7 opacity-75">Ustaz Pahrol
                                      <cite title="Source Title">Mengembirakan Pasangan</cite>
                                  </footer>
  
                              </blockquote>
  
                            </div>
                        </div>

                        <!-- Single item -->
                        <div class="carousel-item">
                          <img src="../../Assert/Carousel 3.jpg" class="d-block w-100"
                            alt="Cliff Above a Stormy Sea" />
                            <div class="carousel-caption d-none d-md-block">

                              <blockquote class="blockquote border-0 pb-4">
  
                                  <p class="font-italic lead small"> <i class="fa fa-quote-left mr-3 text-dark "></i>Semakin banyak kemanisan yang kita ambil sebelum pernikahan, Semakin tawar dan hambar sesebuah perkahwinan itu.</p>
                                  
                                  <footer class="blockquote-footer text-dark bg-warning rounded-7 opacity-75">Ustaz Pahrol
                                      <cite title="Source Title">Mengembirakan Pasangan</cite>
                                  </footer>
  
                              </blockquote>
  
                            </div>
                        </div>
                      </div>
                      <!-- Inner -->

                      <!-- Controls -->
                      <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <!-- Carousel wrapper -->


                <div class="imgBody d-flex justify-content-around rounded-5 shadow pt-3 ">

                  <div class="imgBox shadow rounded ml-3"></div>
                  <div class="imgBox shadow rounded"></div>
                  <div class="imgBox shadow rounded"></div>
                  <div class="imgBox mr-3 shadow rounded"></div>
                </div>

            </div>


            <div class="loginPart container col-md-4 col-sm-12 pl-5 pr-5 pt-3 shadow rounded-5 text-center">

                <img src="../../Assert/login_top_frame.png" alt="login top frame">

                <h3 class="bold loginTitle mt-4">Log Masuk</h3>

                <div id="error_message">
                  <!-- the error or success message pass in this div from js -->  
                </div>

                <!-- form login -->
                <form class="mt-4" action="../../../public/index.php?action=loginAccount" method="post" id="myform" >
                  <!-- onsubmit = "return loginFormValidate();" -->
  
                  <!-- IC -->
                  <div class="form-outline bg-white rounded-4">
                    <input type="text" id="formIC" name="User_ic" class="form-control form-control-sm mb-4 text-dark rounded-3" />
                    <label class="form-label" for="formIC">Kad Pengenalan</label>
                  </div>

                  <!-- Password -->
                  <!-- <input type="password" id="password" class="form-control mb-4 shadow rounded-3" placeholder="Password" > -->
                  <div class="form-outline bg-white rounded-4">
                    <input type="password" id="formPassword" name="User_password" class="form-control form-control-sm mb-4 shadow rounded-3" />
                    <label class="form-label" for="formPassword">Kata Laluan</label>
                  </div>

                  
                  <select class="browser-default custom-select-sm shadow rounded-3" name="User_type" required>
                      <option class="text-muted" value="" disabled selected>Pilih</option>
                      <option value="Pemohon">Pemohon</option>
                      <option value="Kakitangan">Kakitangan</option>
                  </select>

                  <!-- Sign in button -->
                  <button class="btn btn-dark btn-block mt-5 text-light " type="submit" data-mdb-ripple-color="dark">Masuk</button>

                  <div class="d-flex justify-content-end">
                      
                    <div>
                        <!-- Forgot password -->
                        <a href="../ManageLogin/sendOTPView.php">Lupa katalaluan?</a>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center">
                      
                    <div>
                        <p>atau</p>
                    </div>
                    
                  </div>

                </form>
                <!-- Default form login -->

                <!-- Sign in button -->
                <button class="btn btn-info btn-block bg-white text-dark mb-4" onclick="location.href='../ManageRegistration/applicantRegisterView.php'" data-mdb-ripple-color="dark">Daftar</button>
   
            </div>
    
        </section>

        <!-- Footer -->
        <?php
          include_once('../Common/footer.html');
        ?>

    </div>


    <!--Controller-->
    <script src="../../Controller/js/valiation.js"></script>
     
    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>

    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>