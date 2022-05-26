<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MINI PROJECT </title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.png" rel="icon">
  <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">
  <link href="./assets/css/regt.css" rel = "stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body onload="firstfocus()">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="./assets/img/poultry.jpg" alt="">
        <span>Madayikkal Poultry Feeds</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="StaffRegister.html">Register</a></li>
          
          <li><a class="nav-link scrollto" href="stafflogin.html">Login</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">We offer services according to your concern</h1>
          <h2 data-aos="fade-up" data-aos-delay="400"></h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Register Here</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <div class="content">
                <header>Registration Form</header>
                <form method = "post" name = "Register" action="staffreg.php"  enctype = "multipart/form-data">
                    <script>
    
                        function firstfocus()
                            {
                                    var naame = document.Register.Name.focus();
                                    return true;
                            }
                
                            function Naame()
                            {
                                    var naame = document.forms["Register"]["Name"];
                                    var letters = /^[A-Za-z\s]+$/;
                                   
                
                                    if(naame.value == "")
                                    {
                                              ename = "Please enter your name";
                        
                                              document.getElementById("Ename").innerHTML = ename;
                                              naame.focus();
                                              return false;
                                    }

                                    else if(naame.value.trim() == "" ){
                                      
                                      document.getElementById("Ename").innerHTML = "Please enter your name";
                                       naame.focus();
                                        return false;

                                    }
                
                                  else if(naame.value.match(letters))
                                    {
                                    // Focus goes to next field i.e. Address.
                
                                               document.getElementById("Ename").innerHTML = "";
                                               document.Register.Address.focus();
                                               return true;
                                     }
                
                                    else
                                    {
                                             document.getElementById("Ename").innerHTML = "Name must have alphabet characters only";
                                             naame.focus();
                                             return false;
                                     }
                
                            }
                
                            function Adddress()
                            {
                                    var add = document.forms["Register"]["Address"];
                                    var addlet = /^[A-Za-z\s]+$/;
                
                
                                    if(add.value == "")
                                    {
                                             document.getElementById("EAddress").innerHTML = "Please enter your address";
                                             add.focus();
                                             return false;
                
                                    }

                                    else if(add.value.trim() == "" ){
                                      
                                      document.getElementById("EAddress").innerHTML = "Please enter your address";
                                       add.focus();
                                        return false;

                                    }
                
                           
                
                
                                else if(add.value.match(addlet))
                                 {
                                    document.getElementById("EAddress").innerHTML = "";
                                              document.Register.Email.focus();
                                              return true;
                                 }
                
                                else
                                {
                                              document.getElementById("EAddress").innerHTML = "Address should contain characters only";
                                              add.focus();
                                              return false;
                                }
        
                
                            }
                
            
                
                            function EMail()
                            {
                                var email = document.forms["Register"]["Email"];
                                  var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                
                
                                if(email.value == "")
                                {
                                         document.getElementById("Eemail").innerHTML = "Please enter your email";
                                         email.focus();
                                         return false;
                                }
                
                                else if(email.value.match(mail))
                                {
                                         document.getElementById("Eemail").innerHTML = "";
                                         document.Register.PhnNo.focus();
                                         return true;
                                }
                
                                else
                                {
                                         document.getElementById("Eemail").innerHTML = "Invalid Email";
                                         email.focus();
                                         return false;
                                }
                            }
                
                            function Phone()
                            {
                                    var phone = document.forms["Register"]["PhnNo"];
                                    var phn = /^\(?([1-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                
                                if(phone.value == "")
                                {
                                    document.getElementById("EPhone").innerHTML = "Please enter your phone no";
                                    phone.focus();
                                    return false;
                                }

                                
                
                                else if(phone.value.match(phn))
                                {
                                    document.getElementById("EPhone").innerHTML = "";
                                    document.Register.Pword.focus();
                                    return true;
                                }
                
                                else
                                {
                                    document.getElementById("EPhone").innerHTML = "Invalid Phone No";
                                    phone.focus();
                                    return false;
                
                                }
                            }
                
                
                
                
                            function Paswd()
                            {
                                var paswd = document.forms["Register"]["Pword"];
                                var pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
                
                                if(paswd.value == "")
                                {
                                    document.getElementById("EPwd").innerHTML = "Please enter your password";
                                    paswd.focus();
                                    return false;
                                }
                                
                                else if(paswd.value.trim() == "" ){
                                      
                                      document.getElementById("EPwd").innerHTML = "Please enter your password";
                                       paswd.focus();
                                        return false;

                                    } 
                                else if(paswd.value.match(pwd))
                                {
                                    document.getElementById("EPwd").innerHTML = "";
                                    document.Register.CPword.focus();
                                    return true;
                                }
                
                                else
                                {
                                    document.getElementById("EPwd").innerHTML= "Invalid Password";
                                    paswd.focus();
                                    return false;
                                }
                            }
                
                            function CPaswd()
                            {
                                var confirm = document.forms["Register"]["Pword"];
                                var cpaswd = document.forms["Register"]["CPword"];
                
                                if(cpaswd.value == "")
                                {
                                    document.getElementById("ECPwd").innerHTML = "Please enter your password";
                                    cpaswd.focus();
                                    return false;
                                }
                
                                if(confirm.value == cpaswd.value)
                                {
                
                                    //window.alert("Match");
                                    document.getElementById("ECPwd").innerHTML = "";
                                    document.Register.sub.focus();
                                    return true;
                
                
                                }
                
                                else
                                {
                                    window.alert( "Doesn't Match");
                                    cpaswd.focus();
                                    return false;
                
                
                                }
                
                            }
                
                
                        </script>
    
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input type = "text" name = "Name" id = "fullname" class = "form-control" placeholder = "Name" onblur = "Naame()"/>
                        <font color = "red"> <p id = "Ename"> </p> </font>
      
                     </div>
    
                     <div class="field space ">
                        <span class="fa fa-address-card"></span>
                        <textarea name = "Address" class = "form-control" placeholder = "Address" onblur = "Adddress()"></textarea>
                        <font color = "red">  <label id = "EAddress"> </label> </font>
                     </div> &nbsp;
                     
                     <div class="col-sm-15">
                     
                        <select class="form-control" name="staff_type" required="">
                        <span class="fa fa-user"></span>
                            <option>--Select User Type--</option>
                            <?php 
                           include "DbConnect.php";  
                           
                           $records = mysqli_query($con, "SELECT * From tbl_type");  
                   
                           while($row = mysqli_fetch_array($records))
                           {
                               echo "<option value='". $row['Type_Id'] ."'>" .$row['Type'] ."</option>";  
                           }	
                            ?>
                        </select>
                     
                   <div class="field space">
                      <span class="fa fa-envelope"></span>
                      <input type = "email" name = "Email" class = "form-control" placeholder = "Email Address" onblur = "EMail()"/>
                      <font color = "red"> <label id = "Eemail"> </label> </font>
    
                   </div>
    
                   <div class="field space">
                    <span class="fas fa-phone-alt"></span>
                    <input type = "number" name = "PhnNo" class = "form-control" placeholder = "Phone Number" onblur = "Phone()"/>
                    <font color = "red"> <label id = "EPhone"> </label> </font>
    
                 </div>
                   <div class="field space">
                      <span class="fa fa-lock"></span>
                      <input type="password" class="pass-key" required placeholder="Password" name = "Pword" onchange = "Paswd()" style="border: none;">
                      <font color = "red"> <label id = "EPword"> </label> </font>
                      
                   </div>
    
                   <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" required placeholder="Confirm Password" name = "CPword" onchange = "CPaswd()" style="border: none;">
                    <font color = "red"> <label id = "EPword"> </label> </font>
                    
                 </div>
                   
                   <div class="field sub">
                      <input type="submit" value="SUBMIT" name = "sub">
                      <input type="reset" value="RESET">
                   </div>
                </form>
    
                <br>
    
                <div class="signup">
                   Already have account?
                   <a href="stafflogin.html">Login</a>
                </div>
             </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
</body>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="./assets/vendor/purecounter/purecounter.js"></script>
  <script src="./assets/vendor/aos/aos.js"></script>
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>



</html>