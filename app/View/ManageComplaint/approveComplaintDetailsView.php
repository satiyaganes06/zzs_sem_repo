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
  $_SESSION['route'] = 'appDetailsView';

  // Retrieve the serialized and URL-encoded data from the URL parameter
  $encodedData = $_GET['returnuserInfo'];

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
    <title>ZZS - Complaint Approval</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/viewStaffListView.css">

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
                            <a class="commonButton" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-arrow-right-to-bracket" style="color: black;"></i></a>
                        </div>
                    </div>  
                    
                    <div class="mainContentBg text-center p-3">

                    <!-- Tabs content -->
                    <div id="inMainContentOutline" class="table-responsive p-4">
                    <h2 id="contentTitle">MAKLUMAT PEMOHON:</h2>
                    <tbody>
                      <tr>
                        <th scope="row">Nama Pengadu :</th>
                        <td><?php echo $decodedApplicantData['ApplicantName'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php echo $decodedApplicantData['Applicant_Ic'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon :</th>
                        <td><?php echo $decodedApplicantData['ApplicantPhoneNo'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress'];
                            ?></td>
                      </tr>
                      <br>
                      <tr>
                        <th scope="row">Nama Yang Di Adu :</th>
                        <td><?php echo $decodedApplicantData['ApplicantName'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Kad Pengenalan :</th>
                        <td><?php echo $decodedApplicantData['Applicant_Ic'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telefon :</th>
                        <td><?php echo $decodedApplicantData['ApplicantPhoneNo'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">ADUAN :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">CABARAN :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress'];
                            ?></td>
                      </tr>

                      <tr>
                        <th scope="row">SOLUSI :</th>
                        <td><?php echo $decodedApplicantData['ApplicantAddress'];
                            ?></td>
                      </tr>

                      <tr>
                          <td>
                            <div class="d-flex justify-content-center">
                              <button class="btn btn-block mt-3 text-dark" type="submit" data-mdb-ripple-color="dark">Terima</button>
                            </div>
                          </td>
                        </tr>
                    </tbody>
                 </div>
                 <!-- Tabs content -->
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