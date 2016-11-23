<div class="row col-sm-12"  ng-init="setBaseUrl('<?php echo base_url() ?>')">

    <center> <h2>Cases - View</h2></center>
    <hr>
    <div class=" form-horizontal">

        <div class="form-group">

            <div class="col-sm-3 control-label">
                <strong>  Id</strong>
            </div>
            <div class="col-sm-1  control-label">
                {{case.id}}
            </div>
        </div>
        <hr>
        <div class="form-group">

            <div class="col-sm-3 control-label">
                <strong>Client Email</strong>
            </div>
            <div class="col-sm-1  control-label">
                {{case.client}}
            </div>
        </div>
        <hr>
        <div class="form-group">

            <div class="col-sm-3 control-label">
                <strong>Category</strong>
            </div>
            <div class="col-sm-1  control-label">
                {{case.category}}
            </div>
        </div>
        <hr>
        <div class="form-group">

            <div class="col-sm-3 control-label">
                <strong>Answer</strong>
            </div>
            <div class="col-sm-9">
                <div ng-repeat="innerItem in case.answers">
                    Question :  {{innerItem.question}}<br>
                    Answers :  {{innerItem.answer}}
                    <hr>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">

            <div class="col-sm-3 control-label">
                <strong>Status</strong>
            </div>
            <div class="col-sm-1  control-label">
                {{case.status}}
            </div>
        </div>







    </div>


</div>
















<!--<div class="row col-sm-12"  ng-init="setBaseUrl('<?php echo base_url() ?>')">

    <center> <h2>Cases - View</h2></center>

    <div class=" form-horizontal">
                    <h1>{{ edit.caseId}}</h1>
                    <h1>{{ case.category}}</h1>
        <div class="form-group">
            <label class="col-sm-3 control-label">Id</label>
            <div class="col-sm-3 control-label">

                <strong>  Id</strong>
            </div>
            <div class="col-sm-1  control-label">
                <input type="text" class="form-control" name="word" placeholder="Word" value="{{case.id}}" readonly>
                {{case.id}}
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-3 control-label">Client Email</label>
            <div class="col-sm-9">
               {{case.client}} <input type="text" class="form-control" name="word" placeholder="Word" value="" readonly>
                {{case.client}}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                {{case.category}}

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Answer</label>
            <div class="col-sm-9">

                <div ng-repeat="innerItem in case.answers">
                    Question :  {{innerItem.question}}<br>
                    Answers :  {{innerItem.answer}}
                    <hr>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            {{case.status}}
                        <div class="col-sm-9">
                            <select class="form-control" name="selectedStatus" id="singleSelect" ng-model="case.status" readonly>

                                <option value="">---Please select---</option>  not selected / blank option
                                <option value="OPENED">OPENED</option>  interpolation
                                <option value="CLOSED">CLOSED</option>
                                <option value="UNDER-REVIEW">UNDER-REVIEW</option>
                                <option value="CANCELLED">CANCELLED</option>
                            </select>
                        </div>

        </div>





    </div>


</div>


-->
