/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('casesController',
        function ($scope, $http, $localStorage, angularLoad) {
            $scope.baseUrl = "";
            $scope.selectedCategory;
            $scope.selectedCase;
            $scope.cases = [];
            $scope.searchCases = [];
            $scope.categories = [];
            $scope.setBaseUrl = function (url) {
                console.log("test");
                $scope.baseUrl = url;
                $scope.getCases();
                $scope.getCategories();
            }
            function getBaseUrl() {
                return $scope.baseUrl + "index.php";

            }
            $scope.getCases = function () {


                $http.get(getBaseUrl() + '/cases').
                        success(function (data) {
                            $scope.cases = data;
//                            console.log(data);
                        });

            };

            $scope.getSearchCases = function () {

                $http.get(getBaseUrl() + '/cases/search', {params: {"selectedCategory": $scope.selectedCategory.name}}).
                        success(function (data) {
                            $scope.searchCases = data;
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

//            $scope.getCases();


        });
