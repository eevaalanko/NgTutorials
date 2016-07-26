angular.module('myApp').controller('MemoCtrl', function ($scope, $uibModalInstance) {   
    $scope.cancel = function () {
        $uibModalInstance.close();
    };
});


