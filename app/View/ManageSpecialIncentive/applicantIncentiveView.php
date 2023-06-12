<?php

// Start up your PHP Session
session_start();


//If the user is not logged in send him/her to the login form
if (!isset($_SESSION['currentUserIC'])) {

?>
  <script>
    alert("Access denied !!!")
    window.location = "../ManageLogin/userLoginView.php";
  </script>
<?php

} else {

  // Sidebar Active path
  $_SESSION['route'] = 'appIncentiveView';

  // Retrieve the serialized and URL-encoded data from the URL parameter
  $encodedData = $_GET['returnInfo'];

  // Decode the URL-encoded data and unserialize it
  $decodedApplicantData = unserialize(urldecode($encodedData));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZZS - Special Incentive Application</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!--Bootstrap Script-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- MDB -->
  <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

  <!--CSS-->
  <link rel="stylesheet" href="../css/viewApplicantProfileDetailsView.css">
  <link rel="stylesheet" href="../css/tab.css">

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
          <!-- href="../../Config/logout.php" -->
          <div class="mainContentBg text-center p-3">

            <!-- Tabs navs -->
            <ul class="nav nav-tabs mb-3 flex-nowrap " id="ex-with-icons" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active p-2" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#ex-with-icons-tabs-1" role="tab" aria-controls="ex-with-icons-tabs-1" aria-selected="true">Maklumat Pemohon</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link p-2" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2" role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="false">Maklumat Pasangan</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link p-2" id="ex-with-icons-tab-3" data-mdb-toggle="tab" href="#ex-with-icons-tabs-3" role="tab" aria-controls="ex-with-icons-tabs-3" aria-selected="false">Maklumat Perkahwinan</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link p-2" id="ex-with-icons-tab-4" data-mdb-toggle="tab" href="#ex-with-icons-tabs-4" role="tab" aria-controls="ex-with-icons-tabs-4" aria-selected="false">Maklumat Pekerjaan</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link p-2" id="ex-with-icons-tab-5" data-mdb-toggle="tab" href="#ex-with-icons-tabs-5" role="tab" aria-controls="ex-with-icons-tabs-5" aria-selected="false">Maklumat Waris</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link p-2" id="ex-with-icons-tab-6" data-mdb-toggle="tab" href="#ex-with-icons-tabs-6" role="tab" aria-controls="ex-with-icons-tabs-6" aria-selected="false">Dokumen Sokongan</a>
              </li>
            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex-with-icons-content">
              <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">

                <!-- Content 1-->
                <div id="inMainContentOutline" class="table-responsive p-4">
                  <table class="table table-borderless table-sm">

                    <tbody>
                      <tr>
                        <th scope="row">Nama :</th>
                        <td><?php echo $decodedApplicantData['ApplicantName']; 
                            ?></td>

                        <th scope="row">Umur :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAge']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Tarikh Lahir :</th>
                        <td><?php echo $decodedApplicantData['ApplicantBirthDate']; 
                            ?></td>

                        <th scope="row">Jantina :</th>
                        <td><?php echo $decodedApplicantData['ApplicantGender']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php echo $decodedApplicantData['Applicant_Ic']; 
                            ?></td>

                        <th scope="row">Bangsa :</th>
                        <td><?php echo $decodedApplicantData['ApplicantRace']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Email :</th>
                        <td><?php echo $decodedApplicantData['ApplicantEmail']; 
                            ?></td>

                      </tr>

                      <tr>
                        <th scope="row">Alamat :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon(Bimbit) :</th>
                        <td><?php echo $decodedApplicantData['ApplicantPhoneNo']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon(Rumah) :</th>
                        <td><?php echo $decodedApplicantData['ApplicantHomePhoneNo']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Taraf Pendidikan :</th>
                        <td><?php echo $decodedApplicantData['ApplicantEduLevel']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Jawatan / Pekerjaan :</th>
                        <td><?php echo $decodedApplicantData['ApplicantPosition']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="col-2">Pendapatan :</th>
                        <td>RM <?php echo $decodedApplicantData['ApplicantSalary']; 
                                ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat Tempat Kerja :</th>
                        <td><?php echo $decodedApplicantData['ApplicantWorkAddress']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon(Pejabat) :</th>
                        <td><?php echo $decodedApplicantData['ApplicantWorkPhoneNo']; 
                            ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">

                <!-- Content 2-->
                <div id="inMainContentOutline" class="table-responsive p-4">
                  <table class="table table-borderless table-sm">

                    <tbody>
                      <tr>
                        <th scope="row">Nama :</th>
                        <td><?php echo $decodedApplicantData['ApplicantName']; 
                            ?></td>

                        <th scope="row">Umur :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAge']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Tarikh Lahir :</th>
                        <td><?php echo $decodedApplicantData['ApplicantBirthDate']; 
                            ?></td>

                        <th scope="row">Jantina :</th>
                        <td><?php echo $decodedApplicantData['ApplicantGender']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php echo $decodedApplicantData['Applicant_Ic']; 
                            ?></td>

                        <th scope="row">Bangsa :</th>
                        <td><?php echo $decodedApplicantData['ApplicantRace']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Email :</th>
                        <td><?php echo $decodedApplicantData['ApplicantEmail']; 
                            ?></td>

                      </tr>

                      <tr>
                        <th scope="row">Alamat :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon(Bimbit) :</th>
                        <td><?php echo $decodedApplicantData['ApplicantPhoneNo']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon(Rumah) :</th>
                        <td><?php echo $decodedApplicantData['ApplicantHomePhoneNo']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Taraf Pendidikan :</th>
                        <td><?php echo $decodedApplicantData['ApplicantEduLevel']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Jawatan / Pekerjaan :</th>
                        <td><?php echo $decodedApplicantData['ApplicantPosition']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="col-2">Pendapatan :</th>
                        <td>RM <?php echo $decodedApplicantData['ApplicantSalary']; 
                                ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat Tempat Kerja :</th>
                        <td><?php echo $decodedApplicantData['ApplicantWorkAddress']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon(Pejabat) :</th>
                        <td><?php echo $decodedApplicantData['ApplicantWorkPhoneNo']; 
                            ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                
                <!-- Content 3-->
                <div id="inMainContentOutline" class="table-responsive p-4">
                  <table class="table table-borderless table-sm">

                    <tbody>
                      <tr>
                        <th scope="row">Nama Pemohon :</th>
                        <td><?php echo $decodedApplicantData['ApplicantName']; 
                            ?></td>

                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAge']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Nama Pasangan :</th>
                        <td><?php //echo $decodedApplicantData['ApplicantBirthDate']; 
                            ?></td>

                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php //echo $decodedApplicantData['ApplicantGender']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Tarikh Nikah :</th>
                        <td><?php //echo $decodedMarriageData['MarriageDate'];
                            ?></td>

                        <th scope="row">Tempat Nikah :</th>
                        <td><?php //echo $decodedMarriageData['MarriageAddress']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Sijil Nikah :</th>
                        <td><?php //echo $decodedMarriageData['MarriageCertificateNo']; 
                            ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
                
              <!-- Content 4-->
                <div id="inMainContentOutline" class="table-responsive p-4">
                  <table class="table table-borderless table-sm">

                    <tbody>
                      <tr>
                        <th scope="row">Nama Pemohon :</th>
                        <td><?php echo $decodedApplicantData['ApplicantName']; 
                            ?></td>

                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAge']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Nama Pasangan :</th>
                        <td><?php //echo $decodedApplicantData['ApplicantBirthDate']; 
                            ?></td>

                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php //echo $decodedApplicantData['ApplicantGender']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Tarikh Nikah :</th>
                        <td><?php //echo $decodedMarriageData['MarriageDate'];
                            ?></td>

                        <th scope="row">Tempat Nikah :</th>
                        <td><?php //echo $decodedMarriageData['MarriageAddress']; 
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Sijil Nikah :</th>
                        <td><?php //echo $decodedMarriageData['MarriageCertificateNo']; 
                            ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
                MAKLUMAT WARIS
              </div>
              <div class="tab-pane fade" id="ex-with-icons-tabs-6" role="tabpanel" aria-labelledby="ex-with-icons-tab-6">
                DOKUMEN SOKONGAN
              </div>
            </div>
            <!-- Tabs content  -->
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