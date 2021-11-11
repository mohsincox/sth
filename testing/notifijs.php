<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>testing</h2>

	<script>
	   console.log(Notification.permission);
	   if (Notification.permission === "granted") {
	      alert("we have permission");
	   } else if (Notification.permission !== "denied") {
	      Notification.requestPermission().then(permission => {
	         console.log(permission);
	      });
	   }
	</script>
</body>
</html>