
var app = angular.module("myApp", []);
angular.module("myApp").controller(
        "myCtrl",
        function ($scope, $http) {
            $scope.currentTuto = {id: "1"};

            $scope.getAllTutos = function () {
                $http.get('allTutorials').success(function (result) {
                    console.log(result);
                    $scope.tutos = result;
                    console.log("Tutoriaalin nimi on: " + $scope.tutos[0].name);
                });
            };

            $scope.open = function () {

            };

            $scope.openTutoPage = function () {
                $http.post('findTutorial', {'id': 'testi_id'})
                        .then(function (result) {
                               console.log(result);
                            //    $scope.currentTuto = result;
                            //    $scope.open();
                        });
            };
            var init = function () {
                $scope.getAllTutos();
            };
            init();
        });





 