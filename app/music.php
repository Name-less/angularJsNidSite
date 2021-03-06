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
		</md-button>
	       <md-button ng-click="next_sound()">
                        Next
                </md-button>
	</div>

</br>
<div layout-align="center center" layout="center center">
        <form action="./php_scripts/upload.php" target="_blank" method="post" enctype="multipart/form-data">
          	<label>Select your file (mp3, 8Mo Max)</label>
          	<input ng-model="upload" type="file" name="fileToUpload" id="fileToUpload">
                <md-button type="submit" value="Upload sound" name="submit">Send</md-button>
        </form>
</div>

      </md-content>

    </section>
</md-sidenav>

         <div >
                <md-button ng-click="toggleRight()">SETTINGS</md-button>
        </div>

	<div layout="center center" layout-align="center center" ng-show="dl_in_process">
		<md-progress-circular class="md-accent md-hue-1" md-mode="indeterminate"></md-progress-circular>
	</div>
	<div layout="center center" layout-align="center center" ng-show="dl_in_process">
		Stoling sound from youtube in process !
	</div>

        <div layout="center center" layout-align="center center" ng-show="!dl_in_process">
		Actual sound played : {{current_song}}
        </div>

	<div layout="center center" layout-align="center center" ng-show="!dl_in_process">
	        <md-input-container>
        		<label>Trouve ton son</label>
          		<input ng-model="search">
        	</md-input-container>
	</div>
        <div layout="center center" layout-align="center center" ng-repeat="song in json_songs | filter:search | orderBy:'nom'" ng-show="!dl_in_process">
		<md-button ng-href="/#/music?play_song=true&name={{song.nom}}">{{song.nom}}</md-button>
        </div>

</head>
<body>


