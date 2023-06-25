<style>

</style>

<?php

$route = $_SESSION['route'];

if ($route == 'viewProfile') {
    $viewProfileRoute = 'active';
    $profileRouteSection = 'show';

    $profileRouteHeader = '';
    $MPCRouteHeader = 'collapsed';
    $reqMarriageRouteHeader = 'collapsed';
    $marriageRegistrationRouteHeader = 'collapsed';
    $appDetailsRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'editProfile') {
    $editProfileRoute = 'active';
    $profileRouteSection = 'show';

    $profileRouteHeader = '';
    $MPCRouteHeader = 'collapsed';
    $reqMarriageRouteHeader = 'collapsed';
    $marriageRegistrationRouteHeader = 'collapsed';
    $appDetailsRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'marriageRegistrationStatus') {
    $marriageRegistrationStatusRoute = 'active';
    $marriageRegistrationRouteSection = 'show';

    $marriageRegistrationRouteHeader = '';
    $profileRouteHeader = 'collapsed';
    $MPCRouteHeader = 'collapsed';
    $reqMarriageRouteHeader = 'collapsed';
    $appDetailsRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'marriageRegistrationPayment') {
    $marriageRegistrationPaymentRoute = 'active';
    $marriageRegistrationRouteSection = 'show';

    $marriageRegistrationRouteHeader = '';
    $profileRouteHeader = 'collapsed';
    $MPCRouteHeader = 'collapsed';
    $reqMarriageRouteHeader = 'collapsed';
    $appDetailsRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'MPCView') {
    $MPCViewRoute = 'active';
    $MPCRouteSection = 'show';

    $MPCRouteHeader = '';
    $profileRouteHeader = 'collapsed';
    $reqMarriageRouteHeader = 'collapsed';
    $marriageRegistrationRouteHeader = 'collapsed';
    $appDetailsRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'appDetailsView') {
    $appDetailsViewRoute = 'active';
    $appDetailsRouteSection = 'show';

    $appDetailsRouteHeader = '';
    $MPCRouteHeader = 'collapsed';
    $profileRouteHeader = 'collapsed';
    $reqMarriageRouteHeader = 'collapsed';
    $marriageRegistrationRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'consultDetailsView') {
    $consultDetailsViewRoute = 'active';
} else if ($route == 'reqMarriageView') {
    $reqMarriageViewRoute = 'active';
    $reqMarriageRouteSection = 'show';

    $reqMarriageRouteHeader = '';
    $MPCRouteHeader = 'collapsed';
    $profileRouteHeader = 'collapsed';
    $marriageRegistrationRouteHeader = 'collapsed';
    $appDetailsRouteHeader = 'collapsed';
    $appIncentiveRouteHeader = 'collapsed';
} else if ($route == 'appIncentiveView') {
    $appIncentiveViewRoute = 'active';
    $appIncentiveViewRouteSection = 'show';

        $appDetailsRouteHeader = '';
        $MPCRouteHeader = 'collapsed';
        $profileRouteHeader = 'collapsed';
        $reqMarriageRouteHeader = 'collapsed';
        $marriageRegistrationRouteHeader = 'collapsed';
        $appIncentiveRouteHeader = 'collapsed';
    } 
    
    else if($route == 'consultDetailsView'){
        $consultDetailsViewRoute = 'active' ;

    }
    else if($route == 'reqMarriageView'){
        $reqMarriageViewRoute = 'active' ;
        $reqMarriageRouteSection = 'show';

        $reqMarriageRouteHeader = '';
        $MPCRouteHeader = 'collapsed';
        $profileRouteHeader = 'collapsed';
        $marriageRegistrationRouteHeader = 'collapsed';
        $appDetailsRouteHeader = 'collapsed';
        $appIncentiveRouteHeader = 'collapsed';
    } 

    else if($route == 'appIncentiveView'){
        $appIncentiveViewRoute = 'active' ;
        $appIncentiveViewRouteSection = 'show';

        $appIncentiveRouteHeader = '';
        $reqMarriageRouteHeader = 'collapsed';
        $MPCRouteHeader = 'collapsed';
        $profileRouteHeader = 'collapsed';
        $marriageRegistrationRouteHeader = 'collapsed';
        $appDetailsRouteHeader = 'collapsed';
        
    } 
    else if($route == 'consultDetailsView'){
        $appDetails2ViewRoute = 'active' ;
        $appIncentiveViewRouteSection = 'show';

        $appIncentiveRouteHeader = '';
        $reqMarriageRouteHeader = 'collapsed';
        $MPCRouteHeader = 'collapsed';
        $profileRouteHeader = 'collapsed';
        $marriageRegistrationRouteHeader = 'collapsed';
        $appDetailsRouteHeader = 'collapsed';
        
    } 

