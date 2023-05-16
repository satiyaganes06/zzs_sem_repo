<?php

    // Start up your PHP Session
    session_start();

    //If the user is not logged in send him/her to the login form
    if(!isset($_SESSION['currentUserIC'])) {

        ?>
            <script>
                alert("Access denied !!!")
                window.location = "../app/View/ManageLogin/adminLoginView.php";
            </script>
        <?php

    }else{

        // Retrieve staff data
        $staffInfo =  $_SESSION['viewProfileById'];
        $accountInfo = $_SESSION['viewAccountById'];
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - Staff Profile</title>

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
    <link rel="stylesheet" href="../css/adminHeader.css">

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

                <!--Sidebar-->
                <div class="sidebar bg-white shadow rounded-2">

                    <div id="mySidepanel" class="sidepanel list-tab
                            list-group
                            list-group-light h-100 " role="tablist">

                        <!--Sidebar Close Button -->
                        <a href="javascript:void(0)" class="closebtn
                                text-dark" onclick="closeNav()"><i class="fas fa-xmark"></i></a>
                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <!-- Profile Accordion -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button data-mdb-toggle="collapse" class="accordion-button rounded-5" type="button" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <strong><i class="far
                                                fa-user-circle"></i> &nbsp;
                                            PROFIL</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                    <a class="list-group-item
                                            list-group-item-action 
                                            px-3 border-0 pt-1 pb-1
                                            list-group-item-light" href="../ManageUserProfile/viewAdminProfileDetailsView.php">
                                            Lihat Profil
                                        </a>

                                        <a class="list-group-item
                                            list-group-item-action px-3
                                            border-0 mt-1 pt-1 pb-1
                                            list-group-item-light" href="../ManageUserProfile/editAdminProfileDetailsView.php">
                                            Edit Profil
                                        </a>

                                        <a class="list-group-item
                                            list-group-item-action active
                                            px-3 border-0 pt-1 pb-1
                                            list-group-item-light" href="../../../public/index.php?action=viewStaffList">
                                            Lihat Staf Profil
                                        </a>

                                        <a class="list-group-item
                                            list-group-item-action px-3 
                                            border-0 mt-1 pt-1 pb-1
                                            list-group-item-light" href="../../../public/index.php?action=viewApplicantList">
                                            Lihat Pemohon Profil
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Permohonan Kursus Pra-Perkahwinan Accordian -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed
                                        rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <strong><i class="far fa-clipboard"></i>
                                            &nbsp; PERMOHONAN
                                            KURSUS PRA-PERKAHWINAN</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <a class="list-group-item
                                            list-group-item-action 
                                            px-3 border-0 pt-1 pb-1
                                            list-group-item-light" href="../blankPage.php">
                                            Messages
                                        </a>
                                    </div>
                                </div>
                            </div>      

                            <!-- Permohonan Berkahwin Accordian -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed
                                        rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        <strong><i class="far fa-clipboard"></i>
                                            &nbsp; PERMOHONAN
                                            BERKAHWINAN</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <a class="list-group-item
                                            list-group-item-action px-3 pt-1
                                            pb-1 border-0
                                            list-group-item-light" href="../blankPage.html">Settings</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Pendaftaran Nikah Accordian -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingfour">
                                    <button class="accordion-button collapsed
                                        rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        <strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi
                                                bi-calendar-plus" viewBox="0
                                                0 16 16">
                                                <path d="M8 7a.5.5 0 0 1
                                                    .5.5V9H10a.5.5 0 0 1 0
                                                    1H8.5v1.5a.5.5 0 0 1-1
                                                    0V10H6a.5.5 0 0 1
                                                    0-1h1.5V7.5A.5.5 0 0 1 8
                                                    7z" />
                                                <path d="M3.5 0a.5.5 0 0
                                                        1 .5.5V1h8V.5a.5.5 0
                                                        0 1 1
                                                        0V1h1a2 2 0 0 1 2
                                                        2v11a2 2 0 0 1-2
                                                        2H2a2 2 0 0
                                                        1-2-2V3a2 2 0 0 1
                                                        2-2h1V.5a.5.5 0 0 1
                                                        .5-.5zM1
                                                        4v10a1 1 0 0 0 1
                                                        1h12a1 1 0 0 0
                                                        1-1V4H1z" />
                                            </svg> &nbsp;
                                            PENDAFTARAN NIKAH</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse
                                            collapse" aria-labelledby="flush-headingFour" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <a class="list-group-item
                                                    list-group-item-action
                                                    border-0 px-3 pt-1 pb-1
                                                    list-group-item-light" href="../blankPage.html">Status</a>
                                        <a class="list-group-item
                                                    list-group-item-action
                                                    border-0 mt-1 px-3 pt-1
                                                    pb-1
                                                    list-group-item-light" href="../blankPage.html">Pembayaran</a>
                                    </div>
                                </div>
                            </div>

                            <!-- ADUAN DAN KHIDMAT NASIHAT Accordian -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button
                                            collapsed rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                        <strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi
                                                    bi-telephone-inbound" viewBox="0 0 16
                                                    16">
                                                <path d="M15.854.146a.5.5
                                                        0 0 1 0
                                                        .708L11.707
                                                        5H14.5a.5.5 0 0
                                                        1 0 1h-4a.5.5 0
                                                        0
                                                        1-.5-.5v-4a.5.5
                                                        0 0 1 1
                                                        0v2.793L15.146.146a.5.5
                                                        0 0 1 .708
                                                        0zm-12.2
                                                        1.182a.678.678 0
                                                        0
                                                        0-1.015-.063L1.605
                                                        2.3c-.483.484-.661
                                                        1.169-.45
                                                        1.77a17.568
                                                        17.568 0 0 0
                                                        4.168 6.608
                                                        17.569
                                                        17.569 0 0 0
                                                        6.608
                                                        4.168c.601.211
                                                        1.286.033
                                                        1.77-.45l1.034-1.034a.678.678
                                                        0 0
                                                        0-.063-1.015l-2.307-1.794a.678.678
                                                        0 0
                                                        0-.58-.122l-2.19.547a1.745
                                                        1.745 0 0
                                                        1-1.657-.459L5.482
                                                        8.062a1.745
                                                        1.745 0 0
                                                        1-.46-1.657l.548-2.19a.678.678
                                                        0 0
                                                        0-.122-.58L3.654
                                                        1.328zM1.884.511a1.745
                                                        1.745 0
                                                        0 1
                                                        2.612.163L6.29
                                                        2.98c.329.423.445.974.315
                                                        1.494l-.547
                                                        2.19a.678.678 0
                                                        0 0
                                                        .178.643l2.457
                                                        2.457a.678.678 0
                                                        0 0
                                                        .644.178l2.189-.547a1.745
                                                        1.745 0 0 1
                                                        1.494.315l2.306
                                                        1.794c.829.645.905
                                                        1.87.163
                                                        2.611l-1.034
                                                        1.034c-.74.74-1.846
                                                        1.065-2.877.702a18.634
                                                        18.634 0 0
                                                        1-7.01-4.42
                                                        18.634 18.634 0
                                                        0
                                                        1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                            </svg> &nbsp; ADUAN
                                            DAN KHIDMAT NASIHAT</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse
                                            collapse" aria-labelledby="flush-headingFive" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <a class="list-group-item list-group-item-action border-0 px-3 pt-1 pb-1
                                                    list-group-item-light" href="../blankPage.html">Borang
                                            Aduan
                                        </a>

                                        <a class="list-group-item list-group-item-action border-0 mt-1 px-3 pt-1 pb-1
                                                    list-group-item-light" href="../blankPage.html">Khidmat
                                            Nasihat
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Insentif Khas Accordian -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingSix">
                                    <button class="accordion-button
                                                collapsed rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                        <strong>&nbsp;
                                            INSENTIF KHAS
                                        </strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse
                                                        collapse" aria-labelledby="flush-headingSix" data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <a class="list-group-item list-group-item-action border-0 px-3 pt-1 pb-1 list-group-item-light" href="../blankPage.html">Settings</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

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
                        <h2 id="contentTitle">Profil Staf</h2>


                        <div id="inMainContentOutline" class="table-responsive p-4">
                            <table class="table table-borderless table-sm">
                        
                                <tbody>
                                  <tr>
                                    <th scope="row">ID Kakitangan :</th>
                                    <td><?php echo $staffInfo['Staff_Id']; ?></td>

                                    <th scope="row">Jenis Pengguna :</th>
                                    <td><?php echo $accountInfo['UserType']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Name :</th>
                                    <td><?php echo $staffInfo['StaffName']; ?></td>

                                    <th scope="row">Jenis Kakitangan :</th>
                                    <td><?php echo $staffInfo['StaffType']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">No. Kad Pengenalan :</th>
                                    <td><?php echo $accountInfo['User_IC']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">Email :</th>
                                    <td><?php echo $staffInfo['StaffEmail']; ?></td>

                                  </tr>

                                  <tr>
                                    <th scope="row">Alamat :</th>
                                    <td><?php echo $staffInfo['StaffAddress']; ?></td>
                                  </tr>

                                  <tr>
                                    <th scope="row">No. Telefon(Bimbit) :</th>
                                    <td><?php echo $staffInfo['StaffNumberPhone']; ?></td>
                                  </tr>

                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section>


        <!-- Footer -->
        <section class="mt-5">

        </section>

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