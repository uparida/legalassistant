<?php ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Lawyer Register</title>
        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/angular-load.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/validator.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/ngStorage.min.js'); ?>"></script>
        <script src="<?php echo base_url("assets/js/angular-route.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/angular-base64.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/app/app.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/controllers/LawyerController.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/directives/fileModel.js'); ?>"></script>
        <script>$('.datepicker').datepicker({
                dateFormat: 'dd/mm/YYYY'
            }).datepicker("setDate", new Date());</script>
    </head>
    <body ng-app="myApp">

        <div class="container" ng-controller="lawyerController"  ng-init="setBaseUrl('<?php echo base_url() ?>')">
            <form ng-submit = "registerLawyer()" method="post" enctype="multipart/form-data"  class="form-horizontal"  data-toggle="validator" role="form">

                <!--<form class="form-inline">-->
                <h1 ><center>Lawyer Registeration</center></h1>

                <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="username"  value="prarthana"  ng-model="lawyer.username"/>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="fname" name="password"  value="prarthana"  ng-model="lawyer.password"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="firstName" ng-init="lawyer.firstName = '<?php
                        if (!empty($firstname)) {
                            echo $firstname;
                        } else {
                            echo "";
                        }
                        ?>'"  ng-model="lawyer.firstName" required/>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Middlename</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" ng-init="lawyer.middleName = '<?php
                        if (!empty($middlename)) {
                            echo $middlename;
                        } else {
                            echo "";
                        }
                        ?>'" name="middleName" ng-model="lawyer.middleName"/>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Lastname</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lastname" ng-init="lawyer.lastName = '<?php
                        if (!empty($lastname)) {
                            echo $lastname;
                        } else {
                            echo "";
                        }
                        ?>'" name="lastName"   ng-model="lawyer.lastName" required/>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" name="address" ng-init="lawyer.address = '<?php
                        if (!empty($address)) {
                            echo $address['name'];
                        } else {
                            echo "";
                        }
                        ?>'"  ng-model="lawyer.address" required/>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Contact</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="phone no" value="234234" name="contact"   ng-model="lawyer.contact" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="address" name="email"   ng-init="lawyer.email = '<?php
                        if (!empty($email)) {
                            echo $email;
                        } else {
                            echo "";
                        }
                        ?>'"  ng-model="lawyer.email" data-error="Invalid email address" required/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">DOB</label>
                    <div class="input-group date" data-provide="datepicker" name="dob" ng-model="lawyer.dob">

                        <div class="col-sm-9">
                            <input type="text" class="form-control " pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" >
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
<!--<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>-->
                            </div>

                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Rate</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="address" name="rate" value="123"  ng-model="lawyer.rate"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" name="rate" value="123"  ng-model="lawyer.description"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label><input type="radio" ng-model="lawyer.gender" name="gender" value="Male" ng-init="lawyer.gender = '<?php
                                if (!empty($gender) && $gender == "male") {
                                    echo "Male";
                                } else {
                                    echo "";
                                }
                                ?>'" required>Male</label>
                        </div>
                        <div class="radio">
                            <label ><input type="radio" ng-model="lawyer.gender" name="gender" value="Female" ng-init="lawyer.gender = '<?php
                                if (!empty($gender) && $gender == "female") {
                                    echo "Female";
                                } else {
                                    echo "";
                                }
                                ?>'" required >Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-3 control-label">Image</label>

                    <div class="col-sm-9">
                        <input type="file" name="userfile" size="20"  file-data="fileData" file-model="myFile" />

                        <img src = "<?php
                        if (!empty($image)) {
                            print_r($image['data']['url']);
                        } else {
                            ?>
                                 {{fileData}}
                             <?php }
                             ?>" height = "90" ng-init="lawyer.imageLink = '<?php
                             if (!empty($image)) {
                                 echo ($image['data']['url']);
                             } else {
                                 echo "";
                             }
                             ?>'"/>
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-sm-3 control-label">Category</label>

                    <div class="col-sm-9">
                        <div ng-repeat="cat in categories">
                            <input type="checkbox" name="chk1" id="item4"  ng-model="cat.selected"
                                   ng-true-value="true" ng-false-value="false" >{{cat.name}}
                        </div>
                    </div>
                </div>
                <!--<a href = "account.php"> -->
                <div class = "form-group">
                    <div class = "col-sm-9 col-sm-offset-3">


<!--                        <input type = "button" class = "btn btn-primary btn-block" name = "save" value = "Register" ng-click = "registerLawyer()">-->
                        <button type="submit" class = "btn btn-primary btn-block" name = "save"  >Register</button>
                        <!--<button class="btn save-cat" type="submit" ng--click="registerLawyer()">Save</button>-->

                    </div>
                </div>
                <!--</a> -->




                <!--<button type = "submit" class = "btn btn-primary" >
                <input type = "submit" name = "submit" value = "save"/> -->

            </form>
        </div>
        <!--$id = $_GET['id'];
        //echo "<strong>" . $id. "</strong>";-->




    </body>
</html>
