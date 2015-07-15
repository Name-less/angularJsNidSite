<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<div class="box">
	<md-whiteframe class="md-whiteframe-z1" layout layout-align="center center">


		<div>
        		<md-input-container>
          			<label>Find your city</label>
          			<input ng-model="city_find">
        		</md-input-container>
        		<md-button ng-click="get_weather(city_find)">Get it !</md-button>
			</br>
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
			</br>
		</div>
	</md-whiteframe>
</div>

<div class="box">
kvjdfpjvopdfjvpjfpdj
</div>

</body>
</html>
