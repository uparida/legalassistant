<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

        <link rel="stylesheet" href="<?php // echo base_url('assets/css/form-elements.css');                                                                                                                                                                                                                                           ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.steps.css'); ?>">
        <link href="<?php // echo base_url('/assets/site/css/new-age.min.css')                                       ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.ba-throttle-debounce.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php // echo base_url('assets/js/validation.js');                                   ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.backstretch.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/retina-1.1.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular-load.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/ngStorage.min.js'); ?>"></script>
        <title>Legal Assistance</title>
        <script src="<?php echo base_url('assets/js/angular-base64.js'); ?>"></script>
        <script src="<?php echo base_url("assets/js/angular-route.js") ?>" type="text/javascript"></script>
    <!--    <script src=" https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.11/ngStorage.min.js"></script>-->
        <script src="<?php echo base_url('assets/js/app/app.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/controllers/ClientController.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.steps.min.js'); ?>"></script>
        <!--<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">-->

        <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->
        <style>
            .check
            {
                opacity:0.5;
                color:#996;

            }
            .fix-height {
                width: 150px;
                height: 150px;
                overflow: hidden;
                object-fit: cover;
            }
            .black{
                color: black;
            }
            body{
                background: url(), #7b4397;
                background: url(), -webkit-linear-gradient(to left, #484848, #2d2d2d);
                background: url(), linear-gradient(to left,#484848, #2d2d2d);
            }
        </style>
    </head>
    <body   ng-app="myApp"  >

        <nav id="mainNav" class="navbar navbar-default" >
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" style="color: #ff9000; text-shadow: 1px 1px #ac6a15; font-size: 25px" href="<?php echo base_url('') ?>"><strong>Legal Assistance</a> </strong>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a class="page-scroll" href="<?php echo site_url('about-us') ?>">About us</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo site_url('') ?>">Home</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="header-content">
                            <div class="header-content-inner">

                                <!--        <h2>Lawyer Assistance</h2>-->
                                <header>
                                    <div class="container">
                                        <div class="row">

                                            <h2>Questionnaire Steps</h2>
                                            <div id="client-ctrl"  ng-controller="clientDetailController" ng-init="setBaseUrl('<?php echo base_url() ?>')">

<!--            First Name: <input type="text" ng-model="firstName"><br>
 Last Name: <input type="text" ng-model="lastName"><br>
 <br>
 Full Name: {{firstName + " " + lastName}}-->


                                                <div id="client-questionaire" wizard
                                                     step-changed="resizeJquerySteps"
                                                     step-changing="stepChanging" body-tag="section" header-tag="h3"  >
                                                    <h3>Select Case Category</h3>
                                                    <section>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <select ng-model="selectedCategory"
                                                                        class="form-control input-small" ng-options="o.name for o in categories track by o.id" style="width:auto;">

                                                                </select>
                                    <!--                            <pre>
                                                                {{selectedCategory| json}}
                                                                </pre>-->
                                                            </div>
                                                        </div>
                                                    </section>

                                                    <h3>Questionaires</h3>
                                                    <section>
                                                        <div class="top-content" >

                                                            <form role="form" action="" method="post" class="registration-form"  >
                                                                <input type="email" id="clietEmail" name="email"
                                                                       placeholder="Email" class="form-first-name form-control" ng-model="email" />
                                                                <fieldset ng-repeat="x in questionnaire track by $index">
                                                                    <!--                               -->
                                                                    <div class="form-top">
                                                                        <div class="form-top-left">
                                                                            <h3 class="black">Question
                                                                                {{$index + 1}} / 3</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-bottom">
                                                                        <p  class="black">{{x.question}}</p>
                                                                        <div class="form-group">
                                                                            <label class="sr-only" for="form-first-name">First name</label>
                                                                            <textarea name="form-about-yourself"
                                                                                      placeholder="About yourself..."
                                                                                      class="form-about-yourself form-control"
                                                                                      id="form-about-yourself" ng-model="answer[$index]">
                                                                            </textarea>
                                                                        </div>
                                                                        <!--<button type="button" class="btn btn-next">Next</button>-->
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                            <!--<button type="button" class="btn btn-next" ng-click="submitAnswers()">Next</button>-->
                                                        </div>

                                                    </section>
                                                    <h3>Select lawyers</h3>
                                                    <section>

                                                        <div ng-repeat="x2 in lawyerList track by $index"  >
                                                            <form method="get">
                                                                <div class="form-group" >
                                                                    <div class="col-md-3 lawyer-profile" style=" border: 1px solid #d6d6d5;margin:40px; padding : 10px">
                                                                        <label class="btn btn-primary">
                                                                            <img src="<?php echo base_url("/uploads/") ?>{{x2.image}}"  class="img-thumbnail img-check fix-height ">
                                                                            <input type="checkbox" name="chk1" id="item4"  class="hidden"   ng-model="x2.selected"
                                                                                   ng-true-value="true" ng-false-value="false">
                                                                            <h4>

                                                                            </h4>
                                                                        </label>
                                                                        <h4  class="black">
                                                                            {{x2.firstname}} {{x2.middlename}}  {{x2.lastname}}
                                                                        </h4>




                                                                        <br>
                                                                        <br>
                                                                        <p  class="black">Rate : $ {{x2.rate}} per hour</p>
                                                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" ng-click="openModel(x2)">View Profile</button>
                                                                        <p></p>

                                                                    </div>


                                                                </div>
                                                            </form>
                                                        </div>

                                                    </section>

                                                </div>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Profile</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url("/uploads/") ?>{{selectedLawyer.image}}" alt="" class="img-rounded img-responsive" />
                                                                <h4>      Name :  {{selectedLawyer.firstname}} {{selectedLawyer.middlename}} {{selectedLawyer.lastname}} </h4> <hr>
                                                                <h4>      Username :    {{selectedLawyer.username}}</h4><hr>
                                                                <h4>        Address :
                                                                    {{selectedLawyer.address}}</h4><hr>
                                                                <h4>        Email :
                                                                    {{selectedLawyer.email}}</h4><hr>
                                                                <h4>        Contact :
                                                                    {{selectedLawyer.contact}}</h4><hr>
                                                                <h4>        Gender :
                                                                    {{selectedLawyer.gender}}</h4><hr>
                                                                <h4>        Speciality :
                                                                    {{selectedLawyer.specialities}} </h4><hr>
                                                                <h4>        Total Cases Completed :
                                                                    {{selectedLawyer.case_completed}} </h4><hr>
                                                                <h4>        Description :
                                                                    {{selectedLawyer.description}} </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>


    </body>

    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
    <script>$(document).ready(function (e) {
                                                                            $("body").on('click', '.img-check', function () {
                                                                                $(this).toggleClass("check");
                                                                            });
                                                                        });</script>
</html>

<!--<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

        <link rel="stylesheet" href="<?php // echo base_url('assets/css/form-elements.css');                                                                                                                                                                                                                                           ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.steps.css'); ?>">
        <link href="<?php // echo base_url('/assets/site/css/new-age.min.css')                                       ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.ba-throttle-debounce.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php // echo base_url('assets/js/validation.js');                                   ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.backstretch.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/retina-1.1.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular-load.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/ngStorage.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/angular-base64.js'); ?>"></script>
        <script src="<?php echo base_url("assets/js/angular-route.js") ?>" type="text/javascript"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.11/ngStorage.min.js"></script>
        <script src="<?php echo base_url('assets/js/app/app.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/controllers/ClientController.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.steps.min.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <style>
            .check
            {
                opacity:0.5;
                color:#996;

            }
            .fix-height {
                width: 150px;
                height: 150px;
                overflow: hidden;
                object-fit: cover;
            }
            .black{
                color: black;
            }
        </style>
    </head>
    <body   ng-app="myApp"  >
        <nav id="mainNav" class="navbar navbar-default">
            <div class="container">
                 Brand and toggle get grouped for better mobile display
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" style="color: #ff9000; text-shadow: 1px 1px #ac6a15; font-size: 25px" href="<?php echo base_url('') ?>"><strong>Legal Assistance</a> </strong>

                </div>

                 Collect the nav links, forms, and other content for toggling
                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a class="page-scroll" href="<?php echo site_url('about-us') ?>">About us</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo site_url('') ?>">Home</a>
                        </li>

                    </ul>
                </div>
                 /.navbar-collapse
            </div>
             /.container-fluid
        </nav>

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="header-content">
                            <div class="header-content-inner">

                                        <h2>Lawyer Assistance</h2>
                                <header>
                                    <div class="container">
                                        <div class="row">

                                            <h2>Questionnaire Steps</h2>
                                            <div id="client-ctrl"  ng-controller="clientDetailController" ng-init="setBaseUrl('<?php echo base_url() ?>')">

            First Name: <input type="text" ng-model="firstName"><br>
 Last Name: <input type="text" ng-model="lastName"><br>
 <br>
 Full Name: {{firstName + " " + lastName}}


                                                <div id="client-questionaire" wizard
                                                     step-changed="resizeJquerySteps"
                                                     step-changing="stepChanging" body-tag="section" header-tag="h3"  >
                                                    <h3>Select Case Category</h3>
                                                    <section>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <select ng-model="selectedCategory"
                                                                        class="form-control input-small" ng-options="o.name for o in categories track by o.id" style="width:auto;">

                                                                </select>
                                                                <pre>
                                                                {{selectedCategory| json}}
                                                                </pre>
                                                            </div>
                                                        </div>
                                                    </section>

                                                    <h3>Questionaires</h3>
                                                    <section>
                                                        <div class="top-content" >

                                                            <form role="form" action="" method="post" class="registration-form"  >
                                                                <input type="email" id="clietEmail" name="email"
                                                                       placeholder="Email" class="form-first-name form-control" ng-model="email" />
                                                                <fieldset ng-repeat="x in questionnaire track by $index">

                                                                    <div class="form-top">
                                                                        <div class="form-top-left">
                                                                            <h3 class="black">Question
                                                                                {{$index + 1}} / 3</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-bottom">
                                                                        <p  class="black">{{x.question}}</p>
                                                                        <div class="form-group">
                                                                            <label class="sr-only" for="form-first-name">First name</label>
                                                                            <textarea name="form-about-yourself"
                                                                                      placeholder="About yourself..."
                                                                                      class="form-about-yourself form-control"
                                                                                      id="form-about-yourself" ng-model="answer[$index]">
                                                                            </textarea>
                                                                        </div>
                                                                        <button type="button" class="btn btn-next">Next</button>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                            <button type="button" class="btn btn-next" ng-click="submitAnswers()">Next</button>
                                                        </div>

                                                    </section>
                                                    <h3>Select lawyers</h3>
                                                    <section>

                                                        <div ng-repeat="x2 in lawyerList track by $index"  >
                                                            <form method="get">
                                                                <div class="form-group" >
                                                                    <div class="col-md-3 lawyer-profile" style=" border: 1px solid #d6d6d5;margin:40px; padding : 10px">
                                                                        <label class="btn btn-primary">
                                                                            <img src="<?php echo base_url("/uploads/") ?>{{x2.image}}"  class="img-thumbnail img-check fix-height ">
                                                                            <input type="checkbox" name="chk1" id="item4"  class="hidden"   ng-model="x2.selected"
                                                                                   ng-true-value="true" ng-false-value="false">
                                                                            <h4>

                                                                            </h4>
                                                                        </label>
                                                                        <h4  class="black">
                                                                            {{x2.firstname}} {{x2.middlename}}  {{x2.lastname}}
                                                                        </h4>




                                                                        <br>
                                                                        <br>
                                                                        <p  class="black">Rate : $ {{x2.rate}} per hour</p>
                                                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" ng-click="openModel(x2)">View Profile</button>
                                                                        <p></p>

                                                                    </div>


                                                                </div>
                                                            </form>
                                                        </div>

                                                    </section>

                                                </div>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">

                                                         Modal content
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Profile</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url("/uploads/") ?>{{selectedLawyer.image}}" alt="" class="img-rounded img-responsive" />
                                                                <h4>      Name :  {{selectedLawyer.firstname}} {{selectedLawyer.middlename}} {{selectedLawyer.lastname}} </h4> <hr>
                                                                <h4>      Username :    {{selectedLawyer.username}}</h4><hr>
                                                                <h4>        Address :
                                                                    {{selectedLawyer.address}}</h4><hr>
                                                                <h4>        Email :
                                                                    {{selectedLawyer.email}}</h4><hr>
                                                                <h4>        Contact :
                                                                    {{selectedLawyer.contact}}</h4><hr>
                                                                <h4>        Gender :
                                                                    {{selectedLawyer.gender}}</h4><hr>
                                                                <h4>        Speciality :
                                                                    {{selectedLawyer.specialities}} </h4><hr>
                                                                <h4>        Total Cases Completed :
                                                                    {{selectedLawyer.case_completed}} </h4><hr>
                                                                <h4>        Description :
                                                                    {{selectedLawyer.description}} </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </header>



                                </body>

                                <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
                                <script>$(document).ready(function (e) {
                                                                            $("body").on('click', '.img-check', function () {
                                                                                $(this).toggleClass("check");
                                                                            });
                                                                        });</script>



                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </header>
        <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
        <script>$(document).ready(function (e) {
                                                                            $("body").on('click', '.img-check', function () {
                                                                                $(this).toggleClass("check");
                                                                            });
                                                                        });</script>


         jQuery



         Theme JavaScript
        <script src="js/new-age.min.js"></script>

    </body>

</html>-->
