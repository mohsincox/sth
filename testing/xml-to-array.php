<?php
//SELECT MAX(start_time), `uniqueid`, `extension`, `comment_b`, `phone_ext` FROM `live_inbound_log` GROUP BY `uniqueid` ORDER BY MAX(start_time)
	$xmlString = '<aaaa Version="1.0">
				   <bbb>
				     <cccc>
				       <dddd Id="id:pass" />
				       <eeee name="hearaman" age="24" />
				     </cccc>
				   </bbb>
				</aaaa>';
	$xml = new SimpleXMLElement($xmlString);
	echo $xml->bbb->cccc->dddd['Id'];
	echo "<br>";
	echo $xml->bbb->cccc->eeee['name'];
	echo "<br>";
	// or...........
	foreach ($xml->bbb->cccc as $element) {
	  foreach($element as $key => $val) {
	   echo "{$key}: {$val}";
	  }
	}
?>