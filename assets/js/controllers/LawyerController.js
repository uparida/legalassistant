/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.controller('lawyerController',
        function ($scope, $http, $base64) {
            $scope.validEmail = false;
            $scope.baseUrl = "";
            $scope.fileData = undefined;
            $scope.categories = [];

//            $scope.myFile = "";
            $scope.lawyer = {firstName: '', lastName: '', middleName: '', address: '', contact: '', email: '',
                gender: '', username: '', password: '', rate: '', description: '', imageName: '', imageData: '', imageLink: '', dob: '', categories: []};
            $scope.login = {username: '', password: ''};
            console.log("outside");
            $scope.setBaseUrl = function (url) {
                console.log("test");
                $scope.baseUrl = url;
                $scope.getCategories()
            }
            function getBaseUrl() {

                return $scope.baseUrl + "index.php";
//                return $scope.baseUrl;
            }
            $scope.registerLawyer = function () {
//                console.log($scope.myFile.name);
//                console.log($scope.fileData);


                console.log('here');
//                console.log(getSelectedCategoryList());

                $scope.lawyer['categories'] = getSelectedCategoryList();

//                console.log(imageData);
                if ($scope.myFile != '' || !empty($scope.myFile)) {
                    var imageData = $base64.encode($scope.fileData);
                    $scope.lawyer['imageName'] = $scope.lawyer['username'] + ".jpg";
                    $scope.lawyer['imageData'] = $scope.fileData;
                } else {
                    $scope.lawyer['imageName'] = $scope.lawyer['username'] + ".jpg";
                }



//                console.log($scope.lawyer);

                $http.post(getBaseUrl() + '/register', $scope.lawyer)
                        .success(function (data, status, headers, config) {
                            console.log("here goes" + data);
                            //alert('Successfully registered!!');
                            window.location.href = getBaseUrl() + "/dashboard";
                            // They clicked Yes
//                            } else
//                            {
//                                // They clicked no
//                            }
                        })
                        .error(function (data, status, header, config) {
                            console.log('error');
//                            console.log(data);
                            window.confirm('Failed to register because of image upload. Try again !!');
                        });

                return false;

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
            $scope.getCategories = function () {

                console.log(getBaseUrl());
                $http.get(getBaseUrl() + '/categories').
                        success(function (data) {
                            $scope.categories = data;
//                            angularLoad.loadScript('/assets/js/scripts.js');
//                            console.log(data);
                        });

            };
            $scope.loginLawyer = function () {
                console.log('here');
                console.log($scope.lawyer);
                $http.post(getBaseUrl() + '/login', $scope.login)
                        .success(function (data, status, headers, config) {
                            console.log('sucess');
//                            console.log(data);
//                            alert('Sucessfully created !! Go to Home');

                            window.location.href = getBaseUrl() + "/dashboard";
                            // They clicked Yes

                        })
                        .error(function (data, status, header, config) {
                            console.log('error');
                            alert('Incorrect username or password ');
                        });

            };


        });
