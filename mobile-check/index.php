<?php

// https://stackoverflow.com/questions/2257597/reliable-user-browser-detection-with-php

if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   echo 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    echo 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   echo 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'wv') !== FALSE)
   echo 'wv Mobile Mobile';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== FALSE)
   echo 'Mobile Mobile';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   echo 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   echo "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   echo "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   echo "Safari";
 else
   echo 'Something else';


/*
//https://www.geeksforgeeks.org/how-to-detect-a-mobile-device-using-php/

function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
, $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){
    echo "Mobile Browser Detected";
}
else {
    echo "Mobile Browser Not Detected";
}



if(strpos($_SERVER['HTTP_USER_AGENT'], 'wv') !== FALSE) {
	echo 'right';
} else {
    echo 'error';
}

*/