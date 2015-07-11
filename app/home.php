<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<div layout="center center" layout-align="center center">
	</br>
	WEATHER
</div>

<div  layout="center center" layout-align="center center">
        </br>
        <md-input-container>
          <label>Find your city</label>
          <input ng-model="city_find">
        </md-input-container>
	</br>
        <md-button ng-click="get_weather(city_find)">Get it !</md-button>
</div>

<div  layout="center center" layout-align="center center">
	CITY : {{city}}
	</br>
	TEMERATURE : {{temp}} °C
	</br>
	MIN : {{min_temp}} °C
	</br>
	MAX : {{max_temp}} °C
	</br>
	WIND : {{wind_speed}} m/s
	</br>
	SKY : {{weather_type}}
</div>
</head>
<body>
