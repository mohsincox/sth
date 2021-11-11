<?php 
	$brands = ['Apple', 'Google', 'Microsoft', 'Facebook'];
    $brandsArray = [];
    foreach($brands as $brand) 
        $brandsArray[] = '<a class="h2" href="/top/brand/' . $brand . '">' . $brand . '</a>';
    
    echo implode(", ", $brandsArray);
?>
