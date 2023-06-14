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
  $_SESSION['route'] = 'MPCView';

  $result = $_SESSION['listOfMPC'];
  $bilNum = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZZS - Applicant Template Kholid Pemalas nak BUAT</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!--Bootstrap Script-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- MDB -->
  <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

  <!--CSS-->
  <link rel="stylesheet" href="../css/viewListApplicantInterface.css">
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

          <h2 id="contentTitle">Marriage Preparation Course</h2>

<!-- YOUR CONTENT HERE -->

<form action="" method="post">
    <label for="organize">Anjuran</label>
    <input type="text" name="organize">&nbsp;&nbsp;
    <input type="submit" value="Search">
</form>

<div id="inMainContentOutline" class="table-responsive p-4">

    <table class="table table-bordered border-dark mb-0 align-middle">
        <thead class="tableHeaderBg">
            <tr>
                <th>Bil</th>
                <th>Anjuran</th>
                <th>
                    <div class="iCEllipsis">Tempat</div>
                </th>
                <th>Tarikh</th>
                <th>Kapasiti Peserta</th>
                <th>Kekosongan</th>
                <th>Daftar Penyertaan</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($result as $row) {
                $organize = $row["Organize"];
                $venue = $row['Venue'];
                $dateStart = $row['DateStart'];
                $dateFinish = $row['DateFinish'];
                $capacity = $row['Capacity'];
                $vacancy = $row['Vacancy'];
                $marriageCourseID = $row['Marriage_Course_Id'];
            ?>
                <tr>
                    <td style="width: 3%;">
                        <?php echo ++$bilNum; ?>
                    </td>

                    <td class="" style="width: 15%;">
                        <?php echo $organize; ?>
                    </td>

                    <td class="" style="width: 30%;">
                        <?php echo $venue; ?>
                    </td>

                    <td style="width: 20%;">
                        <span><?php echo $dateStart; ?></span>
                    </td>

                    <td style="width: 10%;"><?php echo $capacity; ?></td>

                    <td style="width: 10%;"><?php echo $vacancy; ?></td>

                    <td style="width: 12%;">
                        <a href="../../../public/index.php?action=getMPCApplicantInfo&from=MPCView&organize=<?php echo $organize;?>&venue=<?php echo $venue;?>&dateStart=<?php echo $dateStart;?>&dateFinish=<?php echo $dateFinish;?>">DAFTAR SEKARANG</a>
                    </td>
                </tr>

            <?php
            } ?>


        </tbody>
    </table>

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