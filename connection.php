<?php
$DBhost = "fdb26.awardspace.net";
$DBusername = "3440114_addressbook";
$DBpassword = "10raphaelwakiii10";
$DBname = "3440114_addressbook";

$conn = mysqli_connect($DBhost,$DBusername,$DBpassword,$DBname);

if(!$conn){
    die("Connection failed : ".mysqli_connect.error($conn));
}