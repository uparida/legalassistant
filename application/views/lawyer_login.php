<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Bootstrap Login Form</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

        <!--<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>-->

        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
        <script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/angular-load.min.js'); ?>"></script>
        <script src="<?php echo base_url("assets/js/angular-route.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/ngStorage.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular-base64.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/app/app.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/controllers/LawyerController.js'); ?>"></script>


    </head>

    <body ng-app="myApp">

        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" ng-controller="lawyerController"  ng-init="baseUrl = '<?php echo base_url() ?>'">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h1 class="text-center" >Login</h1>
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
                                <span class="pull-right"><a href="<?php echo site_url('lawyer/register') ?>">Register</a></span><span> <a href="<?php echo site_url(''); ?>" class="btn btn-outline btn-xl page-scroll  btn-lg">Go to home page</a></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <a href="<?php echo site_url(); ?>" ><button class="btn " data-dismiss="modal" aria-hidden="true">Cancel</button></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <script src="<?php // echo base_url('assets/js/jquery-1.11.1.min.js');                                                     ?>"></script>

    </body>
</html>
<!--<html>
    <head>
        <title>CodeIgniter : Login Facebook via Oauth 2.0</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="main">
            <div id="login">
                <h2>CodeIgniter : Login Facebook via Oauth 2.0</h2>
<?php echo "<a href='$login_url'><img class='fb' src=" . base_url() . "images/fb.png" . "></a>"; ?>
            </div>
        </div>
    </body>
</html>-->
