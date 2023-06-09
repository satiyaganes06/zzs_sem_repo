<!-- Success Toast -->
<?php if(isset($_SESSION['alert-success'])){
    ?>
        <!-- When the user login, this message will pop up -->
        <div id="success-toast" class="toast position-fixed fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 11; position: fixed; top: 20px; left: 50%; transform: translateX(-50%);">
        <div class="d-flex">
            <div class="toast-body">
            <strong class="text-white"><?php echo $_SESSION['alert-success'] ?></strong>
            </div>
            <button type="button" class="btn-close me-2 m-auto bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        </div>
    

    <script>
    // Timer to hide the success toast after 4 seconds
    setTimeout(function() {
        $('#success-toast').toast('hide');
    }, 3000);
    </script>

    <?php 
        unset($_SESSION['alert-success']);
    }?>

<!-- Failure Toast -->
<?php if(isset($_SESSION['alert-fail'])){
    ?>
        <!-- When the user login, this message will pop up -->
        <div id="fail-toast" class="toast position-fixed fade show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 11; position: fixed; top: 20px; left: 50%; transform: translateX(-50%);">
        <div class="d-flex">
            <div class="toast-body">
            <strong class="text-white"><?php echo $_SESSION['alert-fail'] ?></strong>
            </div>
            <button type="button" class="btn-close me-2 m-auto bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        </div>
    
    <script>
    // Timer to hide the success toast after 4 seconds
    setTimeout(function() {
        $('#fail-toast').toast('hide');
    }, 3000);
    </script>

    <?php 
        unset($_SESSION['alert-fail']);
    }?>