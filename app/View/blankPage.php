<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ic = $_POST['formIC'];
    $email = $_POST['formEmail'];

    // Do something with the data
    // For example, you might insert it into a database here

    // Then return a message
    echo "Thank you, " . $ic . ". Your email is " . $email . ".";
}
?>

