<?php
    //$db = isset($_GET['details']) ? $_GET['details'] : '';


    // Retrieve the serialized and URL-encoded data from the URL parameter
    $encodedData = $_GET['returnInfo'];
    
    // Decode the URL-encoded data and unserialize it
    $decodedData = unserialize(urldecode($encodedData));
    
    // Access the values in the array
    $page = $decodedData['AdminName'];
    $search = $decodedData['Admin_Id'];
    
    // Use the values as needed
    echo "Page: $page<br>";
    echo "Search: $search";
    
    

?>
