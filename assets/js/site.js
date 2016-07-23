
var app = angular.module("myApp", ['ui.bootstrap', 'angularMoment']);

angular.module("myApp").controller(
        "myCtrl",
        function ($scope, $http, $log, $uibModal) {
            $scope.current = null;
            $scope.newTuto = null;
            $scope.newUser = null;
            $scope.user = null;

            $scope.getUser = function () {
                $http.get('getUser').then(function (result) {
                    console.log(result);
                    if (!result.data == "") {
                        $scope.user = result.data;
                    }
                });
            };
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
            $scope.addTuto = function () {
                $http({
                    url: "addTutorial",
                    method: "POST",
                    data: $scope.newTuto
                }).then(function (result) {
                    console.log(result);
                    init();
                });
                $scope.newTuto = null;
            };

            $scope.login = function () {
                $http({
                    url: "login",
                    method: "POST",
                    data: $scope.newUser
                }).then(function (result) {
                    console.log(result);
                    $scope.getUser();
                });
                $scope.newUser = null;
            };

            $scope.logout = function () {
                $http.post('logout').then(function (result) {
                    console.log(result);
                });
                $scope.user = null;
            }

            var init = function () {
                $scope.getAllTutos();
                console.log("test");
                $scope.getUser();
            };



            $scope.alert = null;

            init();
            $scope.open = function (size) {
                var modalInstance = $uibModal.open({
                    templateUrl: 'tutorial',
                    controller: 'ModalInstanceCtrl',
                    size: size,
                    resolve: {
                        current: function () {
                            return $scope.current;
                        },
                        user: function () {
                            return $scope.user;
                        }

                    }
                });
                modalInstance.result.then(function () {
                    init();
                }, function () {
                    $log.info('Modal dismissed at: ' + new Date());
                    init();
                });
            };

            $scope.alert = function (size) {
                var modalInstance = $uibModal.open({
                    templateUrl: 'AlertContent.html',
                    controller: 'AlertCtrl',
                    size: size,
                    resolve: {
                    }
                });
                modalInstance.result.then(function () {
                    init();
                }, function () {
                    $log.info('AlertModal dismissed at: ' + new Date());
                    init();
                });
            };
        });



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

angular.module('myApp').controller('AlertCtrl', function ($scope, alert) {
    $scope.alert = alert;

});






 