<!DOCTYPE html>
<html ng-app="app" ng-controller="appctrl">
<head>
  <meta charset="utf-8">

  <title>Le Nid</title>
    <link rel="stylesheet" href="app.css">

  <link rel="stylesheet" href="bower_components/html5-boilerplate/dist/css/normalize.css">
  <link rel="stylesheet" href="bower_components/html5-boilerplate/dist/css/main.css">
  <link rel="stylesheet" href="app.css">

 <link rel="stylesheet" href="bower_components/angular-material/angular-material.css">
 <link rel="stylesheet" href="bower_components/angular-material/angular-material.min.css" type="text/css">

    <script src="bower_components/angular/angular.js"></script>
   <script src="app.js"></script>
    <script src="bower_components/angular-material/angular-material.min.js"></script>
    <script src="bower_components/angular-material/angular-material.js"></script>

    <script src="bower_components/angular-animate/angular-animate.min.js"></script>
    <script src="bower_components/angular-animate/angular-animate.js"></script>
<script src="bower_components/angular-aria/angular-aria.js"></script>

</head>
<body>

<md-toolbar >
    <md-button ng-show="isRegister" ng-click="toggleLeft()">
        {{test}}
    </md-button>
    <md-button ng-show="!isRegister" ng-click="showAdvanced($event)">
        {{test}}{{isRegister}}
    </md-button>
</md-toolbar>

  <div ng-view></div>

<md-sidenav class="md-sidenav-left" md-component-id="left">
    <section>
        <md-toolbar>
	 <h1 class="md-toolbar-tools">Le nid</h1>
        </md-toolbar>
    </section>

        <section layout="column" >
                <md-button class="md-raised md-primary" ng-click="go('/home')">INFOS</md-button>
        </section>

        <section layout="column" >
		<md-button class="md-raised md-primary" ng-click="go('/music')">MUSIC ROOM</md-button>
        </section>

	<section layout="column" >
                <md-button class="md-raised md-primary" ng-click="go('/chat')">CHAT ROOM</md-button>
        </section>

</md-sidenav>
  <script src="bower_components/angular/angular.js"></script>
  <script src="bower_components/angular-route/angular-route.js"></script>
  <script src="components/version/version.js"></script>
  <script src="components/version/version-directive.js"></script>
  <script src="components/version/interpolate-filter.js"></script>
</body>
</html>
