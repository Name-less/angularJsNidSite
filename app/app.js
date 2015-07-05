'use strict';

var app = angular.module('app',['ngMaterial','ngRoute']);

app.constant("appConfig",{
    path : {base : "http://lenid.local/achillejs"},
    routes : {
        baseUrl : '',
        music : {
            url : '/music',
            ctrl : 'musicctrl',
            file : 'music.php'
        }
    }

});

app.config(['$routeProvider','appConfig',function($routeProvider,appConfig){

    for(var i in appConfig.routes){
        var route = appConfig.routes[i];
        $routeProvider.when(route.url,{
            templateUrl: appConfig.routes.baseUrl+route.file,
            controller: route.ctrl
        });
    }
}]);

app.controller('appctrl',function($location,$scope){

        $scope.test = "le nid en anguler comming soon";
        $location.path('/music');
});

app.controller('musicctrl',function($scope){

});
