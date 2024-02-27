<?php
include('config.php');
function str_openssl_enc($str,$iv){
	$key='1234567890vishal%$%^%$$#$#';
	$chiper="AES-128-CTR";
	$options=0;
	$str=openssl_encrypt($str,$chiper,$key,$options,$iv);
	return $str;
}

if(isset($_POST['submit'])){
	$iv=openssl_random_pseudo_bytes(16);
	$name=$_POST['name'];
	$email=$_POST['email'];
	
	$name=str_openssl_enc($name,$iv);
	$email=str_openssl_enc($email,$iv);
	
	$iv=bin2hex($iv);
	
	$id=mysqli_query($con,"insert into userdata(name,email,iv) values('$name','$email','$iv')");
	if($id>0){
		echo '<script>alert("data submitted")</script>';
	}else{
		echo '<script>alert("data not submitted")</script>';
	}
}
?>
<form method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" required></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" required></td> 
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit"></td> 
		</tr>
	</table>
</form>