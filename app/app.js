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
        },
        home : {
            url : '/home',
            ctrl : 'homectrl',
            file : 'home.php'
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

app.controller('appctrl',function($location,$scope,$mdSidenav,$log,$mdUtil,$timeout){
	$scope.toggleLeft = buildToggler('left');

    function buildToggler(navID) {
      var debounceFn =  $mdUtil.debounce(function(){
            $mdSidenav(navID)
              .toggle()
              .then(function () {
              });
          },300);
      return debounceFn;
    }

        $scope.test = "=> le nid en angular is comming soon ... <=";
    $scope.go = function(path){
        $location.path(path);
	$location.url($location.path());
	$scope.close();
    }

    $scope.close = function () {
      $mdSidenav('left').close()
        .then(function () {
          //$log.debug("close LEFT is done");
        });
    };

});

app.controller('musicctrl',function($mdUtil,$scope,$location,$mdSidenav,$http,$routeParams){
	$scope.play_song = $routeParams.play_song;
	$scope.url_play = $routeParams.name;

	$scope.toggleRight = buildToggler('musicnav');

	function buildToggler(navID) {
      		var debounceFn =  $mdUtil.debounce(function(){
            	$mdSidenav(navID)
              .toggle()
              .then(function () {
              });
          },300);
      	return debounceFn;
    	};
	$scope.stateMusic = "Play";

        $scope.json_songs;
        $scope.get_json_song_url = './php_scripts/get_json_song.php';
        $scope.get_json_song = function(){
        $http.post($scope.get_json_song_url, "lol").
                success(function(data, status) {
                        $scope.json_songs = data;
                        //console.log(JSON.stringify(data));
                })
                .
                error(function(data, status) {
                        console.log("fail");
                });

        };
        $scope.get_json_song();

	var base = "/achillejs/app/index.php#/music?play_song=true&name=";
        var stringToSec = function(data){
		var duration = data.split(":");
		var sec = duration[2].split(".");
		var duration = duration[0]*3600*1000+duration[1]*60*1000+sec[0]*1000;
		//console.log(duration);
                return duration;
        };

        $scope.get_sound_length_url = './php_scripts/get_sound_length.php';
        $scope.get_sound_length = function(data){
        $http.post($scope.get_sound_length_url,data).
                success(function(data, status) {
                        console.log(data);

			clearTimeout();
			var duration = stringToSec(data);
			var randomNumber = Math.floor((Math.random() * $scope.json_songs.length) + 1);
			setTimeout(function() { 
				//href($scope.json_songs[randomNumber].nom);
				var base = 'http://lenid.local/achillejs/app/index.php#/music?play_song=true&name=';
				var sound = $scope.json_songs[randomNumber].nom;
				location.replace(base.concat(sound.trim())); 
			},duration);

                })
                .
                error(function(data, status) {
                        console.log("fail");
                });

        };

	if($scope.play_song === 'true'){
		$scope.stateMusic = "Pause";
		$scope.url = './php_scripts/play_song.php';
		$scope.play = function() {
 		$scope.get_sound_length($scope.url_play);
		$http.post($scope.url, $scope.url_play).
		success(function(data, status) {
			//console.log(data);
		})
		.
		error(function(data, status) {
			console.log("fail");
		});
		$location.search('play_song', null);
		$location.search('name', null);
		$location.search('duration', null);

		};
		$scope.play();
	}
	
	$scope.song_action = 1;
	$scope.play_pause_url = './php_scripts/play_pause.php';
	
	$scope.play_pause = function(){
 	$http.post($scope.play_pause_url, $scope.song_action).
                success(function(data, status) {
			$scope.song_action = data;
			if($scope.song_action == 1){
				$scope.stateMusic = "Pause";
			}else{
				$scope.stateMusic = "Play";
			}
                })
                .
                error(function(data, status) {
                        console.log("fail");
                });

	};


	$scope.change_song_url = './php_scripts/change_sound_volume.php';
        $scope.change_volume = function(){
        $http.post($scope.change_song_url, $scope.volume).
                success(function(data, status) {
			//console.log(data);
                })
                .
                error(function(data, status) {
                        console.log("fail");
                });

        };

	$scope.dl_url = './php_scripts/dl_video.php';
        $scope.dl_youtube = function(){
        $http.post($scope.dl_url, $scope.dl).
                success(function(data, status) {
                        console.log(data);
			location.reload();
                })
                .
                error(function(data, status) {
                        console.log("fail");
                });

        };

        $scope.get_sound_url = './php_scripts/get_sound_value.php';
        $scope.get_sound = function(){
        $http.post($scope.get_sound_url, "lol").
                success(function(data, status) {
                        $scope.volume = parseInt(data);
                })
                .
                error(function(data, status) {
                        console.log("fail");
                });

        };
	$scope.get_sound();

});

app.controller('homectrl',function($scope){
	$scope.test = "test";
});
