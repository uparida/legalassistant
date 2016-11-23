/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app.config(function ($routeProvider) {
    $routeProvider

            .when("/", {
                templateUrl: "dashboard-client-content"

            })
            .when("/cases", {
                templateUrl: "dashboard-cases"
            })
            .when("/client-cases", {
                templateUrl: "dashboard-client-cases"
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

            .when("/client-profile", {
                templateUrl: "dashboard-client-profile"
            })

            .when("/client-edit-account", {
                templateUrl: "dashboard-client-account-edit"
            })

            .when("/client-logout", {
                templateUrl: "client-logout"
            })
			

            .when("/client-dashboard", {
                templateUrl: "dashboard-client-content"
            })

});