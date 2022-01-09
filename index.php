<!DOCTYPE html>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />

    <!--====== Title ======-->
    <title>eCommerce HTML | Login</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="assets/images/favicon.png"
      type="image/png"
    />

    <!--====== Tiny Slider CSS ======-->
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css" />

    <!--====== Material Design Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!--====== gLightBox CSS ======-->
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />

    <!--====== nouiSlider CSS ======-->
    <link rel="stylesheet" href="assets/css/nouislider.min.css" />

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css" />

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>

<?php
    if(isset($_REQUEST['EmpId']))
    {
      $EmpId=$_REQUEST['EmpId'];
      $Phone=$_REQUEST['Phone'];

      echo "EmpId=$EmpId Phone=$Phone";
      include("connectdb.php");
      include("basic.php");
      $sql = "SELECT DeptId,EmpName,JobTitle FROM employee where EmpId='$EmpId' and Phone='$Phone'";
      $result =$connect->query($sql);

      if($row = $result->fetch_assoc())
      {
        $DeptId=$row['DeptId'];
        $EmpName=$row['EmpName'];
        $JobTitle=$row['JobTitle'];

        session_start();
        $_SESSION['EmpId']=$EmpId;
        $_SESSION['DeptId']=$DeptId;
        $_SESSION['EmpName']=$EmpName;
        $_SESSION['JobTitle']=$JobTitle;

        switchto("dept.php");

      }
      else  echo "login fail!";


    }


?>
    


    <!--====== Navbar White Page Banner Part Ends ======-->

    <!--====== Login Part Start ======-->

    <section class="login-registration-wrapper pt-50 pb-100">
      <div class="container">
        <div class="row">
        <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="login-registration-style-3 mt-50">
              <h1 class="heading-4 font-weight-500 title">
                Login to your account
              </h1>
              <ul>
                <li>
                  <a href="#0" class="facebook-login-registration"
                    ><i class="lni lni-facebook-original"></i>
                    <span>Login with Facebook</span></a
                  >
                </li>
                <li>
                  <a href="#0" class="google-login-registration"
                    ><img src="assets/images/google-logo.svg" alt="" />
                    <span>Login with Google</span></a
                  >
                </li>
              </ul>
              <p class="account">or Log In with EmpId</p>
              <div class="login-registration-form pt-10">
                <form action="index.php" method='post'>
                  <div class="single-form form-default form-border">
                    <label>EmpId </label>
                    <div class="form-input">
                      <input type="EmpId" name='EmpId' placeholder="EmpId" />
                      <i class="EmpId"></i>
                    </div>
                  </div>
                  <div class="single-form form-default form-border">
                    <label>Choose Phone</label>
                    <a class="forget" href="#0">Forget Phone?</a>
                    <div class="form-input">
                      <input name='Phone'   id="Phone"   type="Phone"    placeholder="Phone"/>
                      <i class="mdi mdi-lock"></i>
                      <span
                        toggle="#Phone"
                        class="mdi mdi-eye-outline Phone"
                      ></span>
                    </div>
                  </div>
                  <div class="single-checkbox checkbox-style-3">
                    <input type="checkbox" id="login-1" />
                    <label for="login-1"><span></span> </label>
                    <p>Remember Me</p>
                  </div>
                  <div class="single-form">
                    <button class="main-btn primary-btn">Signin</button>
                  </div>
                </form>
              </div>
              <p class="login">
                Don’t have an account? <a href="#0">Sign up</a>
              </p>
            </div>
          </div>