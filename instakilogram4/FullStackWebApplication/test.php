<?php
include_once('php/functions.php');
session_start();
for ($i = 0; $i < 10; $i++){
    if (isset($_GET['search'])) {
        $user_search = clean_text($_GET['user_search']);
        echo $user_search;
    }
}
$_GET['search'] = '';
