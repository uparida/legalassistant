var $scope = undefined;
$(function () {
    $scope = angular.element("#client-ctrl").scope();
    function adjustIframeHeight() {
        var $body = $('body'),
                $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }


});
function resizeJquerySteps() {
    $('.wizard .content').animate({height: $('.body.current').outerHeight()}, "slow");
}
var stepChanging = function (event, currentIndex, newIndex) {
    console.log(currentIndex);

    switch (currentIndex) {
        case 0:
            $scope.getQuestionnaire($scope.selectedCategory.name);
            break;
        case 1:
            var value = $('#clietEmail').val();

            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            $scope.validEmail = pattern.test(value);
            console.log("valid : " + $scope.validEmail);
            if ($scope.validEmail) {
                $scope.submitAnswers();
                setTimeout(function () {
                    var maxHeight = 0;
                    $(".lawyer-profile").each(function () {
                        maxHeight = $(this).outerHeight() > maxHeight ? $(this).outerHeight() : maxHeight;
                    });
                    console.log(maxHeight);
                    $('<style>.lawyer-profile { min-height:  ' + (maxHeight + 1) + 'px ; }</style>').appendTo('body');

                }, 1000);
            }

            break;
        case 2:


            if ($scope.validEmail) {
                $scope.contact();
            } else {

            }




            break;
    }

    setTimeout(function () {
        resizeJquerySteps();
    }, 800);
    console.log(event);

    return true;
}
$(window).resize($.debounce(250, resizeJquerySteps));
//
//$("#client-questionaire").steps({
//    headerTag: "h3",
//    bodyTag: "section",
//    transitionEffect: "slideLeft",
//    autoFocus: true,
//    /* Events */
//    onStepChanging: function (event, currentIndex, newIndex) {
//        switch (currentIndex) {
//            case 0:
//                $scope.getQuestionnaire($scope.selectedCategory.name);
//                break;
//        }
//        console.log(event);
//        console.log(currentIndex);
//        return true;
//    },
//});
