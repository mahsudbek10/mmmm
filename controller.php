<?php

if(isset($_GET['url'])){
    $_GET['url'] = "index";
//    header("Location: index");
    
} else {
//    header("Location: index");
}
echo $_SERVER['REQUEST_URI'];
print_r($_GET);