<div class="container" ng-init="setBaseUrl('<?php echo base_url() ?>')">

    <div class="alert alert-danger" id="alert_danger4"></div>
    <div class="alert alert-success" id="alert_success4"></div>
    <!--    <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="<?php echo base_url("/uploads/") ?>{{profile.image}}" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>
                                <strong>   {{profile.username}} </strong> - {{profile.firstname}}{{profile.middlename}}{{profile.lastname}}</h4>
                            <small><cite title="San Francisco, USA"> {{profile.address}} <i class="glyphicon glyphicon-map-marker">
                                    </i></cite></small>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i> {{profile.email}}
                                <br />

                                <i class="glyphicon glyphicon-gift"></i> {{profile.dob}}</p>
                             Split button
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    <div class="row">
        <center>
            <h1> Edit Profile </h1>
        </center>

        <?php // echo form_open_multipart('lawyer/profile/edit', array('class' => "form-horizontal", 'role' => "form")); ?>
        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Firstname </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="site_name" ng-init="lawyer.firstName = profile.firstname" value="{{profile.firstname}}" ng-model="lawyer.firstName">
                </div>

            </div>
            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Middlename </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="site_name" ng-init="lawyer.middleName = profile.middlename" value="{{profile.middlename}}" ng-model="lawyer.middleName">
                </div>

            </div>
            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Lastname </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="site_name" ng-init="lawyer.lastName = profile.lastname" value="{{profile.lastname}}" ng-model="lawyer.lastName">
                </div>

            </div>
            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Address </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="site_name" ng-init="lawyer.address = profile.address" value="{{profile.address}}" ng-model="lawyer.address">
                </div>

            </div>
            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Contact </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="site_name" ng-init="lawyer.contact = profile.contact" value="{{profile.contact}}" ng-model="lawyer.contact">
                </div>

            </div>
            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">DOB </label>
                <div class="col-sm-8">
                    <div class="input-group date" data-provide="datepicker">

                        <input type="text" class="form-control" ng-init="lawyer.dob = profile.dob" value="{{profile.dob}}" ng-model="lawyer.dob">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Rate </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="site_name" ng-init="lawyer.rate = profile.rate" ng-model="lawyer.rate" value="{{lawyer.rate}}">
                </div>

            </div>

            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Description </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="site_name" ng-init="lawyer.description = profile.description" ng-model="lawyer.description" value="{{profile.description}}">
                </div>

            </div>
            <div class="form-group">
                <label for="cost-exclude" class="col-sm-2 control-label" title="Title of category">Gender </label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label><input type="radio"  ng-model="lawyer.gender" ng-init="lawyer.gender = profile.gender" name="gender" value="Male" >Male</label>
                    </div>
                    <div class="radio">
                        <label ><input type="radio"   ng-model="lawyer.gender" ng-init="lawyer.gender = profile.gender" name="gender" value="Female"  >Female</label>
                    </div>
                </div>

            </div>
            <!--            <div class="form-group">

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
            ?>" height = "90" />
                            </div>
                        </div>-->

            <button class="btn btn-info btn-sm col-sm-2" type="submit" name="submit" value="submit" ng-click="updateProfile()" > <span class="fa fa-pencil-square-o"> </span> Save </button>
        </form>
        <?php // form_close(); ?>
    </div>
    <script type="text/javascript">

        $("#alert_danger4").hide();
        $("#alert_success4").hide();
    </script>
</div>
