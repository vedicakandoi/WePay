<?php
if (isset($_SESSION['contact'])) {
  unset($_SESSION['contact']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a3161b4d26.js" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/ico">

    <title>WePay</title>
</head>
<body ng-app="myApp" ng-controller="myCtrl" ng-init="showLogin=false">
    <nav class="py-3">
        <ul class="nav justify-content-end">
            <li ng-click="viewLogin()" class="nav-item"><a href="" class="nav-link">Log in</a></li>
            <li class="nav-item"><a href="signup.html" class="nav-link">Sign up</a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-instagram"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-twitter"></i></a></li>
        </ul>
    </nav>
    <div class="login-page" id="loginPage" ng-show="showLogin">
      <div class="login-form">
          <span ng-click="crossLogin()" class="cross pointer">&times;</span>
          <h2>Login<span> Here</span></h2>
          <form name="inputform" ng-submit="login()" novalidate>
              <input class="login-input" type="text" placeholder="Mobile number" spellcheck="false" ng-required="true" name="contact" ng-model="contact">
              <input class="login-input" type="password" placeholder="Password" ng-required="true" name="password" ng-model="password">
              <input type="submit" value="Log in" class="btn" ng-disabled="inputform.username.$error.required || inputform.password.$error.required">
          </form>
          <small class="pointer">Forgot password?</small>
      </div>
    </div>
    <section class="main py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-auto title">
                    <h1>WePay</h1>
                    <p>Why stress when you can split like a pro?</p>
                    <a class="home-btn btn btn-lg" href="signup.html">Get started</a>
                </div>
                <div class="col-md-6">
                    <img class="main-img" src="images/logo.png">
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="row">
            <div class="col-md-4 about-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/pun3.jpg" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="images/pun2.jpg" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="images/pun1.jpg" class="d-block w-100" >
                      </div>
                      <div class="carousel-item">
                        <img src="images/pun4.jpg" class="d-block w-100" >
                      </div>
                      <div class="carousel-item">
                        <img src="images/pun5.jpg" class="d-block w-100" >
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-md-6 about-content">
                <h2>About WePay</h2>
                <p>WePay was founded in 2022 with the intent of making bill splitting easy for anyone and everyone. Using WePay, you can add and organize expenses, track balances and pay back (money, not revenge). All of this in one, with ease and fun.</p>
            </div>
        </div>   
    </section>
    <section class="steps text-center">
      <h2>Easy Steps to Split Costs</h2>
      <div class="row">
          <div class="col-lg-3 col-md-6 step">
                  <span>1</span>
                  <i class="fa-solid fa-circle-plus"></i>
                  <p>Create groups</p>
          </div>
          <div class="col-lg-3 col-md-6 step">
                  <span>2</span>
                  <i class="fa-solid fa-user-group"></i>
                  <p>Add friends</p>
          </div>
          <div class="col-lg-3 col-md-6 step">
                  <span>3</span>
                  <i class="fa-solid fa-file-invoice-dollar"></i>
                  <p>Add expenses</p>
          </div>
          <div class="col-lg-3 col-md-6 step">
                  <span>4</span>
                  <i class="fa-solid fa-hand-holding-dollar"></i>
                  <p>Split!</p>
          </div>
      </div>
  </section>
    <section class="features py-5">
        <div class="row text-center">
            <div class="col-md-6">
                <h2>Basic Features</h2>
                <ul class="tick">
                    <li>Add groups and friends</li>
                    <li>Split expenses</li>
                    <li>Record debts</li>
                    <li>Calculate total balances</li>
                    <li>Simplify debts</li>
                    <li>Read blogs</li>
                    <li>Learn some cool facts!</li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <h2>Diamond Features</h2>
                <ul class="diamond">
                    <li>All the basic features, plus</li>
                    <li>Split by % or shares</li>
                    <li>Scan bill</li>
                    <li>100+ currencies</li>
                    <li>10+ languages</li>
                    <li>In-app payment options</li>
                    <li>Early access to new features</li>
                    <li>I mean it's called 'diamond', come on!</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="testimonials text-center">
        <div class="row">
          <div class="col-lg-4 testimonial">
            <i class="fa-solid fa-quote-left"></i>
            <p>Life hack for group trips. Amazing tool to use when traveling with friends! Makes life so easy!!</p>
            <img src="images/testimonial (1).jpg" class="avatar">
            <span>Wilbur Easton</span>
          </div>
          <div class="col-lg-4 testimonial">
            <i class="fa-solid fa-quote-left"></i>
            <p>So amazing to have this app manage balances and help keep money out of relationships. love it!</p>
            <img src="images/testimonial (2).jpg" class="avatar">
            <span>Jeanne Cristen</span>
          </div>
          <div class="col-lg-4 testimonial">
            <i class="fa-solid fa-quote-left"></i>
            <p>I never fight with roommates over bills because of this genius expense-splitting app. I love WePay.</p>
            <img src="images/testimonial (3).jpg" class="avatar">
            <span>Tawny Brendan</span>
          </div>
        </div>
    </section>
    <footer class="text-center py-3 mt-5">
        Copyright &#169; Vedica Kandoi B084
    </footer>
    <button type="button" class="btn btn-floating btn-lg" id="top-btn">
      <i class="fas fa-arrow-up"></i>
    </button>
    <script>
        let mybutton = document.getElementById("top-btn");
        window.onscroll = function () {
          scrollFunction();
        };
        function scrollFunction() {
          if ( document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }
        mybutton.addEventListener("click", backToTop);
        function backToTop() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
    </script>
    <script>
      var app = angular.module('myApp', []);
      app.controller('myCtrl', function($scope,$http) {
          $scope.viewLogin = function() {
              $scope.showLogin = true;
          }
          $scope.login = function() {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
              if (this.readyState==4 && this.status==200) {
                if (this.responseText=="success") {
                  window.location = "groups.php";
                } else {
                  alert(this.responseText);
                }
                  
              }
            }
            xmlhttp.open("GET","login.php?contact="+$scope.contact+"&pwd="+$scope.password,true);
            xmlhttp.send();
          }
          $scope.crossLogin = function () {
              $scope.showLogin = false;
          }
      });
    </script>
    </body>
</html>