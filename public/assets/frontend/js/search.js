 var app= angular.module('ngAppSearch', []);
    app.controller('SearchController', function($scope, $http) {
        $scope.films = []; 
        $scope.SearchFuntion = function(){             
            $http({
                method : "POST",
                data: {"key":$scope.searchValue},
                url : 'search'
            }).then(function mySuccess(response) {
                $scope.films = response.data;
            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });  
        };          
    }); 