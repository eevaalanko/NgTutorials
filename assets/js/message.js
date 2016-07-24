angular.module('myApp').controller('MessageCtrl', function ($scope, currentMsg, $uibModalInstance) {
    $scope.currentMsg = currentMsg;
    
    $scope.cancel = function () {
        $uibModalInstance.close();
    };
});


