'use strict';

var network = angular.module('network', ['resourceNetwork']);

network.factory('Music', ["appConfig",'resourceNetworkFac',function(appConfig,$resource) {
    return $resource(appConfig.path.base+"/api/music/:id",{idM: "@id"});
}]);

network.factory('Current', ["appConfig",'resourceNetworkFac',function(appConfig,$resource) {
    return $resource(appConfig.path.base+"/api/music/current/:id",{idM: "@id"});
}]);

network.factory('Volume', ["appConfig",'resourceNetworkFac',function(appConfig,$resource) {
    return $resource(appConfig.path.base+"/api/music/volume/:id",{idM: "@id"});
}]);

network.factory('Next', ["appConfig",'resourceNetworkFac',function(appConfig,$resource) {
    return $resource(appConfig.path.base+"/api/music/next/:id",{idM: "@id"});
}]);


