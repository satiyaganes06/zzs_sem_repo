<?php

// Start up your PHP Session
session_start();

//If the user is not logged in send him/her to the login form
if (!isset($_SESSION['currentUserIC'])) {

?>
    <script>
        alert("Access denied !!!")
        window.location = "../ManageLogin/adminLoginView.php";
    </script>
<?php

} else {


    //Sidebar Active path
    $_SESSION['route'] = 'manageMPC';

    // Retrieve the serialized and URL-encoded data from the URL parameter
    $MPCEncodedData = $_GET['MPCInfo'];

    // Decode the URL-encoded data and unserialize it
    $decodedMPCData = unserialize(urldecode($MPCEncodedData));
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - View Profile</title>

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
                        <h2 id="contentTitle">Edit Kursus Pra Perkahwinan</h2>
                        <!-- Your can code here -->

                        <div id="inMainContentOutline" class="table-responsive p-4">
                            <table class="table table-borderless table-sm">
                                <form action="../../../public/index.php" method='post'>
                                    <tbody>
                                        <tr>
                                            <th scope="row">PAID :</th>
                                            <td colspan="3">
                                                <input type="text" placeholder="<?php echo $decodedMPCData['Organize']; ?>" style="width: 510px;" name="organize">
                                            </td>

                                        </tr>

                                        <tr>
                                            <th scope="row">Tarikh Mula :</th>
                                            <td>
                                                <input type="date" placeholder="<?php echo $decodedMPCData['DateStart']; ?>" name="dateStart">
                                            </td>

                                            <th scope="row">Tarikh Akhir :</th>
                                            <td>
                                                <input type="date" placeholder="<?php echo $decodedMPCData['DateFinish']; ?>" name="dateFinish">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Masa Dari :</th>
                                            <td>
                                                <input type="time" placeholder="<?php echo $decodedMPCData['TimeStart']; ?>" name="timeStart">
                                            </td>

                                            <th scope="row">Masa Hingga :</th>
                                            <td>
                                                <input type="time" placeholder="<?php echo $decodedMPCData['TimeFinish']; ?>" name="timeFinish">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Tempat :</th>
                                            <td colspan="3">
                                                <input type="text" placeholder="<?php echo $decodedMPCData['Venue']; ?>" style="width: 510px;" name="venue">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Pegawai Dihubungi :</th>
                                            <td colspan="3">
                                                <input type="text" placeholder="<?php echo $decodedMPCData['StaffName']; ?>" style="width: 510px;" name="staffName">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">No. Telefon :</th>
                                            <td>
                                                <input type="text" placeholder="<?php echo $decodedMPCData['StaffPhoneNumber']; ?>" name="staffPhoneNum">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Catatan :</th>
                                            <td colspan="3">
                                                <input type="text" placeholder="<?php echo $decodedMPCData['Notes']; ?>"style="width: 510px;height: 100px" name="notes">
                                            </td>
                                        </tr>
                                        <td>
                                            <input type="submit" value="submit" class="btn btn-dark">
                                        </td>
                                    </tbody>
                                    <input type="text">
                                </form>

                            </table>

                        </div>


                    </div>
                </div>

            </div>



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