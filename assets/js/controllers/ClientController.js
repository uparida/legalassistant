/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('clientDetailController',
        function ($scope, $http, $localStorage, angularLoad) {

            $scope.baseUrl = "";
//            $scope.selectedCategory = {"id": "1", "name": "Divorce"};

            $scope.login = {username: '', password: ''};
            $scope.selectedCategory;
            $scope.categories = [];
            $scope.lawyerList = [];
            $scope.answer = [];
            $scope.description = [];
            $scope.questions = [];
            $scope.selectedLawyer = {username: ""};
            $scope.email;
            $scope.firstName = "John";
            $scope.lastName = "Doe";
            $scope.names = ["Emil", "Tobias", "Linus"];
            $scope.questionsList = true;
            $scope.questionAnswer = [];
            $scope.va = {params: {"firstname": 'rajya', "middlename": 'laxmi', "lastname": 'maharjan', "username": 'rajee'}};
            $scope.setBaseUrl = function (url) {
                console.log("test");
                $scope.baseUrl = url;

                $scope.getCategories()
            }
            function getBaseUrl() {
// return "http://localhost/legalassistance/" + "index.php";
                return $scope.baseUrl + "index.php";
//                return $scope.baseUrl;
            }
            $scope.getCategories = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/categories').
                        success(function (data) {
                            $scope.categories = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
//                            console.log(data);
                        });

            };
            $scope.openModel = function (lawyer) {
                $scope.selectedLawyer = lawyer;
//                console.log($scope.selectedLawyer);
                $("#myModal").modal("show");
            }
            $scope.getQuestionnaire = function ($category) {
                $scope.selectedCategories = $category
                console.log($category);
                $http.get(getBaseUrl() + '/questionnaire', {params: {"category": $category}}).
                        success(function (data) {
//                            console.log("questionnaire");
                            $scope.questionnaire = data;
                            $localStorage.questionnaire = data;
//                            console.table($localStorage.questionnaire);

                            $scope.questionsList = false;
//                            $.debounce(2250, resizeJquerySteps());
                            //window.location.href = "/client/questionnaire2";
                        });
            }
            $scope.submitAnswers = function () {
                console.log("submit answers");

//                console.log($scope.answer);
//                console.log($scope.selectedCategories);
//                console.log($scope.email);
//                console.table($scope.questionnaire);
                $scope.getLawyerList();


//                $http.post('/submitAnswers', {questionnaire: localStorage.questionnaire,
//                    email: localStorage.email, answer: localStorage.answers})
//                        .success(function (data, status, headers, config) {
//                            console.log('sucess');
//
//                            $scope.questionAnswer = data;
//                            localStorage.questionAnswer = data;
//
//                            console.table($scope.questionAnswer);
//                            console.log($scope.questionAnswer);
//                            $scope.getLawyerList();
//
//                        })
//                        .error(function (data, status, header, config) {
//                            console.log('error');
//                            console.log(data);
//                        });
            }
            $scope.getLawyerList = function () {
                console.log("lawyer listsss:");
                $http.get(getBaseUrl() + '/lawyer/list', {params: {category: $scope.selectedCategories}}).
                        success(function (data) {
//                            $scope.lawyerList = data;

//                            $localStorage.lawyerList = data;

                            $scope.lawyerList = data;
//                            console.table(data);
//                            $scope.getStorage();
//                            window.location.href = "/lawyerList";
//                            window.location.href = "/lawyerList";
                        });

            };
            $scope.getStorage = function () {
                console.log("storage list:");
                $scope.lawyerList = $localStorage.lawyerList;
                console.table($localStorage.lawyerList);
//                console.log(localStorage.questionAnswer);
            }
            $scope.contact = function () {
                console.log("insert:");
                console.log($scope.answer);
//                console.log($scope.answer);
                console.log($scope.email);
                console.log($scope.selectedCategories);
                console.log($scope.questionnaire);
                $lawyerIdList = getSelectedLawyerList()
                console.log("list of lawyer");
                console.log($lawyerIdList);

                $http.post(getBaseUrl() + '/lawyer/contact', {lawyerIdList: $lawyerIdList,
                    client: $scope.email,
                    questionnaire: $scope.questionnaire,
                    answer: $scope.answer,
                    category: $scope.selectedCategories})
                        .success(function (data, status, headers, config) {
                            alert('Please check your email for password');
                            window.location.href = getBaseUrl() + "/dashboard-client";

                        })
                        .error(function (data, status, header, config) {
                            console.log('error');

                        });
            }

//            $scope.getCategories();
            $scope.loginClient = function () {
                console.log('here');
                $http.post(getBaseUrl() + '/login-client', $scope.login)
                        .success(function (data, status, headers, config) {
                            console.log('sucess');
                            console.log(data);
//                            alert('Sucessfully created !! Go to Home');

                            window.location.href = getBaseUrl() + "/dashboard-client";
                            // They clicked Yes

                        })
                        .error(function (data, status, header, config) {
                            console.log('error');
                            alert('Incorrect username or password ');
//                            console.log(data);
                        });

            };

            function getSelectedLawyerList() {
                var selectedIds = [];
                $.each($scope.lawyerList, function (ind, val) {
                    if (val.selected) {
                        console.log(val);
                        selectedIds.push(val.id);
                    }
                });
                return selectedIds;
            }
        });
