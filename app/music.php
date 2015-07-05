<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<md-sidenav class="md-sidenav-right md-whiteframe-z2" md-component-id="musicnav">
    <section>
        <md-toolbar>
         <h1 class="md-toolbar-tools">Let's song !</h1>
        </md-toolbar>
	<md-content layout-padding="">

	<div layout>
      		<md-slider ng-change="change_volume()" flex min="0" max="100" ng-model="volume" aria-label="red" id="red-slider" class>
      		</md-slider>
      		<div flex="20" layout layout-align="center center">
        		<input type="number" ng-model="volume" aria-label="red" aria-controls="red-slider">
      		</div>
	</div>

        <md-input-container>
          <label>Download youtube song</label>
          <input ng-model="dl">
        </md-input-container>
	<div layout-align="center center" layout="center center">
        	<md-button ng-click="dl_youtube()">
                	Download !
        	</md-button>
	</div>
	<div layout-align="center center" layout="center center">
		<md-button ng-click="play_pause()">
			{{stateMusic}}
		</button>
	</div>
      </md-content>
    </section>
</md-sidenav>

         <div >
                <md-button ng-click="toggleRight()">SETTINGS</md-button>
        </div>

	<div layout="center center" layout-align="center center">
	        <md-input-container>
        		<label>Trouve ton son</label>
          		<input ng-model="search">
        	</md-input-container>
	</div>
        <div layout="center center" layout-align="center center" ng-repeat="song in json_songs | filter:search | orderBy:'nom'">
		<md-button ng-href="/achillejs/app/index.php#/music?play_song=true&name={{song.nom}}">{{song.nom}}</md-button>
        </div>

</head>
<body>


