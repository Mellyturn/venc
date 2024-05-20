<?php

define('DB_SERVER', '194.110.173.106');
define('DB_USERNAME' , 'sust_matthew');
define('DB_PASSWORD' , 'qwe');
define('DB_DATABASE' , 'sust_main');

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!$conn) {
 die("Connection Failed: ". mysqli_connect_error());
}