<?php
session_start();
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'ass');

/* Attempt to connect to MySQL database */
$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }