<?php

$host="localhost";
$usr="root";
$password="";
$db="myshopee2122";

$conn = new mysqli($host,$usr,$password,$db);
if ($conn->connect_error) {
    die("Connection failed::::::: ".$conn->connect_error);}
   
?>