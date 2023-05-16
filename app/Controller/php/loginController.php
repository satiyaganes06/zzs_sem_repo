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
    if($this->accountModel->loginAccount($ic, $pwd)){

        //Check the user type 
        if($userType == 'Pemohon'){
            ?>
                <script>
                    alert("Berjaya log masuk.");
                    
                </script>
            <?php
            header("Location: index.php?action=viewProfile&from=view");
            
        }elseif($userType == 'Kakitangan'){
            ?>
                <script>
                    alert("Berjaya log masuk.");
                   
                </script>
            <?php

            header("Location: index.php?action=viewProfile&from=view");
        }

        
    }else{

        //If the user not exists, it will show error message 
        ?>
            <script>
                alert("Incorrect IC or Password");
                window.location = "../app/View/ManageLogin/userLoginView.php";
            </script>
        <?php

        return 0;
    }

    
  }

  //User login account function
  public function adminLoginAccountFunction($id, $pwd){

    //Send the input to account model to verify the user 
    if($this->accountModel->adminLoginAccount($id, $pwd)){
       
        header("Location: index.php?action=viewProfile&from=view");
        
    }else{

        //If the user not exists, it will show error message 
        ?>
            <script>
                alert("Incorrect IC or Password");
                window.location = "../app/View/ManageLogin/adminLoginView.php";
            </script>
        <?php

    }

    
  }
}

?>
