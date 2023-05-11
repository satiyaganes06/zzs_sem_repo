<?php
    session_start();
    if(session_destroy()){ // Destroying All Sessions {
        header("Location: ../View/ManageLogin/userLoginView.html"); // Redirecting To Home Page
    }
?>