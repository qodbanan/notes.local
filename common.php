<?php

// function get uri
function getCurrentUri()
{
    $http = ($_SERVER['REQUEST_SCHEME'] == "http") ? 'http' : 'https';
    $uri = $http . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/";
    return $uri;
}


// print var
function print_var($var) {
    if(is_array($var)) {
        echo '<pre>' . PHP_EOL;;
        print_r($var);
        echo '</pre>' . PHP_EOL;;
    } elseif(is_object($var)) {
        echo '<pre>' . PHP_EOL;;
        var_export($var);
        echo '</pre>' . PHP_EOL;;
    } else {
        echo $var . "<br>" . PHP_EOL;
    }
}


// Get current time and date
function getDateTime() {
	return date("Y-m-d H:i:s",time());
}

// function hash password
function hashData($value) {
    $sal = "#@&;#dds955AAdf)(---df=dsf$%21@PW865dsf6CDsd0$";
    $v1 = sha1($sal . md5($value) . $sal);
    return $v1;
}




