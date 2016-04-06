$(document).ready(function () {
    //alert('Hello World!');
    var app = angular.module("myApp", []);

    app.controller('tutoCtrl', ['$scope', '$http', function ($scope, $http) {
            console.log("Initiating the controller");
            $http.get('{{base_path}}/app/models/tuto.php').success(function (data) {
                $scope.tutos = data;
            });
        }]);

});
