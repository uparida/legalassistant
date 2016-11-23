
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Legal Assistance</title>

        <!-- Bootstrap Core CSS -->

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/site/css/simple-line-icons.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/site/css/device-mockups.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <!-- Theme CSS -->
        <link href="<?php echo base_url('/assets/site/css/new-age.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/angular-load.min.js'); ?>"></script>
        <script src="<?php echo base_url("assets/js/angular-route.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/ngStorage.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular-base64.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/app/app.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/controllers/LawyerController.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/controllers/ClientController.js'); ?>"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top"  ng-app="myApp" >

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" style=" padding-top:60px; font-size:70px; color: #ff9000; text-shadow: 1px 1px #ac6a15; text-align:center; float:left; margin:0px auto; width:230%" href="<?php echo base_url('') ?>"><strong>Legal Assistance</a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <!--                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">


                                        <li>
                                            <a class="page-scroll" href="<?php echo site_url('about-us') ?>">About us</a>
                                        </li>

                                    </ul>
                                </div>-->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>


        <!--        <h2>Modal Login Example</h2>
                 Trigger the modal with a button
                <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

                 Modal
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                         Modal content
                        <div class="modal-content">
                            <div class="modal-header" style="padding:35px 50px;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                            </div>
                            <div class="modal-body" style="padding:40px 50px;">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                        <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                        <input type="text" class="form-control" id="psw" placeholder="Enter password">
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="" checked>Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <p>Not a member? <a href="#">Sign Up</a></p>
                                <p>Forgot <a href="#">Password?</a></p>
                            </div>
                        </div>

                    </div>
                </div>-->


        <div class="modal fade" id="lawyerModal" role="dialog" ng-controller="lawyerController"  ng-init="baseUrl = '<?php echo base_url() ?>'">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form col-md-12 center-block">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Username"  ng-model="login.username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-lg" placeholder="Password" ng-model="login.password">
                            </div>
                            <div class="form-group">
                                <!--                                <button class="btn btn-primary btn-lg btn-block" ng-click="loginLawyer()">Log In</button>-->
                                <input type="button" class="btn btn-primary btn-lg btn-block" name="login" value="Log In" ng-click="loginLawyer()">



                            </div>
                            <?php echo "<a href='$login_url'><img class='fb' src=" . base_url() . "/assets/images/facebook-login.png" . "></a>"; ?>
                            <div class="form-group">
<!--                                <span class="pull-right"><a href="<?php echo site_url('lawyer/register') ?>">Register</a></span><span>  -->
                                <p >   <span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </span><a href="<?php echo site_url('lawyer/register') ?>"  style="color:black">Register</a></p>
                                <p>  <span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </span> <a href="<?php echo site_url(''); ?>" style="color:black">Go to home page</a></p>
<!--                                <a href="<?php echo site_url(''); ?>" class="btn btn-outline btn-xl page-scroll  btn-lg">Go to home page</a></span>-->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
<!--                            <a href="<?php echo site_url(); ?>" ><button class="btn " data-dismiss="modal" aria-hidden="true">Cancel</button></a>-->
                            <a href="<?php echo site_url(); ?>" > <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<!--<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" ng-controller="clientDetailController"  ng-init="baseUrl = '<?php echo base_url() ?>'">-->


        <div class="modal fade" id="clientModal" role="dialog" ng-controller="clientDetailController"  ng-init="baseUrl = '<?php echo base_url() ?>'">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form col-md-12 center-block">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" placeholder="Username"  ng-model="login.username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-lg" placeholder="Password" ng-model="login.password">
                            </div>

                            <div class="form-group">
                                <!--                                <button class="btn btn-primary btn-lg btn-block" ng-click="loginLawyer()">Log In</button>-->
                                <input type="button" class="btn btn-primary btn-lg btn-block" name="login" value="Log In" ng-click="loginClient()">



                            </div>

                            <p> <a href="<?php echo site_url('client/questionnaire'); ?>" style="color:black">
                                    <span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </span>Quick Search Lawyers</a></p>
                            <p>   <span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </span><a href="<?php echo site_url(''); ?>" style="color:black">Go to home page</a></p>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <a href="<?php echo site_url(); ?>" > <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#myBtn").click(function () {
                    $("#myModal").modal();
                });
                $("#lawyerBtn").click(function () {
                    $("#lawyerModal").modal();
                });
                $("#clientBtn").click(function () {
                    $("#clientModal").modal();
                });
            });
        </script>

        <style>
            .modal-header, h4, .close {
                background-color: #5cb85c;
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-footer {
                background-color: #f9f9f9;
            }
        </style>