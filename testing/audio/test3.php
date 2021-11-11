<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<style type="text/css">
		#notification {
		    position:fixed;
		    top:0px;
		    width:100%;
		    z-index:105;
		    text-align:center;
		    font-weight:normal;
		    font-size:14px;
		    font-weight:bold;
		    color:white;
		    background-color:#FF7800;
		    padding:5px;
		}
		#notification span.dismiss {
		    border:2px solid #FFF;
		    padding:0 5px;
		    cursor:pointer;
		    float:right;
		    margin-right:10px;
		}
		#notification a {
		    color:white;
		    text-decoration:none;
		    font-weight:bold
		}
	</style>
</head>
<body>
	<div id="notification" style="display: none;">
  		<span class="dismiss"><a title="dismiss this notification">x</a></span>
	</div>

	<script type="text/javascript">
		$("#notification").fadeIn("slow").append('your message');
		$(".dismiss").click(function(){
       		$("#notification").fadeOut("slow");
		});
	</script>
</body>
</html>