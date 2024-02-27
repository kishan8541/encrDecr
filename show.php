<?php
include('config.php');

function str_openssl_dec($str, $iv){
    $key = '1234567890vishal%$%^%$$#$#';
    $cipher = "AES-128-CTR";
    $options = 0;
    $decrypted_str = openssl_decrypt($str, $cipher, $key, $options, $iv);
    return $decrypted_str;
}

$res = mysqli_query($con, "SELECT * FROM userdata ORDER BY id DESC");

if (!$res) {
    die('Error: ' . mysqli_error($con));
}

echo "<table border='1'>";
echo "<tr><td>Id</td><td>Name</td><td>Email</td></tr>";
while ($row = mysqli_fetch_assoc($res)) {
    $iv = hex2bin($row['iv']);
    $name = str_openssl_dec($row['name'], $iv);
    $email = str_openssl_dec($row['email'], $iv);
    
    echo "<tr><td>".$row['id']."</td><td>".$name."</td><td>".$email."</td></tr>";
}
echo "</table>";
?>
