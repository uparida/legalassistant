/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app.config(function ($routeProvider) {
    $routeProvider

            .when("/", {
                templateUrl: "dashboard-content"

            })
            .when("/cases", {
                templateUrl: "dashboard-cases"
            })

            .when("/cases-edit/:caseId", {
                templateUrl: "dashboard-cases-edit",
                controller: "editCaseController",
                controllerAs: "edit"
            })
            .when("/cases-view/:caseId", {
                templateUrl: "dashboard-cases-view",
                controller: "viewCaseController",
                controllerAs: "view"
            })

            .when("/search", {
                templateUrl: "dashboard-search"
            })
            .when("/profile", {
                templateUrl: "dashboard-profile"
            })
            .when("/edit-profile", {
                templateUrl: "dashboard-profile-edit"
            })

            .when("/edit-account", {
                templateUrl: "dashboard-account-edit"
            })

            .when("/logout", {
                templateUrl: "logout"
            })

            .when("/dashboard", {
                templateUrl: "dashboard-content"
            })


});