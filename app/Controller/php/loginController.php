<?php
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
class LoginController {
  private $accountModel;

  //Login controller's constructor
  public function __construct($accountModel) {
    $this->accountModel = $accountModel;
  }

  //User(Staff and Applicant) login account function
  public function userLoginAccountFunction($ic, $pwd, $userType){

    //Send the input to account model to verify the user 
    if($this->accountModel->loginAccount($ic, $pwd, $userType)){

        //Check the user type 
        if($userType == 'Pemohon'){

          // Display success message using JavaScript
          $_SESSION['alert-success'] = "Berjaya log masuk.";

          // Redirect the page using JavaScript
          echo '<script>window.location.href = "index.php?action=viewlistOfMPC&organize=all&from=MPCView";</script>';
            
         
        }elseif($userType == 'Kakitangan'){

            // Display success message using JavaScript
            $_SESSION['alert-success'] = "Berjaya log masuk.";

            // Redirect the page using JavaScript
            echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';
        }

        
    }else{

        //If the user not exists, it will show error message 
        session_start();
        $_SESSION['alert-fail'] = "Incorrect IC atau Kata laluan or User Type !!!";

        // Redirect the page using JavaScript
        echo '<script>window.location.href = "../app/View/ManageLogin/userLoginView.php";</script>';
        

    }

    
  }

  //User login account function
  public function adminLoginAccountFunction($id, $pwd){

    //Send the input to account model to verify the user 
    if($this->accountModel->adminLoginAccount($id, $pwd)){

        // Display success message using JavaScript
        $_SESSION['alert-success'] = "Berjaya log masuk.";

        // Redirect the page using JavaScript
        echo '<script>window.location.href = "index.php?action=viewProfile&from=view";</script>';
        
    }else{

        //If the user not exists, it will show error message 
        session_start();
        $_SESSION['alert-fail'] = "Incorrect IC or Password !!!";

        // Redirect the page using JavaScript
        echo '<script>window.location.href = "../app/View/ManageLogin/adminLoginView.php";</script>';

    }

    
  }
}

?>
