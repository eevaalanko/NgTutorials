angular.module('myApp').controller('ModalInstanceCtrl', function ($scope, $http, $uibModalInstance, current, user) {
    $scope.current = current;
    $scope.user = user;
    $scope.reviews = null;
    $scope.newReview = {tutorial_id: current.id};
    $scope.getAllReviews = function () {
        $http({
            url: "allReviews",
            method: "POST",
            data: current.id
        }).then(function (result) {
            console.log(result);
            $scope.reviews = result.data;
        });
    };
    var initReviews = function () {
        $scope.getAllReviews();
        console.log("tuto name: " + $scope.current.name);
    };
    initReviews();
    $scope.addReview = function () {
        $http({
            url: "addReview",
            method: "POST",
            data: $scope.newReview
        }).then(function (result) {
            console.log(result);
            initReviews();
        });
        $scope.newReview = {tutorial_id: current.id};
    };
    $scope.rate = 3;
    $scope.max = 5;
    $scope.min = 1;

    $scope.modifyTuto = function () {
        $http({
            url: "updateTutorial",
            method: "POST",
            data: $scope.current
        }).then(function (result) {
            console.log(result);
        });
        $uibModalInstance.close();
    };

    $scope.deleteTuto = function () {
        $http({
            url: "deleteTutorial",
            method: "POST",
            data: current.id
        }).then(function (result) {
            console.log(result);
        });
        $uibModalInstance.close();
    };
    $scope.cancel = function () {
        $uibModalInstance.close();
    };
});



