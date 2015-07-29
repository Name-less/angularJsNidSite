var express = require('express');
var app = express();
var sys = require('sys')
var exec = require('child_process').exec;
var soundPlaying;

var fs = require('fs');

//return the list on music
app.get('/api/music', function(req, res) {

	var files = fs.readdirSync('/media/usbhd-sda1/music');
	var json_music = [];
	var fs = require('fs');
	var files = fs.readdirSync('/home/pi/achillejs/app/php_scripts');
	var y = 0;
	
	for (var i in files) {
		var json = '{nom:'+files[i]+'}';
		json_music[i] = json;
		y++;
	}

	res.send(json_music);

});

//return the music currently played
app.get('/api/music/current', function(req, res) {
        fs.readFile('./sound_played', function (err, data) {
                if (err) throw err;
                        res.send('{"sound":'+data+'}');
        });
});

//play the music pass in parameter
app.post('/api/music/:name', function(req, res) {

	var sound_name = req.sound;
	
	sound_name = sound_name.replace(' ','\ ');
	sound_name = sound_name.replace('(','\(');
	sound_name = sound_name.replace(')','\)');
	sound_name = sound_name.replace('"','\"');
	sound_name = sound_name.replace("'","\'");
	sound_name = sound_name.replace('&','\&');

	var cmd = 'mplayer -idle /media/usbhd-sda1/music/'+sound_name+'> /dev/null 2>/dev/null &';

	function puts(error, stdout, stderr) { sys.puts(stdout) }
	exec(cmd, puts);

	fs.writeFile("./sound_played", sound_name, function(err) {
    		if(err) {
        		return console.log(err);
    		}
	});

    res.send({id:req.params.id, name: "The Name", description: "description"});
});

//return the volume of the raspi
app.get('/api/music/volume', function(req, res) {
	fs.readFile('./volume', function (err, data) {
  		if (err) throw err;
  			res.send('{"volume":'+data+'}');
	});
    //res.send();
});

//change the volume of the raspi
app.post('/api/music/volume/:volume', function(req, res) {
	var num = req.value*30/100+70;
	var cmd = 'amixer sset PCM '+num+'%';
        function puts(error, stdout, stderr) { sys.puts(stdout) }
        exec(cmd, puts);
       fs.writeFile("./volume", num, function(err) {
                if(err) {
                        return console.log(err);
                }
        });
});

//play or pause the song actually played
app.post('/api/music/changeState', function(req, res) {
	if(soundPlaying == 1){
		var cmd = "sudo kill -SIGSTOP $(ps -e | grep mplayer | cut -d ' ' -f 2)";
		soundPlaying = 0;
		function puts(error, stdout, stderr) { sys.puts(stdout) }
        	exec(cmd, puts);
		res.send('{"state":'+0+'}');
	}else{
		var cmd = "sudo kill -SIGCONT $(ps -e | grep mplayer | cut -d ' ' -f 2)";
		soundPlaying = 1;
        	function puts(error, stdout, stderr) { sys.puts(stdout) }
        	exec(cmd, puts);
		res.send('{"state":'+1+'}');
	}
});

//pass to next song
app.post('/api/music/next', function(req, res) {
    res.send({id:req.params.id, name: "The Name", description: "description"});
});

//return the next song
app.get('/api/music/next', function(req, res) {
    res.send({id:req.params.id, name: "The Name", description: "description"});
});

app.listen(3000);
