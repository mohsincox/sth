<?php
	$input = "SmackFactory";

	$encrypted = encryptIt( $input );
	$decrypted = decryptIt( $encrypted );

	echo $encrypted . '<br />' . $decrypted;

	function encryptIt( $q ) {
	    $cryptKey  = '2974788b53f73e7950e8aa49f3a306db';
	    //$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	    return( $qEncoded );
	}

	function decryptIt( $q ) {
	    $cryptKey  = '2974788b53f73e7950e8aa49f3a306db';
	    //$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
	    return( $qDecoded );
	}
?>