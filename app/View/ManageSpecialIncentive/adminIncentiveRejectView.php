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
    $_SESSION['route'] = 'appIncentiveView';

    // Retrieve the serialized and URL-encoded data from the URL parameter
    $encodedApplicantData = $_GET['applicantData'];
    $encodedMarriageData = $_GET['marriageData'];
    $encodedPartnerData = $_GET['partnerData'];
    $encodedMarriageInfoData = $_GET['marriageInfoData'];
    $encodedOccupationData = $_GET['occupationData'];
    $encodedIncentiveDocData = $_GET['incentiveDocData'];

    // Decode the URL-encoded data and unserialize it
    $decodedApplicantData = unserialize(urldecode($encodedApplicantData));
    $decodedMarriageData = unserialize(urldecode($encodedMarriageData));
    $decodedPartnerData = unserialize(urldecode($encodedPartnerData));
    $decodedMarriageInfoData = unserialize(urldecode($encodedMarriageInfoData));
    $decodedOccupationData = unserialize(urldecode($encodedOccupationData));
    $decodedIncentiveDocData = unserialize(urldecode($encodedIncentiveDocData));
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZS - Admin Special Incentive Rejection</title>

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
    <link rel="stylesheet" href="../css/tab.css">
    <link rel="stylesheet" href="../css/editApplicantProfileDetailsView.css">

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

        <!-- Content -->
        <section class="mainPart container-fluid mt-3">

            <div class="d-flex justify-content-between h-100">

                <!-- Sidebar -->
                <?php
                include('../Common/sidebarAdmin.php');
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


                        <form action="../../../public/index.php?action=addRejection" method="post">

                            <!-- Content 1 Maklumat Pemohon-->
                            <div id="inMainContentOutline" class="table-responsive p-4">
                                <table class="table table-borderless table-sm">

                                    <tbody>
                                        <div class="form form-width">
                                            <input type="text" id="formCompanyName" name="CompanyName" class="form-control form-control-sm" />
                                        </div>

                                    </tbody>
                                </table>
                            </div>

                        </form>
                    </div>

                    </form>
                </div>
                <div class="d-flex justify-content-left">
                    <button class="btn btn-block mt-3 text-dark" type="submit" data-mdb-ripple-color="dark">TERIMA</button>
                    <button class="btn btn-block mt-3 text-dark" type="submit" data-mdb-ripple-color="dark" href="../../../app/View/ManageSpecialIncentive/adminIncentiveRejectView.php">TOLAK</button>
                </div>

            </div>
            <!-- Tabs content  -->


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