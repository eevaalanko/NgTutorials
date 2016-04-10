
var app = angular.module("myApp", []);
var gem = {
    name: 'Dodecahedron',
    price: 2.95,
    description: '. . .'
};
angular.module("myApp").controller(
        "myCtrl",
        function ($scope, $http) {
            this.product = gem;

            $scope.tutos = {};

            $scope.getAllTutos = function () {
                $scope.loading = true;
                $http.get('allTutorials').success(function (result) {
                    console.log(result);
                    $scope.tutos = result[0];
                    console.log("eeeeeeee" + $scope.tutos.name);
                });

                $scope.customer = {
                    name: 'TTT',
                    id: 0
                };
            };
            $scope.username = 'World';

            $scope.sayHello = function () {
                $scope.greeting = 'Hello ' + $scope.username + '!';
            };
            var init = function () {
                $scope.getAllTutos();
            };
            // and fire it after definition
            init();

        });





 