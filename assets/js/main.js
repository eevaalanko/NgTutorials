
var app = angular.module("myApp", ['ui.bootstrap', 'angularMoment']);

angular.module("myApp").controller(
        "myCtrl",
        function ($scope, $http, $log, $uibModal) {
            $scope.current = null;
            $scope.newTuto = null;
            $scope.newUser = null;
            $scope.user = null;
            $scope.alert = null;

            $scope.getUser = function () {
                $http.get('getUser').then(function (result) {
                    console.log(result);
                    if (result.data !== "") {
                        $scope.user = result.data;
                    }
                    ;
                });
            };

            $scope.getAllTutos = function () {
                $http.get('allTutorials').then(function (result) {
                    console.log(result);
                    $scope.tutos = result.data;
                    console.log("Tutoriaalin nimi on: " + $scope.tutos[2]);
                });
            };
            $scope.openTutoPage = function (tuto) {
                $scope.current = tuto;
                $scope.open('lg');
                console.log($scope.current);
            };
            $scope.addTuto = function () {
                if ($scope.tutoForm.$valid) {
                    $http({
                        url: "addTutorial",
                        method: "POST",
                        data: $scope.newTuto
                    }).then(function (result) {
                        console.log(result);
                        init();
                    });
                    $scope.newTuto = {'publisher': $scope.user.id};
                    $scope.openMessage(6);
                } else {
                    $scope.openMessage(3);
                }
                ;
            };
            $scope.login = function () {
                $http({
                    url: "login",
                    method: "POST",
                    data: $scope.newUser
                }).then(function (result) {
                    console.log(result);
                    $scope.newUser = null;
                    $scope.newTuto = {'publisher': $scope.user.id};
                    $scope.getUser();
                });
            };
            $scope.logout = function () {
                $http.post('logout').then(function (result) {
                    console.log(result);
                });
                $scope.user = null;
                init();
            };
            var init = function () {
                $scope.getAllTutos();
                $scope.getUser();
                console.log("test");
                if ($scope.user !== null) {
                    $scope.newTuto = {'publisher': $scope.user.id};
                }
                ;

            };
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

            $scope.signup = function (size) {
                var modalInstance = $uibModal.open({
                    templateUrl: 'signup',
                    controller: 'SignupCtrl',
                    size: size
                });
                modalInstance.result.then(function (signedUp) {
                    $scope.signedUp = signedUp;
                    if (signedUp) {
                        $scope.openMessage(2);
                    }
                    ;
                }, function () {
                    $log.info('SignupModal dismissed at: ' + new Date());
                    init();
                });
            };

            $scope.messages = {1: "Wrong username or password",
                2: "You have successfully signed up to ngTutorials!",
                3: "Invalid fields",
                4: "User name or email is already in use.",
                5: "Bye for now",
                6: "Tutorial added to database"
            };

            $scope.openMessage = function (msg) {
                $scope.currentMsg = $scope.messages[msg];
                $uibModal.open({
                    templateUrl: 'message',
                    controller: 'MessageCtrl',
                    resolve: {
                        currentMsg: function () {
                            return $scope.currentMsg;
                        }
                    }
                });
            };

            init();
        });









 