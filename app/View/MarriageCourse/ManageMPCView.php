<?php

// Start up your PHP Session
session_start();

//Decluration
$encodedData;
$decodedAdminData;

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

    //Get the data
    $listOfMPC = $_SESSION['listOfMPC'];

    $bilNum = 0;
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
    <link rel="stylesheet" href="../css/viewApplicantListView.css">
    <!-- <link rel="stylesheet" href="../css/ManageMPCView.css"> -->

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
                    <h2 id="contentTitle">Kursus Perkahwinan</h2>
                    <div id="inMainContentOutline" class="table-responsive p-4">
                        <div class="container">
                            <!-- Your can code here -->

                            <div>
                                <h5>Daftar Kursus Pra-Perkahwinan</h5>
                                <form action="../../../public/index.php?action=insertMPCView" method="post">
                                    <label for="organize">PAID : </label><input type="text" name="organize"><br>
                                    <label for="DateStart">Tarikh Mula : </label><input type="date" name="DateStart">
                                    <label for="DateFinish">Tarikh Tamat : </label><input type="date" name="DateFinish"><br>
                                    <label for="Venue">Tempat : </label><input type="text" name="Venue"><br>
                                    <label for="address">Alamat : </label><input type="text" name="address"><br>
                                    <label for="TimeStart">Masa Bermula : </label><input type="time" name="TimeStart">
                                    <label for="TimeFinish">Masa Tamat : </label><input type="time" name="TimeFinish"><br>
                                    <label for="StaffName">Pegawai Dihubungi : </label><input type="text" name="StaffName">
                                    <label for="StaffPhoneNumber">No Telefon : </label><input type="text" name="StaffPhoneNumber"><br>
                                    <label for="Capacity">Kapasiti : </label><input type="number" name="Capacity"><br>
                                    <label for="Notes">Catatan : </label><input type="text" name="Notes">
                                    <label for="publish">Terbitkan Umum : </label><input type="text" name="publish">
                                </form>
                            </div>


                        </div>
                        <div class="container">

                            <table class="table table-bordered border-dark mb-0 align-middle">
                                <thead class="tableHeaderBg">
                                    <tr>
                                        <h6>
                                            <th>Bil</th>
                                            <th>PAID</th>
                                            <th>
                                                <div class="iCEllipsis">Tempat</div>
                                            </th>
                                            <th>Tarikh</th>
                                            <th>Kapasiti Peserta</th>
                                            <th>Operasi</th>
                                        </h6>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php


                                    foreach ($listOfMPC as $row) {
                                        
                                        $marriageCourseID = $row['Marriage_Course_Id'];
                                    ?>
                                        <tr>
                                            <td style="width: 3%;">
                                                <?php echo ++$bilNum; ?>
                                            </td>

                                            <td class="" style="width: 15%;">
                                                <div class="iCEllipsis"><?php echo $row["Organize"]; ?></div>
                                            </td>

                                            <td class="" style="width: 40%;">
                                                <?php echo $row['Venue']; ?>
                                            </td>

                                            <td style="width: 20%;">
                                                <?php echo $row['DateStart']; ?>
                                            </td>

                                            <td style="width: 10%;">
                                                <?php echo $row['Capacity'];; ?>
                                            </td>

                                            <td style="width: 12%;">
                                                <button type="button" class="btn btn-link btn-sm bg-dark text-light btn-rounded" onclick="location.href='../../../public/index.php?action=getMPCInfo&marriageCourseID=<?php echo $marriageCourseID;?>'">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>

                                    <?php
                                    } ?>


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