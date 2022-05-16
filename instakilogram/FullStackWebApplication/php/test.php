<?php 
    $file_location = '../../UserData/ProfileImages/';
    $files = scandir ($file_location);
    for ($x = 2; $x < count($files); $x++) {
    echo $files[$x].' ';
}
?>