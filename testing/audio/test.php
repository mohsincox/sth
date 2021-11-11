<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- <audio id="audio" autoplay="" src="Bach.mid" loop="true"></audio> -->
	<audio id="audio">
  <source src="horse.mp3" type="audio/mpeg">
</audio>

	<script type="text/javascript">
		// var soundPlayer = new Audio('Bach.mid').play();
// 		var sounds = document.getElementById('audio');
// if(localstorage.getItem('music')=='stop'){

//   sounds.pause();
// }else{

//   sounds.play();
// }

		var audio = document.getElementById("audio");

audio.play();
// audio.currentTime = 0;
	</script>

</body>
</html>