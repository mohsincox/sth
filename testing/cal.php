<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> HTML5 page </title>
</head>
<body>

<form name="form" >
Enter numbers:
<br><input id="sum1" onblur="updatesum()" value="" />
<br><input id="sum2" onblur="updatesum()" value="" />
<br><input id="sum3" onblur="updatesum()" value="" />
<br>Their sum is: <input id="sum" readonly style="border:0px;">
</form>

<script type="text/javascript">
function updatesum() {
  var i=1, total=0, tmp;
  while (i <= 3) {
    tmp = 'sum'+i;
    total += (Number(document.getElementById(tmp).value));
    i++;
  }
  document.getElementById('sum').value = total;
}
</script>

</body>
</html>