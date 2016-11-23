
<?php
if (!empty($message)) {
    echo '<script language="javascript">';
    echo 'alert("Alredy registered!! ")';
    echo '</script>';
}
?>
<?php // if ($this->session->userdata('user_type_id') == 1) {                                  ?>

<center>
    <h2> Client - Dashboard </h2>
</center>
<div class="contain-area main-area">

    <div class="row row-centered">
        <?php
        $quickMenus = [

            ["Cases", "#client-cases", "fa fa-list-ul"],
            ["Profile", "#client-profile", "fa fa-user"],
			 ["Quick Search Lawyer", "client/questionnaire", "fa fa-search"]
                ]
        ?>
        <?php foreach ($quickMenus as $menu): ?>
            <div class="col-sm-4 col-xs-6 col-md-3 col-lg-2 square-box col-centered">
                <center>
                    <a href="<?php echo $menu[1]; ?>">
                        <h4> <?php echo $menu[0]; ?> </h4>
                        <div class="box">
                            <i class="fa <?php echo $menu[2] ?>" aria-hidden="true"></i>
                        </div>
                    </a>
                    <center>
                        </div>
                    <?php endforeach; ?>

                    </div>

                    </div>

                    <?php
//                                }else {
//                                    redirect('agent_dashboard/agent_dashboard', 'location');
//                                }
                    ?>

