
<div class="panel-group" id="accordion" ng-init="setBaseUrl('<?php echo base_url() ?>')">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" > Edit User Name </a> </h4>
        </div>
        <div id="collapseOne" class="panel-collapse ">
            <div class="panel-body">
                <script type="text/javascript">
                    $("#alert_danger3").hide();
                    $("#alert_success3").hide();

                    function change_username() {
                        var username = $("#nunane").val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/dashboard_client_controller/change_username",
                            data: "username=" + username + "&action=submit",
                            success: function (msg) {
                                var msg = msg.trim();
                                if (msg == 'yes') {
                                    $("#alert_success3").show();
                                    $("#alert_success3").html('Username changed successfully');
                                    $("#alert_success3").delay(4000).slideUp('slow', function () {
                                        $("#alert_success3").html('');
                                    });
                                    $("#nunane").val('');
                                    ;
                                } else {
                                    $("#alert_danger3").show();
                                    $("#alert_danger3").html(msg);
                                    $("#alert_danger3").delay(5000).slideUp('slow', function () {
                                        $("#alert_danger3").html('');
                                    });
                                }
                            }
                        });
                    }
                </script>
                <div class="alert alert-danger" id="alert_danger3"></div>
                <div class="alert alert-success" id="alert_success3"></div>
                <form class="form-horizontal" role="form" action="javascript:change_username()">
                    <div class="form-group">
                        <label for="nunane" class="col-sm-2 control-label"> New User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nunane" name="nunane" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" > Edit Password </a> </h4>
        </div>
        <div id="editpass" class="panel-collapse">
            <div class="panel-body">
                <script type="text/javascript">
                    $("#alert_danger2").hide();
                    $("#alert_success2").hide();
                    function change_password() {
                        var opass = $("#old_password").val();
                        var npass = $("#newpassword").val();
                        var cpass = $("#cnewpassword").val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/dashboard_client_controller/change_password",
                            data: "opass=" + opass + "&npass=" + npass + "&cpass=" + cpass + "&action=submit",
                            success: function (msg) {
                                var msg = msg.trim();
                                if (msg == 'yes') {
                                    $("#alert_success2").show();
                                    $("#alert_success2").html('Password changed successfully');
                                    $("#alert_success2").delay(4000).slideUp('slow', function () {
                                        $("#alert_success2").html('');
                                    });
                                    $("#nunane").val('');
                                    ;
                                } else {
                                    $("#alert_danger2").show();
                                    $("#alert_danger2").html(msg);
                                    $("#alert_danger2").delay(5000).slideUp('slow', function () {
                                        $("#alert_danger2").html('');
                                    });
                                }
                            }
                        });
                    }
                </script>
                <div class="alert alert-danger" id="alert_danger2"></div>
                <div class="alert alert-success" id="alert_success2"></div>
                <form class="form-horizontal" role="form" action="javascript:change_password();">
                    <div class="form-group">
                        <label for="cpassword" class="col-sm-2 control-label"> Current Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="old_password" name="old_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newpassword" class="col-sm-2 control-label"> New Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newpassword" name="newpassword" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cnewpassword" class="col-sm-2 control-label">Comfirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="cnewpassword" name="cnewpassword" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--</div>-->
</div>

