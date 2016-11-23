/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('viewCaseController',
        function ($scope, $http, $localStorage, angularLoad, $routeParams) {
            $scope.baseUrl = "";
            $scope.case = [];
            $scope.selectedCategory;
            $scope.selectedStatus;
            $scope.categories = [];
            console.log("sdfsdfds");
            var self = this;
            self.caseId = $routeParams.caseId;
            console.log(self.caseId);
            $scope.setBaseUrl = function (url) {
                console.log("test");
                $scope.baseUrl = url;
                $scope.getCase();
                $scope.getCategories();
            }
            function getBaseUrl() {
                return $scope.baseUrl + "index.php";

            }
            $scope.getCase = function () {

                $http.get(getBaseUrl() + '/cases/get', {params: {"caseId": self.caseId}}).
                        success(function (data) {
                            $scope.case = data;
                            console.log("get case");
                            console.log(data);
                        });

            };

            $scope.getCategories = function () {
                console.log('hyyyy');
                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/categories').
                        success(function (data) {
                            $scope.categories = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
                            console.log(data);
                        });

            };

        });
