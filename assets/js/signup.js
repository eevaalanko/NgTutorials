angular.module('myApp').controller('SignupCtrl', function ($scope, $http, $uibModalInstance) {
    $scope.newUser = null;
    $scope.signedUp = false;

    $scope.cancel = function () {
        $uibModalInstance.close();
    };

    $scope.signup = function () {
        if ($scope.userForm.$valid) {
            $http({
                url: "addUser",
                method: "POST",
                data: $scope.newUser
            }).then(function (result) {
                console.log(result);
            });
            $scope.newUser = null;
            $scope.signedUp = true;
            $uibModalInstance.close($scope.signedUp);
        } else {
            alert('Invalid fields');
        }
    };
});




