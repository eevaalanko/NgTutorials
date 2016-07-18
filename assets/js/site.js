
/* global callback */

var app = angular.module("myApp", ['ui.bootstrap', 'angularMoment']);
angular.module("myApp").controller(
        "myCtrl",
        function ($scope, $http, $log, $uibModal) {
            $scope.current = null;
            $scope.getAllTutos = function () {
                $http.get('allTutorials').then(function (result) {
                    console.log(result);
                    $scope.tutos = result.data;
                    console.log("Tutoriaalin nimi on: " + $scope.tutos[0].name);
                });
            };

            $scope.openTutoPage = function (tuto) {
                $scope.current = tuto;
                $scope.open('lg');
                console.log($scope.current);
            };

            $scope.addTuto = function (id) {
                $http({
                    url: "saveTutorial",
                    method: "POST",
                    data: id
                }).then(function (result) {
                    console.log(result);
                });
            };

            var init = function () {
                $scope.getAllTutos();
                console.log("test");
            };

            init();


            $scope.items = ['item1', 'item2', 'item3'];

            $scope.animationsEnabled = true;

            $scope.open = function (size) {

                var modalInstance = $uibModal.open({
                    animation: $scope.animationsEnabled,
                    templateUrl: 'myModalContent.html',
                    controller: 'ModalInstanceCtrl',
                    size: size,
                    resolve: {
                        items: function () {
                            return $scope.items;
                        }
                    }
                });

                modalInstance.result.then(function (selectedItem) {
                    $scope.selected = selectedItem;
                }, function () {
                    $log.info('Modal dismissed at: ' + new Date());
                });
            };
            $scope.items = ['item1', 'item2', 'item3'];

            $scope.animationsEnabled = true;

            $scope.open = function (size) {

                var modalInstance = $uibModal.open({
                    animation: $scope.animationsEnabled,
                    templateUrl: 'myModalContent.html',
                    controller: 'ModalInstanceCtrl',
                    size: size,
                    resolve: {
                        items: function () {
                            return $scope.items;
                        },
                        current: function () {
                            return $scope.current;
                        }
                    }
                });

                modalInstance.result.then(function (selectedItem) {
                    $scope.selected = selectedItem;
                }, function () {
                    $log.info('Modal dismissed at: ' + new Date());
                });
            };
            $scope.toggleAnimation = function () {
                $scope.animationsEnabled = !$scope.animationsEnabled;
            };

        });

angular.module('myApp').controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, items, current) {
    $scope.current = current;
    $scope.items = items;
    $scope.selected = {
        item: $scope.items[0]
    };

    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});






 