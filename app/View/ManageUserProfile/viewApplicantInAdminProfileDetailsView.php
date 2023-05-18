<?php

    // Start up your PHP Session
    session_start();

    //If the user is not logged in send him/her to the login form
    if(!isset($_SESSION['currentUserIC'])) {

        ?>
            <script>
                alert("Access denied !!!")
                window.location = "../ManageLogin/adminLoginView.php";
            </script>
        <?php

    }else{

        // Retrieve applicant data
        $info =  $_SESSION['viewProfileById'];
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - Applicant Profile</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/viewApplicantInAdminProfileDetailsView.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Assert/web_logo.png" />
</head>

<body>

    <div class="container-md-8 container-sm-12 row d-flex
            justify-content-center">

        <!-- Header Section -->
        <?php
          include_once('../Common/adminHeader.html');
        ?>

        <!-- Main Content -->
        <section class="mainPart container-fluid mt-3">

            <div class="d-flex justify-content-between h-100">

                <!-- Sidebar -->
                <?php
                    include('../Common/sidebarAdmin.php');
                ?>

                <div class="mainContent bg-white shadow rounded-2">

                    <div class="d-flex justify-content-between">
                        <button class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></button>
                        <div class="w-100"></div>
                        
                        <div class="d-flex justify-content-end">
                            <a class="commonButton" onclick=""><i class="fas fa-gear" style="color: black;"></i></a>
                            <a class="commonButton" href="../../Config/logout.php"><i class="fas fa-arrow-right-to-bracket" style="color: black;"></i></a>
                        </div>
                    </div>
                    
                    <div class="mainContentBg text-center p-3">
                        <h2 id="contentTitle">Profil Pemohon</h2>


                        <div id="inMainContentOutline" class="table-responsive p-4">
                            <table class="table table-borderless table-sm">
                        
                                <tbody>
                                  <tr>
                                    <th scope="row">Nama :</th>
                                    <td><?php echo $info['ApplicantName']; ?></td>

                                    <th scope="row">Umur :</th>
                                    <td><?php echo $info['ApplicantAge']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Tarikh Lahir :</th>
                                    <td><?php echo $info['ApplicantBirthDate']; ?></td>

                                    <th scope="row">Jantina :</th>
                                    <td><?php echo $info['ApplicantGender']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">No. Kad Pengenalan :</th>
                                    <td><?php echo $info['Applicant_Ic']; ?></td>

                                    <th scope="row">Bangsa :</th>
                                    <td><?php echo $info['ApplicantRace']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Email :</th>
                                    <td><?php echo $info['ApplicantEmail']; ?></td>

                                  </tr>

                                  <tr>
                                    <th scope="row">Alamat :</th>
                                    <td><?php echo $info['ApplicantAddress']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">No. Telefon(Bimbit) :</th>
                                    <td><?php echo $info['ApplicantPhoneNo']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">No. Telefon(Rumah) :</th>
                                    <td><?php echo $info['ApplicantHomePhoneNo']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Taraf Pendidikan :</th>
                                    <td><?php echo $info['ApplicantEduLevel']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Jawatan / Pekerjaan :</th>
                                    <td><?php echo $info['ApplicantPosition']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="col-2">Pendapatan :</th>
                                    <td>RM <?php echo $info['ApplicantSalary']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Alamat Tempat Kerja :</th>
                                    <td><?php echo $info['ApplicantWorkAddress']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">No. Telefon(Pejabat) :</th>
                                    <td><?php echo $info['ApplicantWorkPhoneNo']; ?></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section>


        <!-- Footer -->
        <?php
          include_once('../Common/footer.html');
        ?>

    </div>


    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
    </script>

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