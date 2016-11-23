<div class="row col-sm-12"  ng-init="setBaseUrl('<?php echo base_url() ?>')">

    <center> <h2>Cases - Edit</h2></center>

    <div class=" form-horizontal">
        <!--            <h1>{{ edit.caseId}}</h1>
                    <h1>{{ case.category}}</h1>-->
        <div class="form-group">
            <label class="col-sm-3 control-label">Id</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="word" placeholder="Word" value="{{case.id}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Client Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="word" placeholder="Word" value="{{case.client}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="word" placeholder="Word" value="{{case.category}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <select class="form-control" name="selectedStatus" id="singleSelect"  ng-model="case.status" ng-change="changeStatus()">

                    <option value="">---Please select---</option> <!-- not selected / blank option -->
                    <option value="OPENED">OPENED</option> <!-- interpolation -->
                    <option value="CLOSED">CLOSED</option>
                    <option value="UNDER-REVIEW">UNDER-REVIEW</option>
                    <option value="CANCELLED">CANCELLED</option>
                </select>
            </div>

        </div>

        <div class = "form-group">
            <div class = "col-sm-9 col-sm-offset-3">

                <input type = "button" class = "btn btn-primary btn-block" name = "save" value = "Update" ng-click = "editCase()">
            </div>
        </div>




    </div>


</div>