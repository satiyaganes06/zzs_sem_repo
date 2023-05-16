<?php

    // Start up your PHP Session
    session_start();

    //Decluration
    $encodedData;
    $decodedStaffData;

    //If the user is not logged in send him/her to the login form
    if(!isset($_SESSION['currentUserIC'])) {

        ?>
            <script>
                alert("Access denied !!!")
                window.location = "../app/View/ManageLogin/userLoginView.php";
            </script>
        <?php

    }else{

        // Retrieve the serialized and URL-encoded data from the URL parameter
        $encodedData = $_GET['returnInfo'];
        
        // Decode the URL-encoded data and unserialize it
        $decodedStaffData = unserialize(urldecode($encodedData));

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
    <link rel="stylesheet" href="../css/editStaffProfileDetailsView.css">

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
                    include('../Common/sidebarStaff.php');
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
                        <h2 id="contentTitle">Edit Profil</h2>

                        <!-- form profile info update -->
                        <form action="../../../public/index.php?action=updateAdminProfile" method="post" onsubmit = "return userProfileUpdateValidate();">

                            <div id="inMainContentOutline" class="table-responsive p-4">

                                <table class="table table-borderless table-sm">

                                    <tbody>
                                        <tr>
                                            <th scope="row">ID Kakitangan :</th>
                                            <td>
                                                <div class="form form-width">
                                                    <input type="text" id="formID" name="staffId" class="form-control form-control-sm" value="<?php echo $decodedStaffData['Staff_Id']; ?>"/>
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <th scope="row">Name :</th>
                                            <td>
                                                
                                                <div class="form form-width">
                                                    <input type="text" id="formNama" name="nama" class="form-control form-control-sm" value="<?php echo $decodedStaffData['StaffName']; ?>"/>
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <th scope="row">Jenis Pengguna :</th>
                                            <td>
                                                
                                                <div class="form form-width">
                                                    <input type="text" id="formUserType" name="userType" class="form-control form-control-sm" value="<?php echo $_SESSION['currentUserType']; ?>"/>
                                                </div>
                                            </td> 
                                        </tr>

                                        <tr>
                                            <th scope="row">Jenis Kakitangan :</th>
                                            <td>
                                                <div class="form form-width">
                                                    <input type="text" id="formStaffType" name="staffType" class="form-control form-control-sm" value="<?php echo $decodedStaffData['StaffType']; ?>"/>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">No. Kad Pengenalan :</th>
                                            <td>
                                                <div class="form form-width">
                                                    <input type="text" id="formIC" name="ic" class="form-control form-control-sm" value="<?php echo $_SESSION['currentUserIC']; ?>"/>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Email :</th>
                                            <td>
                                                <div class="form form-width">
                                                    <input type="text" id="formEmail" name="email" class="form-control form-control-sm" value="<?php echo $decodedStaffData['StaffEmail']; ?>"/>
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <th scope="row">Alamat :</th>
                                            <td>
                                                <div class="form form-width">
                                                    <input type="text" id="formAddress" name="address" class="form-control form-control-sm" value="<?php echo $decodedStaffData['StaffAddress']; ?>"/>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">No. Telefon(Bimbit) :</th>
                                            <td>
                                                <div class="form form-width">
                                                    <input type="text" id="formTelefon" name="telefon" class="form-control form-control-sm" value="<?php echo $decodedStaffData['StaffNumberPhone']; ?>"/>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-link btn-md bg-dark text-light btn-rounded mt-3 " type="submit" data-mdb-ripple-color="dark">Mengemas kini</button>
                            </div>

                        </form>

                        
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