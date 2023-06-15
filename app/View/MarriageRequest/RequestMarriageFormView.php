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
    $_SESSION['route'] = 'reqMarriageView';

    //Get the Data From Previous page
    $partnerIc = $_GET['partnerIc'];
    $partnerName = $_GET['partnerName'];
    $applicantIC = $_SESSION['currentUserIC'];
    $applicantName = $_GET['applicantName'];
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
        include_once('../Common/adminHeader.html');
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
                            <a class="commonButton" onclick=""><i class="fas fa-gear" style="color: black;"></i></a>
                            <a class="commonButton" href="../../Config/logout.php"><i class="fas fa-arrow-right-to-bracket" style="color: black;"></i></a>
                        </div>
                    </div>

                    <div class="mainContentBg text-center p-3">

                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs mb-3 flex-nowrap " id="ex-with-icons" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#ex-with-icons-tabs-1" role="tab" aria-controls="ex-with-icons-tabs-1" aria-selected="true">Maklumat Perkahwinan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link p-2" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2" role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="false">Maklumat Wali</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link p-2" id="ex-with-icons-tab-3" data-mdb-toggle="tab" href="#ex-with-icons-tabs-3" role="tab" aria-controls="ex-with-icons-tabs-3" aria-selected="false">Maklumat Witness Pertama</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link p-2" id="ex-with-icons-tab-4" data-mdb-toggle="tab" href="#ex-with-icons-tabs-4" role="tab" aria-controls="ex-with-icons-tabs-4" aria-selected="false">Maklumat Witness Kedua</a>
                            </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <form action="">
                            <div class="tab-content" id="ex-with-icons-content">
                                <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">

                                    <!-- Content 1 Maklumat Perkahwinan-->
                                    <div id="inMainContentOutline" class="table-responsive p-4">
                                        <table class="table table-borderless table-sm">

                                            <tbody>
                                                <tr>
                                                    <th scope="row"><label for="applicantName">Nama Pemohon</label></th>
                                                    <td><input type="text" name="applicantName" value="<?php echo $applicantName; ?>" readonly>
                                                    </td>

                                                    <th scope="row"><label for="applicantIC">No Kad Pengenalan Pemohon</label></th>
                                                    <td><input type="text" name="applicantIC" value="<?php echo $applicantIC; ?>" readonly>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="partnerName">Nama Pasangan</label></th>
                                                    <td><input type="text" name="partnerName" value="<?php echo $partnerName; ?>" readonly>
                                                    </td>

                                                    <th scope="row"><label for="partnerIc">No Kad Pengenalan Pasangan</label></th>
                                                    <td><input type="text" name="partnerIc" value="<?php echo $partnerIc; ?>" readonly>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="marriageAddress">Alamat Perkahwinan</label></th>
                                                    <td><input type="text" name="marriageAddress">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="marriageCertificateNo">No Sijil Perkahwinan</label></th>
                                                    <td><input type="text" name="marriageCertificateNo">
                                                    </td>

                                                    <th scope="row"><label for="marriageDate">Tarikh Peracangan Perkahwinan</label></th>
                                                    <td><input type="date" name="marriageDate">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="dowryType">Jenis Mas Kahwin</label></th>
                                                    <td><input type="text" name="dowryType">
                                                    </td>

                                                    <th scope="row"><label for="dowry">Mas Kahwin</label></th>
                                                    <td><input type="text" name="dowry">
                                                    </td>

                                                    <th scope="row"><label for="gift">Hantaran</label></th>
                                                    <td><input type="text" name="gift">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">

                                    <!-- Content 2 Maklumat Wali-->
                                    <div id="inMainContentOutline" class="table-responsive p-4">
                                        <table class="table table-borderless table-sm">

                                            <tbody>
                                                <tr>
                                                    <th scope="row"><label for="waliName">Nama Wali</label></th>
                                                    <td><input type="text" name="waliName">
                                                    </td>

                                                    <th scope="row"><label for="waliIC">No Kad Pengenalan Wali</label></th>
                                                    <td><input type="text" name="waliIC">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="waliAddress">Alamat Rumah Wali</label></th>
                                                    <td><input type="text" name="waliAddress">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="waliBirthDate">Tarikh Lahir Wali</label></th>
                                                    <td><input type="date" name="waliBirthDate">
                                                    </td>

                                                    <th scope="row"><label for="waliAge">Umur Wali</label></th>
                                                    <td><input type="number" name="waliAge">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="waliRelationship">Hubungan Wali</label></th>
                                                    <td><input type="date" name="waliRelationship">
                                                    </td>

                                                    <th scope="row"><label for="waliNumberPhone">Nombor Telefon Wali</label></th>
                                                    <td><input type="text" name="waliNumberPhone">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">

                                    <!-- Content 3 Maklumat Saksi Pertama-->
                                    <div id="inMainContentOutline" class="table-responsive p-4">
                                        <table class="table table-borderless table-sm">

                                            <tbody>
                                                <tr>
                                                    <th scope="row"><label for="witnessName1">Nama Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessName1">
                                                    </td>

                                                    <th scope="row"><label for="witnessIC1">No Kad Pengenalan Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessIC1">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="witnessAddress1">Alamat Rumah Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessAddress1">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="witnessBirthDate1">Tarikh Lahir Saksi Pertama</label></th>
                                                    <td><input type="date" name="witnessBirthDate1">
                                                    </td>

                                                    <th scope="row"><label for="witnessAge1">Umur Saksi Pertama</label></th>
                                                    <td><input type="number" name="witnessAge1">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="witnessNumberPhone1">Nombor Telefon Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessNumberPhone1">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">

                                    <!-- Content 4 Maklumat Saksi Kedua-->
                                    <div id="inMainContentOutline" class="table-responsive p-4">
                                        <table class="table table-borderless table-sm">

                                            <tbody>
                                                <tr>
                                                    <th scope="row"><label for="witnessName2">Nama Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessName2">
                                                    </td>

                                                    <th scope="row"><label for="witnessIC2">No Kad Pengenalan Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessIC2">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="witnessAddress2">Alamat Rumah Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessAddress2">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="witnessBirthDate2">Tarikh Lahir Saksi Pertama</label></th>
                                                    <td><input type="date" name="witnessBirthDate2">
                                                    </td>

                                                    <th scope="row"><label for="witnessAge2">Umur Saksi Pertama</label></th>
                                                    <td><input type="number" name="witnessAge2">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row"><label for="witnessNumberPhone2">Nombor Telefon Saksi Pertama</label></th>
                                                    <td><input type="text" name="witnessNumberPhone2">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input type="submit" value="submit">
                            </div>
                        </form>

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