
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

//Validation code for super admin login form
function superAdminLoginFormValidate(){

  //Decluring variable based on id
  var ic = document.getElementById("formID").value;
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
  if(password == ""){
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
    text = "Sila masukkan Email yang sah";
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

//Validation code for register form
function userProfileUpdateValidate(){

  //Decluring variable based on id
  var name = document.getElementById("formNama").value;
  var umur = document.getElementById("formUmur").value;
  var tarikhLahir = document.getElementById("formTL").value;
  var jantina = document.getElementById("formJantina").value;
  var ic = document.getElementById("formIC").value;
  var bangsa = document.getElementById("formBangsa").value;
  var email = document.getElementById("formEmail").value;
  var alamat = document.getElementById("formAlamat").value;
  var noTel = document.getElementById("formNoTel").value;
  var noTelRum = document.getElementById("formNoTelRum").value;
  var trafPendidikan = document.getElementById("formTaraf").value;
  var jawatan = document.getElementById("formJawatan").value;
  var pendapatan = document.getElementById("formPendapatan").value;
  var alamatKerja = document.getElementById("formAlamatKerja").value;
  var noTelPenjabat = document.getElementById("formNoTelPenjabat").value;


  var text;

  //Validation Condition
  if(ic.length != 12){
    text = "Sila masukkan Kad pengenalan yang sah";
    alert(text);
    return false;
  }

  if(name == ""){
    text = "Sila masukkan nama";
    alert(text);
    return false;
  }

  if(umur == ""){
    text = "Sila masukkan umur";
    alert(text);
    return false;
  }

  if(tarikhLahir == ""){
    text = "Sila masukkan tarikh lahir";
    alert(text);
    return false;
  }

  if(jantina == ""){
    text = "Sila masukkan jantina";
    alert(text);
    return false;
  }

  if(bangsa == ""){
    text = "Sila masukkan bangsa";
    alert(text);
    return false;
  }

  if(email.indexOf("@") == -1 || email.indexOf("com") == -1  || email.length < 6){
    text = "Sila masukkan Email yang sah";
    alert(text);
    return false;
  }

  if(alamat == ""){
    text = "Sila masukkan alamat";
    alert(text);
    return false;
  }

  if(noTel == ""){
    text = "Sila masukkan no telefon";
    alert(text);
    return false;
  }

  if(noTelRum == ""){
    text = "Sila masukkan no telefon rumah";
    alert(text);
    return false;
  }

  if(trafPendidikan == ""){
    text = "Sila masukkan taraf pendidikan";
    alert(text);
    return false;
  }

  if(jawatan == ""){
    text = "Sila masukkan jawatan";
    alert(text);
    return false;
  }
  
  if(pendapatan == ""){
    text = "Sila masukkan pendapatan";
    alert(text);
    return false;
  }

  if(alamatKerja == ""){
    text = "Sila masukkan alamat kerja";
    alert(text);;
    return false;
  }

  if(noTelPenjabat == ""){
    text = "Sila masukkan no telefon penjabat";
    alert(text);
    return false;
  }

  return true;
}