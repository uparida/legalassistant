
<div class="row"  ng-controller="casesController" ng-init="setBaseUrl('<?php echo base_url() ?>')">

    <div class="form-group ">
        <fieldset>
            <legend> Search </legend>
            <!--            <div class="col-sm-2">-->


            <div class="col-sm-2">


<!--                <select class="form-control selectpicker col-sm-1" name="per_page" id="per_page">
                    <option value="20" <?php if (isset($per_page) && $per_page == '20') echo 'selected="selected"'; ?>> 20 </option>
                    <option value="30" <?php if (isset($per_page) && $per_page == '30') echo 'selected="selected"'; ?>> 30 </option>
                    <option value="50" <?php if (isset($per_page) && $per_page == '50') echo 'selected="selected"'; ?>> 50 </option>
                    <option value="100" <?php if (isset($per_page) && $per_page == '100') echo 'selected="selected"'; ?>> 100 </option>
                    <option value="1000" <?php if (isset($per_page) && $per_page == '') echo 'selected="selected"'; ?>> All </option>
                </select>-->
                <select ng-model="selectedCategory" class="form-control selectpicker col-sm-1" ng-options="o.name for o in categories track by o.id" style="width:auto;" name="category_name" id="category_name" ng-change="getSearchCases()">

                </select>
            </div>
        </fieldset>
    </div>
    <div class="col-sm-12 bg">
        <center> <h2>Cases</h2></center>

        <table class="table table-hover">
            <thead style="background-color: #a6dcff">
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Questionnaire</th>
                    <th>Edit/View</th>
                </tr>
            </thead>
            <tbody>

                <tr  ng-repeat="x in searchCases track by $index " ng-class='{green : x.status == "OPENED",red : x.status == "CANCELLED",grey : x.status == "CLOSED",yellow : x.status == "UNDER-REVIEW"}'>

                    <td>{{x.id}} </td>
                    <td>{{x.category}} </td>
                    <td> {{x.client}} </td>
                    <td >
                        <!--{{x.answers}}-->
                        <div ng-repeat="innerItem in x.answers| limitTo:1">
                            Question :  {{innerItem.question}}<br>
                            Answers :  {{innerItem.answer}}

                        </div>
                    </td>
                    <td> {{x.status}} </td>
                    <td class="col-sm-2"><a href="#cases-edit/{{x.id}}"><button class="btn btn-warning" type="submit" ng-model="selectedCase" value="{{x.id}}">Edit</button></a> <a href="#cases-view/{{x.id}}"><button class="btn btn-warning" type="submit" ng-model="selectedCase" value="{{x.id}}">View</button></a></td>
                </tr>

            </tbody>
        </table>
    </div>
<!--    <script>
                $('#category_name').change(function () {
                    var category_name = $("#category_name").val();
                    url = '<?php echo base_url(); ?>index.php/dashboard-cases-search/' + category_name;


                    location = url.replace("&", "");
                    return false;
                });
    </script>-->
</div>
