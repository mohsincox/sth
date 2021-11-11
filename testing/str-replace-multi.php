<?php
// Provides: You should eat pizza, beer, and ice cream every day

// $phrase  = "You should eat fruits, vegetables, and fiber every day.";
// $healthy = ["fruits", "vegetables", "fiber"];
// $yummy   = ["pizza", "beer", "ice cream"];

// Output:
// You should eat fruits, vegetables, and fiber every day.
// You should eat pizza, beer, and ice cream every day.

$phrase  = '[{"Name":"Belgian Chocolate (mini) ( Cone ) 85 ml 24 Pack","Qty":"2"},{"Name":"Chocolate ( 2 Liter ) 2000ml  1 Pack","Qty":"5"}]';
$healthy = ["[", "]", "{", "}", '"'];
$yummy   = ["", "", "", "", ''];

// Output:
// [{"Name":"Belgian Chocolate (mini) ( Cone ) 85 ml 24 Pack","Qty":"2"},{"Name":"Chocolate ( 2 Liter ) 2000ml 1 Pack","Qty":"5"}]
// Name:Belgian Chocolate (mini) ( Cone ) 85 ml 24 Pack,Qty:2 ,Name:Chocolate ( 2 Liter ) 2000ml 1 Pack,Qty:5

$newPhrase = str_replace($healthy, $yummy, $phrase);

echo $phrase;
echo "<br>";
echo $newPhrase;