<?php
$host='localhost';
$db_user='root';
$password='root';
$link = mysqli_connect("localhost", "root", "root");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query="CREATE DATABASE login";
$r1=mysqli_query($link,$query);


$query1="USE DATABASE login";
$r2=mysqli_query($link,$query1);

$query2="CREATE TABLE login(email char(30) PRIMARY KEY,password char(31))";
$r3=mysqli_query($link,$query2);

$query3="CREATE TABLE user(ID unsigned bigint NOT NULL PRIMARY KEY,fname varchar(30),lname varchar(30),college varchar(30),course varchar(30))";
$r4=mysqli_query($link,$query3);


?>