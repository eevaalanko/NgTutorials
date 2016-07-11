
var app = angular.module("myApp", []);
angular.module("myApp").controller(
        "myCtrl",
        function ($scope, $http) {
            $scope.currentTuto = null;
           // $scope.tutos = [];                       
            $scope.getAllTutos = function () {
                $http.get('allTutorials').then(function (result) {
                    console.log(result);
                    $scope.tutos = result.data;
                   console.log("Tutoriaalin nimi on: " + $scope.tutos[0].name);
                });
            };

            $scope.open = function () {
                
            };

            $scope.openTutoPage = function (id) {               
                $http.post('findTutorial', id)
                        .then(function (result) {
                               console.log(result);
                            //    $scope.currentTuto = result;
                            //    $scope.open();
                        });
            };
            
            var init = function () {
                $scope.getAllTutos();
                console.log("test");
            };
            
            init();
        });





 