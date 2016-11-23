<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo base_url("/uploads/") ?>{{profile.image}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            <strong>   {{profile.username}} </strong> - {{profile.firstname}} {{profile.middlename}} {{profile.lastname}}</h4>
                        <small><cite title="San Francisco, USA"> {{profile.address}} <i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i> {{profile.email}}
                            <br />

                            <i class="glyphicon glyphicon-gift"></i> {{profile.dob}}</p>
                        <!-- Split button -->
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
