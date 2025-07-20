<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fixittest";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);