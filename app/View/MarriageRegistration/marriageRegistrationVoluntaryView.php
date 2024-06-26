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


        //Sidebar Active path
        $_SESSION['route'] = 'marriageRegistrationStatus';
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
    <title>Marriage Registration</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/marriageRegistrationView.css">
    <link rel="stylesheet" href="../css/header.css">

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

        <!-- Main Content -->
        <section class="mainPart container-fluid mt-3">

            <div class="d-flex justify-content-between h-100">

                <!-- Sidebar -->
                <?php
                    include('../Common/sidebarApplicant.php');
                ?>

                <div class="mainContent bg-white shadow rounded-2">

                    <div class="d-flex justify-content-between">
                        <button class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></button>
                        <div class="w-100"></div>
                        
                        <div class="d-flex justify-content-end">
                            <a class="commonButton" onclick=""><i class="fas fa-gear" style="color: grey;"></i></a>
                            <a class="commonButton" href="../../Config/logout.php"><i class="fas fa-arrow-right-to-bracket" style="color: grey;"></i></a>
                        </div>
                    </div>
                    
                    <div class="mainContentBg text-center p-3">
                        <h2 id="contentTitle">PERMOHONAN PENDAFTARAN PERNIKAHAN</h2>


                        <div id="inMainContentOutline" class="table-responsive p-4">
                            <form action="../../../public/index.php?action=marriageRegistrationVoluntary" id="" method="post">
                            <label id = "kpin">No K/P Pemohon :</label> <input type ="text" name="kpPemohon" id="kp" value="<?php echo $decodedApplicantData['Applicant_IC']?>"> <br>
                            <br><label id="categoryIn">Kategori Pendaftaran Nikah:</label><select name ="category" id="marriageCategory" onchange="changePage()">
                                                                 <option value="voluntary" >Pendaftaran Nikah Sukarela</option>
                                                                 <option value="withApproval" >Pendaftaran Nikah dengan Kebenaran</option>
                                                                 </select>
                            <br>
                            <label class="starlabel">- Dokumen yang dimuat naik perlu beserta tandatangan dan cop pihak yang terlibat</label>
                            <label class="custom-file-upload">
                            <input type="file" name="marriageApprovalFile"/>
                            SURAT KEBENARAN BERKAHWIN
                            </label>
                            <br>
                            <br>
                            <label id ="AkuanNum">No. Akuan Terima Kebenaran Berkahwin:</label> <input type ="text" name="noAkuan" id="akuanIn"><br>
                            <br>
                            <br>

                        <button type="button" name="return" id="buttonR" >Kembali</button><button type="submit" name="update" id="buttonU" onclick=''>Kemaskini Maklumat</button>
                            </form>
                            <script>
    function changePage() {
      var selectElement = document.getElementById("marriageCategory");
      var selectedValue = selectElement.options[selectElement.selectedIndex].value;

      if (selectedValue === "withApproval") {
        // Redirect to another page or perform other actions
        window.location.href = "marriageRegistrationView.php";
      } else if (selectedValue === "voluntary") {
        // Redirect to another page or perform other actions
        window.location.href = "marriageRegistrationVoluntaryView.php";
      }

      return false; // Prevent the form from submitting traditionally
    }
  </script>
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