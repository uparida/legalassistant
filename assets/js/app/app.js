var app = angular.module('myApp', ["ngStorage", 'angularLoad', 'base64', 'ngRoute']);


app.run(['$location', '$rootScope', function ($location, $rootScope) {
        console.log(jQuery('.registration-form .btn-next').length);

    }]);


app.directive('wizard', [function () {
        return {
            restrict: 'EA',
            scope: {
                ngModel: '=',
                stepChanging: '=',
                stepChanged: '='
            },
            compile: function (element, attr) {
                element.steps({
                    bodyTag: attr.bodyTag,
                    headerTag: attr.headerTag,
                    onStepChanging: window[attr.stepChanging],
                    onFinishing: window[attr.stepChanging],
                    transitionEffect: "slideLeft",
                    autoFocus: true,
                    stepChanged: window[attr.stepChanged],
                    onInit: function (event, currentIndex) {
                        if (currentIndex == 0)
                            $('.wizard .content').css("height", '25em');
                    }
                });

                return {
                    //pre-link
                    pre: function () {},
                    //post-link
                    post: function (scope, element) {
                        element.on('stepChanging', scope.stepChanging);
                    }
                }
            }
        };
    }]);
