<?php
	// $unicodeChar = '\u1000';
	// echo json_decode('"'.$unicodeChar.'"');
//echo "আমার সোনার বাংলা";
	echo $en = utf8_encode("আমার সোনার বাংলা");
	echo $de = utf8_decode($en);
?>