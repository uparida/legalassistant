/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

app.directive('fileModel1', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {

                var model = $parse(attrs.fileModel1);
                var fileDataModel = $parse(attrs.fileData1);

                var modelSetter = model.assign;
                var fileDataModelSetter = fileDataModel.assign;

                element.bind('change', function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
                element.bind("change", function (changeEvent) {
                    console.log(changeEvent);
                    var reader = new FileReader();
                    reader.onload = function (loadEvent) {
                        scope.$apply(function () {
                            fileDataModelSetter(scope, loadEvent.target.result);
                        });
                    }
                    if (changeEvent.target.files.length > 0) {
                        reader.readAsDataURL(changeEvent.target.files[0]);
                    }

                });
            }
        };
    }]);
