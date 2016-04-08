

$(document).ready(function () {
    alert('Hello World!');
});
var app = angular.module("myApp", []);

app.controller('tutoCtrl', ['$scope', '$http', function ($scope, $http) {
        console.log("Initiating the controller");
        $http.get('/ngtuto/app/models/tutorials.php').success(function (data) {
         
            $scope.tutos = data;
        });
        console.log($scope.tutos);
    }]);


