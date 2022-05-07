<?php
    session_start();
    if (isset($_SESSION['contact'])) {
        $con = mysqli_connect('localhost','root','','wepay');
        $contact = $_SESSION['contact'];
        $getUsername = mysqli_query($con,"SELECT username from users where contact = '$contact'");
        $_SESSION['username'] = mysqli_fetch_array($getUsername)['username'];
?>
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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

<!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="image/ico">

    <title>WePay | Blog</title>
</head>
<body ng-app="myApp" ng-controller="myCtrl">    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0 sidebar">
                <div id="sidebar" class="collapse collapse-horizontal show border-end">
                    <img src="images/logo.png" class="logo">
                    <h3 class="text-center hello-user">Hello, <?php echo strtok($_SESSION['username'], " "); ?>!</h3>
                    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start">
                        <a href="groups.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-solid fa-people-group me-2"></i><span>Groups</span></a>
                        <a href="blog.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-brands fa-blogger-b me-2"></i><span>Recent Blog</span></a>
                        <a href="" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar" id="active"><i class="fa-solid fa-circle-question me-2"></i><span>Need Help?</span></a>
                        <a href="index.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-solid fa-power-off me-2"></i><span>Log Out</span></a>
                    </div>
                    <?php 
                    $n = rand(0,37);
                    ?>
                    <div class="fun-fact">{{funfacts[<?php echo $n;?>].heading}}
                        {{funfacts[<?php echo $n;?>].content}}
                    </div>
                    <nav>
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-instagram"></i></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="fa-brands fa-twitter"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        <main class="col ps-md-5 pt-2">
        <h2>Connect With Us</h2>
            <div class="row">
                <div class="col-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.9490427543674!2d72.83535271482248!3d19.109891287068503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9b888ae67fd%3A0xe0b9538d623ac5d2!2sMukesh%20Patel%20School%20Of%20Technology%20Management%20%26%20Engineering!5e0!3m2!1sen!2sin!4v1648571951997!5m2!1sen!2sin" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-6 ps-5">
                    <h3>Contact</h3>
                    <div class="contact-item ms-3 my-4">
                        <i class="fa-solid fa-phone-flip me-3"></i>9773833422
                    </div>
                    <div class="contact-item ms-3 my-4">
                        <i class="fa-solid fa-phone-flip me-3"></i>9012345678
                    </div>
                    <div class="contact-item ms-3 my-4">
                        <i class="fa-solid fa-envelope me-3"></i>vedica01@gmail.com
                    </div>
                    <div class="contact-item ms-3 my-4">
                        <i class="fa-solid fa-envelope me-3"></i>vedica.kandoi39@nmims.edu.in
                    </div>
                    
                </div>
            </div>
        </main>
        </div>
    </div>
    <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope,$http) {
            $http.get('funfacts.json').then(function(response) {
                $scope.funfacts = response.data;
            })
        });
    </script>
</body>
</html>
<?php
    } else {
        header('location:index.php');
    }
?>