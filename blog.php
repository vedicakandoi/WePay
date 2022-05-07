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
                        <a href="" class="list-group-item border-end-0 d-inline-block text-truncate" id="active" data-bs-parent="#sidebar"><i class="fa-brands fa-blogger-b me-2"></i><span>Recent Blog</span></a>
                        <a href="help.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-solid fa-circle-question me-2"></i><span>Need Help?</span></a>
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
        <h2>5 Financial Bloggers Share Their Secrets To Running A Successful Blog</h2>
            <div style="max-width:1100px">
                <p>
                    The blogging business is booming and the financial space is no exception. Personal finance bloggers often start by documenting their own personal financial journeys and sharing money-saving advice. For some, those journeys lead to a successful business.
                    For the past decade, the Plutus Awards has been recognizing these creators with an annual ceremony and award season that puts the focus on excellence in financial media. The awards recognize independent financial media voices as well as favorite products and services in the financial industry. According to Harlan Landes, founder of The Plutus Awards, “It's been really interesting to see how the community of bloggers and podcasters has changed. Many blogs and podcasts have become a lot more sophisticated and marketable.” He adds, “People are a lot more concerned with building their businesses and brands, more so than 10 years ago.”
                </p>
                <img src="images/blog1.jpg" style="height:300px;" class="mt-3 mb-4">
                <p>
                    Here, twenty of the 2019 Plutus Awards finalists share what they have learned while building their blogging businesses. As with any small business, their paths to success are diverse. Some of the blogs nominated are young, while others have passed the decade mark; some of these entrepreneurs make a full-time living from their blogs while others use theirs to attract clients for other types of services, such as freelance writing or financial-planning services. All have a passion, though, for helping others navigate the often confusing world of personal and small business finances. Here's how they do it:
                </p>

                <p><h4 class="mt-3"><b>Jackie Beck, founder of JackieBeck.com</b></h4></p>
                <p><b>“I help people get out of debt without putting their life on hold.”</b></p>
                <p><b>Year founded:</b> 2011</p>
                <p><b>How her blog makes money:</b> Sales of her smartphone app, "Pay Off Debt by Jackie Beck," and advertising are Beck's top revenue sources. Others include affiliate marketing (getting paid for recommending other products), courses, and some speaking.</p>
                <p>
                <b>Biggest lesson/challenge:</b> "For me, being part of a community of fellow business owners has been key. This was true way back when I started a wedding photography business, and it's been true ever since I started helping people get out of debt. Viewing other small business owners as community members with similar goals versus seeing them as competition means you approach the world a different way.
                </p>
                <p>
                "Sharing knowledge and being there for one another benefits everyone involved, especially since our businesses are similar. We know what each other are going through to a certain extent, and can share pitfalls, resources, and successes. There's room for everyone to succeed."
                </p>

                <p><h4 class="mt-3"><b>Kelan and Brittany Kline, co-founders of The Savvy Couple</b></h4></p>
                <p><b>“We help families learn how to budget their money, organize their life, and unlock the freedom to do more of the things they love!”</b></p>
                <p><b>Year founded:</b> 2016</p>
                <p>
                <b>How their blog makes money:</b> Sponsorships (45%), ads (23%), affiliate marketing (22%), product/course sales (10%).
                </p>
                <p>
                <b>Biggest lesson/challenge:</b> "To become a successful business owner you need to have excellent time-management skills. Over the last three years, we have really put a lot of time and effort into being as efficient as possible in everything we do. Things like using the Eisenhower Matrix, utilizing a project management software, setting up systems for everything we do, outsourcing, and tracking our work hours has been instrumental to our success."
                </p>

                <p><h4 class="mt-3"><b>Eric Roberge, founder of Beyond Your Hammock</b></h4></p>
                <p><b>A blog dedicated to helping people use their money as a tool to live a life they love.</b></p>
                <p><b>Year founded:</b> 2015</p>
                <p><b>How his blog makes money:</b> Roberge runs a fee-only financial planning firm and the blog supports that business while also helping people who are not clients.</p>
                <p><b>Biggest lesson/challenge:</b> "One major factor in our success is the fact that I was extremely cognizant of our profit margin for a long, long time. Most independent advisors have profit margins around 30%, but until last year we were consistently at 80% or 90%. Staying lean has allowed me to be really flexible and forced me to be innovative. It also has allowed me to build a solid foundation for my personal finances, so that now, as we look to reinvest more in the business and know that our profit margin will start dropping (at least to some degree) as we hire and scale, I feel confident that we can truly afford to take those risks that are necessary to get the business to the next level. It's much more of a calculated risk because we're not putting ourselves in a do-or-die situation, and that allows for clearer thinking and less emotional/irrational decision-making.</p>

                <p><h4 class="mt-3"><b>Robert Farrington, founder of The College Investor</b></h4></p>
                <p><b>A blog offering investing and personal finance advice for millennials.</b></p>
                <p><b>Year founded:</b> 2009</p>
                <p><b>How his blog makes money:</b> Affiliate marketing, display advertising, brand partnerships, sales of his own products</p>
                <p><b>Biggest lesson/challenge:</b> "For anyone just starting out, I believe there are three keys to online success: 1. Consistency; 2. Creating the best [insert your product/service]; and 3. Time. For an online business, like a blog, creating the best is about creating the best content: written, audio, video. Then, you need to do it consistently—this means multiple times per week, every week. And finally, you need to do it over a long period of time—this means at least one year. If you do all three, you have a high likelihood of success.</p>

                <p><h4 class="mt-3"><b>Kristen Edens, founder of Managing Midlife</b></h4></p>
                <p><b>A blog that covers “family, finances, and entrepreneurship for the Sandwich Generation.”</b></p>
                <p><b>Year founded:</b> 2015</p>
                <p><b>How her blog makes money:</b> Edens' primary income comes from her content writing services, and she says her blog has “definitely helped me attract business.”</p>
                <p><b>Biggest lesson/challenge:</b> "My biggest challenge as an entrepreneur is patience—with myself, with the process, and with building a business. Nothing happens overnight and all those "overnight successes" I admire have had their struggles, too. I need to remember that, especially when I get down on myself. Last year while at FinCon18 (a conference for financial bloggers and podcasters), I was mesmerized by all the successful bloggers, YouTubers, podcasters, freelancers, and everyone else who, to me, had the success I craved and needed. It isn't an easy task as a solopreneur (at any age), and I felt tremendously outclassed.</p>
                <p>"Then, while mentoring a first-timer to FinCon, my mentee admitted to studying me online, and right off the bat said, 'I'm impressed with all that you have accomplished in your life and want to be as successful as you!' That changed my view moving forward. That statement helped me understand that what we see is not the reality. Entrepreneurship is a lot of hard work, no matter what level you are at."</p>
                <p class="mt-4 mb-5"><i>This article was originally published on AllBusiness.</i></p>
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