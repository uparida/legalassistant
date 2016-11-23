/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('dashController',
        function ($scope, $http, $localStorage, angularLoad, $base64) {
            $scope.baseUrl = "";
            $scope.user = [];
            $scope.fileData = undefined;
            $scope.lawyer = {firstName: '', lastName: '', middleName: '', address: '', contact: '', email: '',
                gender: '', rate: '', description: '', imageName: '', dob: '', imageData: '', imageLink: '', categories: []};
            $scope.categories = [];
            $scope.profile = [];
            $scope.lawyerCategories = [];
            $scope.setBaseUrl = function (url) {
                console.log("tests-dash");
                $scope.baseUrl = url;
                $scope.getSession();
                $scope.getCategories();
                $scope.getProfile();

                $scope.getCategoriesByLawyer();
            }
            function getBaseUrl() {
// return "http://localhost/legalassistance/" + "index.php";
                return $scope.baseUrl + "index.php";
//                return $scope.baseUrl;
            }
            $scope.getSession = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/session').
                        success(function (data) {
                            $scope.user = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
//                            console.log(data);
                        });

            };
            $scope.getCategories = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/categories').
                        success(function (data) {
                            $scope.categories = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
//                            console.log(data);
                        });

            };
            $scope.getProfile = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/lawyer/profile').
                        success(function (data) {
                            console.log('profile');
                            $scope.profile = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
//                            console.log(data);
                        });

            };
            $scope.getCategoriesByLawyer = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/lawyer/category/get').
                        success(function (data) {

                            $scope.lawyerCategories = data;
                            console.log("sames");
                            console.log($scope.lawyerCategories);

                            for (var i = 0, l = $scope.categories.length; i < l; i++) {
                                for (var j = 0, k = $scope.lawyerCategories.length; j < k; j++) {
                                    if ($scope.lawyerCategories[j].category == $scope.categories[i].id) {
                                        console.log("same-lawycat id :" + $scope.lawyerCategories[j].category);
//                                        console.log("same-cat id :" + $scope.categories[i].id);
                                        $scope.categories[i].selected = true;
                                    }
                                }

                            }

//                            angularLoad.loadScript('/assets/js/scripts.js');
                            console.log("lawyer-category");
//                            console.log(data);
                        });

            };
            function getSelectedCategoryList() {
                var selectedIds = [];
                $.each($scope.categories, function (ind, val) {
                    if (val.selected) {
//                        console.log(val);

                        selectedIds.push(val.id);
                    }
                });
                return selectedIds;
            }

            $scope.updateCategory = function () {
                var categoryList = getSelectedCategoryList();
                $http.post(getBaseUrl() + '/lawyer/category/edit', {categories: categoryList})
                        .success(function (data, status, headers, config) {
                            console.log('sucess');
                            console.log(data);
                            $("#alert_success4").show();
                            $("#alert_success4").html('Category changed successfully');
                            $("#alert_success4").delay(4000).slideUp('slow', function () {
                                $("#alert_success4").html('');
                            });
//                            $scope.getCategories();
//
//                            $scope.getCategoriesByLawyer();
                            window.location.href = getBaseUrl() + "/dashboard";
                            // They clicked Yes

                        })
                        .error(function (data, status, header, config) {
                            console.log('error');
                            console.log(data);
                            $("#alert_danger4").show();
                            $("#alert_danger4").html('Error in updating category');
                            $("#alert_danger4").delay(5000).slideUp('slow', function () {
                                $("#alert_danger4").html('');
                            });
                        });
            }
            $scope.updateProfile = function () {
                if ($scope.myFile != '' || !empty($scope.myFile)) {
                    var imageData = $base64.encode($scope.fileData);
                    console.log("my file");
//                    console.log($scope.fileData);

                    $scope.lawyer['imageName'] = $scope.lawyer['firstName'] + ".jpg";
                    $scope.lawyer['imageData'] = $scope.fileData;
                }
                console.log($scope.lawyer);

                $http.post(getBaseUrl() + '/lawyer/profile/edit', $scope.lawyer)
                        .success(function (data, status, headers, config) {
                            console.log('sucess');
//                            console.log(data);
                            $("#alert_success4").show();
                            $("#alert_success4").html('Profile Info changed successfully');
                            $("#alert_success4").delay(4000).slideUp('slow', function () {
                                $("#alert_success4").html('');
                            });
                            $scope.getProfile();
                            // They clicked Yes

                        })
                        .error(function (data, status, header, config) {
                            console.log('error');
//                            console.log(data);
                            $("#alert_danger4").show();
                            $("#alert_danger4").html('Error in updating profile info');
                            $("#alert_danger4").delay(5000).slideUp('slow', function () {
                                $("#alert_danger4").html('');
                            });
                        });
            }

        });
