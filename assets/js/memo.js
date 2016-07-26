angular.module('myApp').controller('MemoCtrl', function ($scope, $uibModalInstance, user, $http) {
    $scope.favorites = null;
    $scope.getAllFavorites = function () {
        $http({
            url: "allFavorites",
            method: "POST",
            data: user.id
        }).then(function (result) {
            console.log(result);
            $scope.favorites = result.data;
        });
    };

    $scope.deleteFavorite = function (favorite) {
        $http({
            url: "deleteFavorite",
            method: "POST",
            data: favorite.id
        }).then(function (result) {
            console.log(result);
            alert('You removed tutorial ' + favorite.tutorial_name + ' from your memo.');
            initFavorites();
        });
        
    };
    var initFavorites = function () {
        $scope.getAllFavorites();
        console.log($scope.favorites);
    };

    initFavorites();

    $scope.cancel = function () {
        $uibModalInstance.close();
    };
});


