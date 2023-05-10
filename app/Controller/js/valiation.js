
//Validation code for login form
function loginFormValidate(){

  //Decluring variable based on id
  var ic = document.getElementById("formIC").value;
  var password = document.getElementById("formPassword").value;
  var error_message = document.getElementById("error_message");
  
  //Error Message style
  error_message.style.padding = "6px";
  
  var text;
  
  //Validation Condition
  if(ic.length != 12){
    text = "Sila masukkan Kad Pengenalan yang sah";
    error_message.innerHTML = text;
    return false;
  }
  if(password.length <= 8 || password.length >= 12){
    text = "Sila masukkan Kata Laluan yang sah";
    error_message.innerHTML = text;
    return false;
  }
  

  return true;
}

//Validation code for forgot password form
function forgotPasswordFormValidate(){

  //Decluring variable based on id
  var ic = document.getElementById("formIC").value;
  var email = document.getElementById("formEmail").value;
  var otp = document.getElementById("formOTP").value;
  var error_message = document.getElementById("error_message");
  
  //Error Message style
  error_message.style.padding = "6px";
  
  var text;
  
  //Validation Condition
  if(ic.length != 12){
    text = "Sila masukkan Kad Pengenalan yang sah";
    error_message.innerHTML = text;
    return false;
  }

  if(email.indexOf("@") == -1 || email.indexOf("com") == -1  || email.length < 6){
    text = "Please Enter valid Email";
    error_message.innerHTML = text;
    return false;
  }

  if(isNaN(otp) || otp.length != 4){
    text = "Sila masukkan OTP yang sah";
    error_message.innerHTML = text;
    return false;
  }


  return true;
}

//Validation code for reset password form
function resetPasswordFormValidate(){

  //Decluring variable based on id
  var password = document.getElementById("formPassword").value;
  var confirm_password = document.getElementById("formConfirmPass").value;
  var error_message = document.getElementById("error_message");
  
  //Error Message style
  error_message.style.padding = "6px";
  
  var text;
  
  //Validation Condition
  if(password.length <= 8 || password.length >= 12){
    text = "Sila masukkan Kata Laluan yang sah";
    error_message.innerHTML = text;
    return false;
  }

  if(password != confirm_password){
    text = "Kata laluan tidak sepadan";
    error_message.innerHTML = text;
    return false;
  }


  return true;
}

//Validation code for register form
function registerFormValidate(){

  //Decluring variable based on id
  var ic = document.getElementById("formIC").value;
  var name = document.getElementById("formName").value;
  var phone = document.getElementById("formPhoneNum").value;
  var password = document.getElementById("formPassword").value;
  var confirm_password = document.getElementById("formConfirmPass").value;
  var error_message = document.getElementById("error_message");
  
  //Error Message style
  error_message.style.padding = "6px";
  
  var text;

  //Validation Condition
  if(ic.length != 12){
    text = "Sila masukkan Kad pengenalan yang sah";
    error_message.innerHTML = text;
    return false;
  }

  if(name == ""){
    text = "Sila masukkan nama";
    error_message.innerHTML = text;
    return false;
  }

  if(isNaN(phone) || phone.length <= 8 || phone.length >= 12){
    text = "Please Enter valid Phone Number";
    error_message.innerHTML = text;
    return false;
  }
  
  if(password.length <= 8 || password.length >= 12){
    text = "Sila masukkan Kata Laluan yang sah";
    error_message.innerHTML = text;
    return false;
  }

  if(password != confirm_password){
    text = "Kata laluan tidak sepadan";
    error_message.innerHTML = text;
    return false;
  }


  return true;
}