<?php

$options = [
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  PDO::ATTR_PERSISTENT => true
];
$dbname = 'sortable';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$pdo = new PDO("mysql:dbname=".$dbname.";host=".$dbhost, $dbuser, $dbpass,$options);