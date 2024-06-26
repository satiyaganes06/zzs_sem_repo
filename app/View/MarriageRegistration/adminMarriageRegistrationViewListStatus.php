+<?php

    // Start up your PHP Session
    session_start();

    //Decluration
    $encodedData;
    $decodedAdminData;

    //If the user is not logged in send him/her to the login form
    if(!isset($_SESSION['currentUserIC'])) {

        ?>
            <script>
                alert("Access denied !!!")
                window.location = "../ManageLogin/adminLoginView.php";
            </script>
        <?php

    }else{

        // Retrieve the serialized and URL-encoded data from the URL parameter
        $encodedData = $_GET['returnInfo'];
        
        // Decode the URL-encoded data and unserialize it
        $decodedAdminData = unserialize(urldecode($encodedData));

        //Sidebar Active path
        $_SESSION['route'] = 'viewProfile';
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - View Marriage Registration List</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/viewAdminProfileDetailsView.css">

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
                        


                        <div id="inMainContentOutline" class="table-responsive p-4">
                        <form method="POST" action="../../../public/index.php?action=uploadFile2">
                        <label id="kpSpousein">Masukkan nombor kad pengenalan pemohon</label>
                        <br>
                        <Input type="text" id="kpSpouse" name="kpSpouse" value="">
                            <button type="button" name="return" id="buttonS" >Cari</button></label><select name ="Acategory" id="marriageCaategory">
                                                                                                      <option value="main" >Status</option>
                                                                                                      <option value="newest" >Baru</option>
                                                                                                      <option value="processing" >Sedang Diproses</option>
                                                                                                      <option value="waitingApproval" >Untuk Diluluskan</option>
                                                                                                      <option value="Approved" >Lulus</option>
                                                                                                   </select>  
                            <br><br>
                            <table class="table table-borderless">
            <tr>
                <th>Bil</th>
                <th>Tarikh Mohon</th>
                <th>Nama Pemohon</th>
                <th>No Kad Pengenalan</th>
                <th>Status</th>
                <th>Operasi</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td>asdfghjkl;</td>
                <td>asdfghjkl;</td>
                <td>sdfghjkl;</td>
                <td>xcfghjkl;</td>
                <td>sdfghjkl;'</td>
                <td>asdfghjkl;'</td>
            </tr>
            <?php
                
            ?>
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