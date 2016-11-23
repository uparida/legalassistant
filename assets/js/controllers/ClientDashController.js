/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('clientDashController',
        function ($scope, $http, $localStorage, angularLoad) {
            $scope.baseUrl = "";
            $scope.user = [];
            $scope.cases = [];
            $scope.profile = [];
            $scope.lawyerCategories = [];
            $scope.setBaseUrl = function (url) {
                console.log("tests-client-dash");
                $scope.baseUrl = url;
                $scope.getSession();
                $scope.getCasesByClient();

                $scope.getProfile();


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

            $scope.getProfile = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/client/profile').
                        success(function (data) {
                            console.log('profile');
                            $scope.profile = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
//                            console.log(data);
                        });

            };

            $scope.getCasesByClient = function () {


                $http.get(getBaseUrl() + '/client/cases').
                        success(function (data) {
                            console.log("client-cases");
                            $scope.cases = data;
//                            console.log(data);
                        });

            };

        });
