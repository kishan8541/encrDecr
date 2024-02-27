<?php

$hostname = 'localhost';
$username = 'root';
$password = 'Admin1234#@';
$dbname ='encDec';

$con = mysqli_connect($hostname,$username,$password,$dbname);

if($con){
    echo "conection succesfully";

}

else{

    echo "database not connected";
}
?>