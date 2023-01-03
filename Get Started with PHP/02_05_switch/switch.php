<?php
$name = match (2) {
    1 => 'One',
    2 => 'Two',
    default => 'Unkown'
};

echo $name;

//$food = 'cake';
//
//$return_value = match ($food) {
//    'apple' => 'This food is an apple',
//    'bar' => 'This food is a bar'
//};

//$turtle = 'Leo';
//$bandana = '';
//switch( $turtle ) {
//    case 'Leo':
//        $bandana = 'blue';
//        break;
//    case 'Raph':
//        $bandana = 'red';
//        break;
//    case 'Mike':
//        $bandana = 'orange';
//        break;
//    case 'Don':
//        $bandana = 'purple';
//        break;
//}
//
//echo "<p>$bandana</p>";
//
$turtle = 'Don';
$bandana = match($turtle) {
    'Leo' => 'blue',
    'Raph' => 'red',
    'Mikey' => 'orange',
    'Don' => 'purple',
    //default => 'red',
};

echo $bandana;