?>

<html>
<!--Sidebar-->
<div class="sidebar bg-white shadow rounded-2">

    <div id="mySidepanel" class="sidepanel list-tab
                list-group
                list-group-light h-100 " role="tablist">

        <!--Sidebar Close Button -->
        <a href="javascript:void(0)" class="closebtn
                    text-dark" onclick="closeNav()"><i class="fas fa-xmark"></i></a>
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <!-- Profile Accordion -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button data-mdb-toggle="collapse" class="accordion-button rounded-5 <?php echo $profileRouteHeader ?>" type="button" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <strong><i class="far
                                    fa-user-circle"></i> &nbsp;
                            PROFIL</strong>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse <?php echo $profileRouteSection ?>" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <a class="list-group-item
                                list-group-item-action  <?php echo $viewProfileRoute ?>
                                px-3 border-0 pt-1 pb-1
                                list-group-item-light" href="../../../public/index.php?action=viewProfile&from=view">
                            Lihat Profil
                        </a>

                        <a class="list-group-item
                                list-group-item-action px-3 <?php echo $editProfileRoute ?>
                                border-0 mt-1 pt-1 pb-1
                                list-group-item-light" href="../../../public/index.php?action=viewProfile&from=edit">
                            Edit Profil
                        </a>

                    </div>
                </div>
            </div>

            <!-- Permohonan Kursus Pra-Perkahwinan Accordian -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button <?php echo $MPCRouteHeader ?> 
                            rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <strong><i class="far fa-clipboard"></i>
                            &nbsp; PERMOHONAN
                            KURSUS PRA-PERKAHWINAN</strong>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse <?php echo $MPCRouteSection ?>" aria-labelledby="flush-headingTwo" data-mdb-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <a class="list-group-item <?php echo $MPCViewRoute ?>
                                list-group-item-action 
                                px-3 border-0 pt-1 pb-1
                                list-group-item-light" href="../../../public/index.php?action=viewlistOfMPC&organize=all&from=MPCView">
                            Kursus Permohonan Berkahwin
                        </a>
                    </div>
                </div>
            </div>

            <!-- Permohonan Berkahwin Accordian -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button <?php echo $reqMarriageRouteHeader ?> 
                            rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <strong><i class="far fa-clipboard"></i>
                            &nbsp; PERMOHONAN
                            BERKAHWINAN</strong>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse <?php echo $reqMarriageRouteSection ?>" aria-labelledby="flush-headingThree" data-mdb-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <a class="list-group-item <?php echo $reqMarriageViewRoute ?>
                                list-group-item-action px-3 pt-1
                                pb-1 border-0
                                list-group-item-light" href="../MarriageRequest/RequestMarriageView.php?display=0">Permohonan Berkahwin</a>
                    </div>
                </div>
            </div>

            <!-- Pendaftaran Nikah Accordian -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingfour">
                    <button class="accordion-button <?php echo $marriageRegistrationRouteHeader ?> 
                            rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        <strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi
                                    bi-calendar-plus" viewBox="0
                                    0 16 16">
                                <path d="M8 7a.5.5 0 0 1
                                        .5.5V9H10a.5.5 0 0 1 0
                                        1H8.5v1.5a.5.5 0 0 1-1
                                        0V10H6a.5.5 0 0 1
                                        0-1h1.5V7.5A.5.5 0 0 1 8
                                        7z" />
                                <path d="M3.5 0a.5.5 0 0
                                            1 .5.5V1h8V.5a.5.5 0
                                            0 1 1
                                            0V1h1a2 2 0 0 1 2
                                            2v11a2 2 0 0 1-2
                                            2H2a2 2 0 0
                                            1-2-2V3a2 2 0 0 1
                                            2-2h1V.5a.5.5 0 0 1
                                            .5-.5zM1
                                            4v10a1 1 0 0 0 1
                                            1h12a1 1 0 0 0
                                            1-1V4H1z" />
                            </svg> &nbsp;
                            PENDAFTARAN NIKAH</strong>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse <?php echo $marriageRegistrationRouteSection ?>" aria-labelledby="flush-headingFour" data-mdb-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <a class="list-group-item <?php echo $marriageRegistrationStatusRoute ?>
                                        list-group-item-action 
                                        border-0 px-3 pt-1 pb-1
                                        list-group-item-light" href="../MarriageRegistration/marriageRegistrationStatusView.php">Status</a>
                        <a class="list-group-item
                                        list-group-item-action <?php echo $marriageRegistrationPaymentRoute ?>
                                        border-0 mt-1 px-3 pt-1
                                        pb-1
                                        list-group-item-light" href="../MarriageCard/marriageCardPaymentView.php">Pembayaran</a>
                    </div>
                </div>
            </div>

            <!-- ADUAN DAN KHIDMAT NASIHAT Accordian -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button rounded-5 <?php echo $appDetailsRouteHeader ?> " type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        <strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi
                                        bi-telephone-inbound" viewBox="0 0 16
                                        16">
                                <path d="M15.854.146a.5.5
                                            0 0 1 0
                                            .708L11.707
                                            5H14.5a.5.5 0 0
                                            1 0 1h-4a.5.5 0
                                            0
                                            1-.5-.5v-4a.5.5
                                            0 0 1 1
                                            0v2.793L15.146.146a.5.5
                                            0 0 1 .708
                                            0zm-12.2
                                            1.182a.678.678 0
                                            0
                                            0-1.015-.063L1.605
                                            2.3c-.483.484-.661
                                            1.169-.45
                                            1.77a17.568
                                            17.568 0 0 0
                                            4.168 6.608
                                            17.569
                                            17.569 0 0 0
                                            6.608
                                            4.168c.601.211
                                            1.286.033
                                            1.77-.45l1.034-1.034a.678.678
                                            0 0
                                            0-.063-1.015l-2.307-1.794a.678.678
                                            0 0
                                            0-.58-.122l-2.19.547a1.745
                                            1.745 0 0
                                            1-1.657-.459L5.482
                                            8.062a1.745
                                            1.745 0 0
                                            1-.46-1.657l.548-2.19a.678.678
                                            0 0
                                            0-.122-.58L3.654
                                            1.328zM1.884.511a1.745
                                            1.745 0
                                            0 1
                                            2.612.163L6.29
                                            2.98c.329.423.445.974.315
                                            1.494l-.547
                                            2.19a.678.678 0
                                            0 0
                                            .178.643l2.457
                                            2.457a.678.678 0
                                            0 0
                                            .644.178l2.189-.547a1.745
                                            1.745 0 0 1
                                            1.494.315l2.306
                                            1.794c.829.645.905
                                            1.87.163
                                            2.611l-1.034
                                            1.034c-.74.74-1.846
                                            1.065-2.877.702a18.634
                                            18.634 0 0
                                            1-7.01-4.42
                                            18.634 18.634 0
                                            0
                                            1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg> &nbsp; ADUAN
                            DAN KHIDMAT NASIHAT</strong>
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse <?php echo $appDetailsRouteSection ?> 
                                collapse" aria-labelledby="flush-headingFive" data-mdb-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a class="list-group-item <?php echo $appDetailsViewRoute ?>
                            list-group-item-action border-0 px-3 pt-1 pb-1
                            list-group-item-light" href="../../../public/index.php?action=viewProfile&from=aduanPemohon">Borang
                            Aduan
                        </a>

                            <a class="list-group-item list-group-item-action border-0 mt-1 px-3 pt-1 pb-1 <?php echo $appDetails2ViewRoute ?>
                        <a class="list-group-item list-group-item-action border-0 mt-1 px-3 pt-1 pb-1
                                        list-group-item-light" href="../../../public/index.php?action=viewProfile&from=khidmatNasihatPemohon">Khidmat
                            Nasihat
                        </a>

                    </div>
                </div>
            </div>

            <!-- Insentif Khas Accordian -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button <?php echo $appIncentiveRouteHeader ?> rounded-5" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        <strong><i class="fas fa-dollar-sign"></i>&nbsp;
                            INSENTIF KHAS
                        </strong>
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse <?php echo $appIncentiveViewRouteSection ?> " aria-labelledby="flush-headingSix" data-mdb-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <a class="list-group-item <?php echo $appIncentiveViewRoute ?>
                            list-group-item-action border-0 px-3 pt-1 pb-1 
                            list-group-item-light" href="../../../public/index.php?action=specialIncentiveApplication">
                            Permohonan
                        </a>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</html>