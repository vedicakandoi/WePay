<?php
    session_start();
    if (isset($_SESSION['contact'])) {
        $con = mysqli_connect('localhost','root','','wepay');
        $contact = $_SESSION['contact'];
        $getUsername = mysqli_query($con,"SELECT username from users where contact = '$contact'");
        $_SESSION['username'] = mysqli_fetch_array($getUsername)['username'];
        $create_groupTable = mysqli_query($con,"CREATE TABLE IF NOT EXISTS groups (groupID INT PRIMARY KEY AUTO_INCREMENT, creatorContact VARCHAR(255), title VARCHAR(255), groupType VARCHAR(255), participants VARCHAR(255), FOREIGN KEY (creatorContact) REFERENCES users(contact) ON DELETE CASCADE)");
        $create_expenseTable = mysqli_query($con,"CREATE TABLE IF NOT EXISTS expenses (groupID INT, expense VARCHAR(255), paidBy VARCHAR(255), amount INT, expenseDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (groupID) REFERENCES groups(groupID) ON DELETE CASCADE)");
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

    <title>WePay | Dashboard</title>
</head>
<body ng-app="myApp" ng-controller="myCtrl" ng-init="showAddGroup=false;noOfMembers=2;">    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0 sidebar">
                <div id="sidebar" class="collapse collapse-horizontal show border-end">
                    <img src="images/logo.png" class="logo">
                    <h3 class="text-center hello-user">Hello, <?php echo strtok($_SESSION['username'], " "); ?>!</h3>
                    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start">
                        <a href="" class="list-group-item border-end-0 d-inline-block text-truncate" id="active" data-bs-parent="#sidebar"><i class="fa-solid fa-people-group me-2"></i><span>Groups</span></a>
                        <a href="blog.php" class="list-group-item border-end-0 d-inline-block text-truncate" data-bs-parent="#sidebar"><i class="fa-brands fa-blogger-b me-2"></i><span>Recent Blog</span></a>
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
            <div class="add-group" ng-show="showAddGroup">
                <div class="group-form" ng-submit="addNewGroup()">
                    <span ng-click="crossButton('showAddGroup')" class="cross pointer">&times;</span>
                    <h2><span>Create </span>New Group</h2>
                    <form name="groupForm" novalidate>
                        <input class="group-input" type="text" placeholder="Group Title" spellcheck="false" ng-required="true" name="title" ng-model="title">
                        <select class="group-input" name="types" ng-model="type" ng-required="true">
                            <option value="" disabled selected>Type</option>
                            <option value="Travel">Travel</option>
                            <option value="Food">Food</option>
                            <option value="Home">Home</option>
                            <option value="Other">Other</option>
                        </select>
                        <h4 class="text-center" style="user-select:none;">Participants<i class="fa-solid fa-circle-plus change-member pointer ms-2" ng-click="addMemberInput()"></i><i class="fa-solid fa-circle-minus change-member pointer ms-2" ng-click="removeMemberInput()"></i></h4>
                        <div class="row" id="participants">
                            <div class="col-6">
                                <input class="group-input" type="text" placeholder="Name" spellcheck="false" ng-required="true" name="members[]" ng-model="member1">
                            </div>
                            <div class="col-6">
                                <input class="group-input" type="text" placeholder="Name" spellcheck="false" ng-required="true" name="members[]" ng-model="member2">
                            </div>
                        </div>
                        <input type="submit" value="Create Group" class="btn" ng-disabled="groupForm.$invalid">
                    </form>
                </div>
            </div>
                <div class="row">
                    <div class="col-10">
                        <h2>Groups</h2>
                    </div>
                    <div class="col-2 my-auto">
                        <button class="btn bg-theme" id="addgroup" ng-click="viewButton('showAddGroup')">Add group</button>
                    </div>
                </div>
                <?php
                    $getGroups = mysqli_query($con, "SELECT * FROM groups where creatorContact = '$contact'");
                    $num = mysqli_num_rows($getGroups);
                    if ($num>0) {
                        ?>
                <div class="list-group list-group-checkable pe-5">
                <?php
                    while ($group = mysqli_fetch_array($getGroups)) {
                            $groupID = $group['groupID'];
                            $title = $group['title'];
                            $participants = $group['participants'];
                            $groupType = $group['groupType'];
                            $getExpenses = mysqli_query($con, "SELECT * FROM expenses where groupID = '$groupID'");
                            $numExpenses = mysqli_num_rows($getExpenses);
                            $membersList = explode(',',$participants);
                ?>
                
                    <div class="list-group-item py-3" ng-init="addExpenseTo<?php echo $groupID;?>=false;addMemberTo<?php echo $groupID;?>=false;">
                    
                        <div class="group-header" data-bs-toggle="collapse" href="#group<?php echo $groupID;?>" role="button">
                        <?php //group icon
                            if ($groupType == 'Home') { ?>
                            <i class="fa-solid fa-house-chimney group-icon"></i>
                            <?php
                            } elseif ($groupType == 'Food') { ?>
                                <i class="fa-solid fa-utensils group-icon"></i>
                            <?php
                            } elseif($groupType == 'Travel') { ?>
                                <i class="fa-solid fa-plane-up group-icon"></i>
                            <?php
                            } elseif($groupType == 'Other') { ?>
                                <i class="fa-solid fa-user-group group-icon"></i>
                            <?php
                            } ?>
                        <span class="group-title"><?php echo $title;?></span>
                        <?php //status
                            if($numExpenses>0) { ?>
                            <i class="fa-solid fa-circle-exclamation status text-danger"></i>
                            <?php
                            } else { ?>
                            <i class="fa-solid fa-circle-check text-success status"></i>
                            <?php
                            } ?>
                        </div>
                        <div class="group-details p-3 collapse" id="group<?php echo $groupID;?>">
                            <div class="row">
                                <?php
                                if ($numExpenses>0) { ?>
                                <div class="col-6">
                                    <div class="list-group">
                                <?php
                                    $total = 0;
                                    $noOfMembers = count($membersList);
                                    $expenses = array();
                                    while ($expense = mysqli_fetch_array($getExpenses)) {
                                        $expensetitle = $expense['expense'];
                                        $paidBy = $expense['paidBy'];
                                        $amount = $expense['amount'];
                                        $expenseDate = date('j M Y', strtotime($expense['expenseDate']));
                                        if (array_key_exists($paidBy,$expenses)) {
                                            $expenses[$paidBy] += $amount;
                                        } else {
                                            $expenses[$paidBy] = (int)$amount;
                                        }
                                        $total += $amount;                                        
                                ?>
                                    <label class="list-group-item d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <span><?php echo $expensetitle;?><small class="d-block text-muted"><?php echo $paidBy;?> paid <?php echo $amount;?></small></span>
                                        </div>
                                        <div>
                                            <small class="opacity-50 text-nowrap"><?php echo $expenseDate;?></small>
                                            <span ng-click="deleteExpense(<?php echo $groupID;?>,'<?php echo $expensetitle;?>')" class="ms-2 pointer" style="font-size:20px;">&times;</span>
                                        </div>
                                        
                                    </label>
                                <?php
                                    } //while expense loop ends
                                ?>
                                    <label class="list-group-item d-flex gap-2 w-100 justify-content-between" ng-show="addExpenseTo<?php echo $groupID;?>">
                                            <div>
                                                <span>
                                                    <form name="expenseForm" ng-submit="addExpense(<?php echo $groupID;?>)" novalidate>
                                                    <input type="text" placeholder="Expense Title" ng-model="expenseTitle" name="expenseTitle" ng-required="true" class="expense-input">
                                                    <small class="d-block text-muted">
                                                        <select ng-model="paidBy" name="paidBy" ng-required="true" class="expense-input">
                                                            <option value="" selected disabled>Paid By</option>
                                                            <?php
                                                                foreach ($membersList as $member) {
                                                            ?>
                                                                <option value="<?php echo $member;?>"><?php echo $member;?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        paid 
                                                        <input type="number" placeholder="Amount" ng-model="eamount" name="eamount" ng-required="true" class="expense-input">
                                                    </small>
                                                
                                                <input type="submit" value="Save Expense" class="btn btn-sm bg-theme expense-btn" ng-disabled="expenseForm.$invalid">
                                                </form>
                                                </span>
                                            </div>
                                            <small class="opacity-50 text-nowrap"><span ng-click="crossButton('addExpenseTo<?php echo $groupID;?>')" class="cross pointer">&times;</span></small>
                                        </label>
                                    </div>
                                    <div class="balances">
                                        <ul>
                                        <?php
                                        $pp = $total/$noOfMembers;
                                        $givers = array();
                                        $receivers = array();
                                        foreach($membersList as $member) {
                                            if (array_key_exists($member,$expenses)) {
                                                if ($expenses[$member]-$pp>0){
                                                    array_push($receivers,[$member,$expenses[$member]-$pp]);
                                                } else {
                                                    array_push($givers,[$member,$pp-$expenses[$member]]);
                                                }
                                            } else {
                                                array_push($givers,[$member,$pp]);
                                            }
                                        }
                                        for($i=0;$i<count($givers);$i++) {
                                            for($j=0; $j<count($receivers); $j++) {
                                                if ($receivers[$j][1]!=0) {
                                                    if($receivers[$j][1]>$givers[$i][1]) {
                                        ?>
                                            <li><?php echo $givers[$i][0];?> owes <?php echo round($givers[$i][1],2);?> to <?php echo $receivers[$j][0];?>.</li>
                                        <?php
                                                $receivers[$j][1] -= $givers[$i][1];
                                                $givers[$i][1] = 0;
                                                break;
                                            } elseif ($receivers[$j][1]<$givers[$i][1]) {
                                        ?>
                                            <li><?php echo $givers[$i][0];?> owes <?php echo round($receivers[$j][1],2);?> to <?php echo $receivers[$j][0];?>.</li>
                                        <?php
                                                $givers[$i][1] -= $receivers[$j][1];
                                                $receivers[$j][1] = 0;
                                            } else {
                                        ?>
                                            <li><?php echo $givers[$i][0];?> owes <?php echo round($givers[$i][1],2);?> to <?php echo $receivers[$j][0];?>.</li>
                                        <?php
                                                $receivers[$j][1] = 0;
                                                $givers[$i][1] = 0;
                                                break;
                                            }
                                        }
                                        }
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                                    } else {
                                ?>
                                    <div class="col-6">
                                        <div class="list-group">
                                        <label class="list-group-item d-flex gap-2 w-100 justify-content-between" ng-show="addExpenseTo<?php echo $groupID;?>">
                                            <div>
                                                <span>
                                                    <form name="expenseForm" ng-submit="addExpense(<?php echo $groupID;?>)" novalidate>
                                                    <input type="text" placeholder="Expense Title" ng-model="expenseTitle" name="expenseTitle" ng-required="true" class="expense-input">
                                                    <small class="d-block text-muted">
                                                        <select ng-model="paidBy" name="paidBy" ng-required="true" class="expense-input">
                                                            <option value="" selected disabled>Paid By</option>
                                                            <?php
                                                                foreach ($membersList as $member) {
                                                            ?>
                                                                <option value="<?php echo $member;?>"><?php echo $member;?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        paid 
                                                        <input type="number" placeholder="Amount" ng-model="eamount" name="eamount" ng-required="true" class="expense-input">
                                                    </small>
                                                
                                                <input type="submit" value="Save Expense" class="btn btn-sm bg-theme expense-btn" ng-disabled="expenseForm.$invalid">
                                                </form>
                                                </span>
                                            </div>
                                            <small class="opacity-50 text-nowrap"><span ng-click="crossButton('addExpenseTo<?php echo $groupID;?>')" class="cross pointer">&times;</span></small>
                                        </label>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                                <div class="col-3 text-center">
                                    <h4>Participants</h4>
                                    <ul class="list-unstyled">
                                        <?php
                                            foreach ($membersList as $member) {
                                        ?>
                                            <li><?php echo $member;?></li>
                                        <?php
                                            }
                                        ?>
                                        <li ng-show="addMemberTo<?php echo $groupID;?>">
                                            <form name="memberform" ng-submit="addMember(<?php echo $groupID;?>)">
                                                <input type="text" placeholder="Name" ng-model="newmember" name="newmember" ng-required="true" class="member-input" size="10">
                                                <input type="submit" value="Add" ng-disabled="memberform.$invalid" class="btn bg-theme btn-sm member-btn">
                                                <span ng-click="crossButton('addMemberTo<?php echo $groupID;?>')" class="pointer" style="font-size:20px;">&times;</span>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-3"> 
                                    <button class="btn bg-theme my-2 w-100" ng-click="viewButton('addExpenseTo<?php echo $groupID;?>')">Add Expense</button><br>
                                    <button class="btn bg-theme my-2 w-100" ng-click="viewButton('addMemberTo<?php echo $groupID;?>')">Add member</button>
                                    <button class="btn bg-theme my-2 w-100" ng-click="settleUp(<?php echo $groupID;?>)">Settle Up</button><br>
                                    <button class="btn btn-danger my-2 w-100" ng-click="deleteGroup(<?php echo $groupID;?>)">Delete group</button><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }// while group loop ends
                    ?>
                </div>
                <?php
                    } else {
                        echo "No groups yet.";
                    }
                ?>
        </main>
        </div>
    </div>
    <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope,$http) {
            $http.get('funfacts.json').then(function(response) {
                $scope.funfacts = response.data;
            })
            $scope.addMemberInput = function() {
                $scope.noOfMembers++;
                $('#participants').append("<div class='col-6' id='member"+$scope.noOfMembers+"'><input class='group-input' type='text' placeholder='Name' spellcheck='false' id='member"+$scope.noOfMembers+"' ng-required='true' name='members[]'></div>");
            }
            $scope.removeMemberInput = function() {
                if ($scope.noOfMembers>2) {
                    $('#member'+$scope.noOfMembers).remove();
                    $scope.noOfMembers--;
                }
            }
            $scope.addNewGroup = function() {
                var list = document.getElementsByName('members[]');
                $scope.participantsList = [];
                for (i=0;i<$scope.noOfMembers;i++) {
                    var val = document.getElementsByName('members[]')[i].value;
                    if (val!='') {
                        $scope.participantsList.push(val);
                    }
                }
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText=="success") {
                            window.location.reload();
                        } else {
                            alert(this.responseText);
                        }
                    }
                }
                xmlhttp.open("GET","addGroup.php?title="+$scope.title+"&type="+$scope.type+"&members="+$scope.participantsList,true);
                xmlhttp.send();
            }
            $scope.addExpense = function(groupID) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText=="success") {
                            window.location.reload();
                        } else {
                            alert(this.responseText);
                        }
                    }
                }
                xmlhttp.open("GET","addExpense.php?groupID="+groupID+"&title="+$scope.expenseTitle+"&paidBy="+$scope.paidBy+"&amount="+$scope.eamount,true);
                xmlhttp.send();
            }
            $scope.viewButton = function (toshow) {
                $scope[toshow] = true;
            }
            $scope.crossButton = function (tohide) {
                $scope[tohide] = false;
            }
            $scope.addMember = function(groupID) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText=="success") {
                            window.location.reload();
                        } else {
                            alert(this.responseText);
                        }
                    }
                }
                xmlhttp.open("GET","addMember.php?groupID="+groupID+"&name="+$scope.newmember,true);
                xmlhttp.send();
            }
            $scope.deleteGroup = function(groupID) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText=="success") {
                            window.location.reload();
                        } else {
                            alert(this.responseText);
                        }
                    }
                }
                xmlhttp.open("GET","deleteGroup.php?groupID="+groupID,true);
                xmlhttp.send();
            }
            $scope.settleUp = function(groupID) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText=="success") {
                            window.location.reload();
                        } else {
                            alert(this.responseText);
                        }
                    }
                }
                xmlhttp.open("GET","settleUp.php?groupID="+groupID,true);
                xmlhttp.send();
            }
            $scope.deleteExpense = function(groupID,title) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        if (this.responseText=="success") {
                            window.location.reload();
                        } else {
                            alert(this.responseText);
                        }
                    }
                }
                xmlhttp.open("GET","deleteExpense.php?groupID="+groupID+"&title="+title,true);
                xmlhttp.send();
            }
        });
    </script>
</body>
</html>
<?php
    } else {
        header('location:index.php');
    }
?>