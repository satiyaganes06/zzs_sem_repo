<?php

    // Start up your PHP Session
    session_start();

    //If the user is not logged in send him/her to the login form
    if(!isset($_SESSION['currentUserIC'])) {
        ?>
        <script>
            alert("Access denied !!!")
            window.location = "../ManageLogin/userLoginView.php";
        </script>
        <?php

    }else{

        // Retrieve the serialized and URL-encoded data from the URL parameter
        $encodedData = $_GET['returnInfo'];
        
        // Decode the URL-encoded data and unserialize it
        $decodedApplicantData = unserialize(urldecode($encodedData));

        //Sidebar Active path
        $_SESSION['route'] = 'editProfile';
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - Edit Profile</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/editApplicantProfileDetailsView.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Assert/web_logo.png" />
</head>

<body>

    <div class="container-md-8 container-sm-12 row d-flex
            justify-content-center">

        <!-- Header Section -->
        <?php
          include_once('../Common/applicantHeader.html');
        ?>

        <!-- Content -->
        <section class="mainPart container-fluid mt-3">

            <div class="d-flex justify-content-between h-100">

                <!-- Sidebar -->
                <?php
                    include('../Common/sidebarApplicant.php');
                ?>

                <!-- Main Content -->
                <div class="mainContent bg-white shadow rounded-2">

                    <div class="d-flex justify-content-between">
                        <button class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></button>
                        <div class="w-100"></div>
                        
                        <div class="d-flex justify-content-end">
                            <a class="commonButton" onclick=""><i class="fas fa-gear" style="color: grey;"></i></a>
                            <a class="commonButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-arrow-right-to-bracket" style="color: grey;"></i></a>
                        </div>
                    </div>
                    
                    <div class="mainContentBg text-center p-3">
                        <h2 id="contentTitle">ZZS - Edit Profile</h2>

                        <!-- form profile info update -->
                        <form action="../../../public/index.php?action=updateProfile" method="post" onsubmit = "return userProfileUpdateValidate();">

                            <div id="inMainContentOutline" class="table-responsive p-4">

                                <table class="table table-borderless table-sm">

                                    <tbody>
                                    <tr>
                                        <th scope="row">Nama :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formNama" name="Applicant_nama" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantName']; ?>"/>
                                            </div>
                                        </td>

                                        <th scope="row">Umur :</th>
                                        <td>
                                            
                                            <div class="form form-width">
                                                <input type="text" id="formUmur" name="Applicant_umur" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantAge']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Tarikh Lahir :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formTL" name="Applicant_tarikhL" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantBirthDate']; ?>" placeholder="YYYY-MM-DD"/>
                                            </div>
                                        </td>

                                        <th scope="row">Jantina :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formJantina" name="Applicant_jantina" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantGender']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">No. Kad Pengenalan :</th>
                                        <td>
                                            <?php echo $decodedApplicantData['Applicant_Ic']; ?>
                                        </td>

                                        <th scope="row">Bangsa :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formBangsa" name="Applicant_bangsa" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantRace']; ?>"/>
                                            </div>
                                        </td>
                                        
                                    </tr>

                                    <tr>
                                        <th scope="row">Email :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formEmail" name="Applicant_email" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantEmail']; ?>"/>
                                            </div>
                                        </td>

                                    </tr>

                                    <tr>
                                        <th scope="row">Alamat :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formAlamat" name="Applicant_alamat" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantAddress']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">No. Telefon(Bimbit) :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formNoTel" name="Applicant_noTel" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantPhoneNo']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">No. Telefon(Rumah) :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formNoTelRum" name="Applicant_noTelRum" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantHomePhoneNo']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Taraf Pendidikan :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formTaraf" name="Applicant_trafPen" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantEduLevel']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Jawatan / Pekerjaan :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formJawatan" name="Applicant_jawatan" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantPosition']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="col-2">Pendapatan : (RM)</th>
                                        <td> 
                                            <div class="form form-width">
                                                <input type="text" id="formPendapatan" name="Applicant_pendapatan" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantSalary']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Alamat Tempat Kerja :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formAlamatKerja" name="Applicant_alamatKerja" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantWorkAddress']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">No. Telefon(Pejabat) :</th>
                                        <td>
                                            <div class="form form-width">
                                                <input type="text" id="formNoTelPenjabat" name="Applicant_noTelPenjabat" class="form-control form-control-sm" value="<?php echo $decodedApplicantData['ApplicantWorkPhoneNo']; ?>"/>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-block mt-3 text-dark" type="submit" data-mdb-ripple-color="dark">Mengemas kini</button>
                            </div>

                        </form>
                        

                    </div>
                    
                </div>

            </div>

        </section>


        <?php
          // Footer 
          include_once('../Common/footer.html');  

          //Logout Model
          include_once('../Common/logoutModel.html');
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