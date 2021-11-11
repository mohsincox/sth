<?php

//Example string.
$string = "My milkshake brings all the boys to the yard";

//Get the first character.
$firstCharacter = $string[0];
echo $firstCharacter;
echo "<br>";

//Get the first character using substr.
$firstCharacter2 = substr($string, 0, 1);
echo $firstCharacter2;
echo '<br>';

//Get the first two characters using the "index" approach.
$firstTwoCharacters = $string[0] . $string[1];
echo $firstTwoCharacters;
echo "<br>";

//Get the first two characters using substr.
$firstTwoCharacters2 = substr($string, 0, 2);
echo $firstTwoCharacters2;
echo '<br>';