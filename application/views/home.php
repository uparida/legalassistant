<?php
include 'header.php';
?>
<?php // echo "<a href='$login_url'><img class='fb' src=" . base_url('') . "/images/fb.png" . "></a>";                            ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="header-content">
                    <div class="header-content-inner">
                        <p>Need a Lawyer? We are here to simplify with your legal works!!</p>
                        <h1>Login as?</h1>
<!--                        <a href="<?php echo site_url('lawyer/login'); ?>" class="btn btn-outline btn-xl page-scroll  btn-lg">Lawyer</a>
                        <a href="<?php echo site_url('client/login'); ?>" class="btn btn-outline btn-xl page-scroll  btn-lg">Client</a>-->

                        <button type="button" class="btn btn-default  btn-lg" id="lawyerBtn" style="background-color:#ffc000; color:white;">Lawyer</button>
                        <button type="button" class="btn btn-default  btn-lg" id="clientBtn" style="background-color:#ffc000; color:white;">Client</button>
                        <p>

                        </p>
                        <div class="row">
                            <div class="col-sm-7">
                                <a href="<?php echo site_url('client/questionnaire'); ?>" class="btn btn-outline btn-xl page-scroll  btn-lg">Quick Search Lawyer</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-5">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="<?php echo base_url('assets/images/law1.jpg') ?>" class="img-responsive" alt="">
                            </div>
                            <div class="button">
                                <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</header>

<?php
include 'footer.php';
?>
