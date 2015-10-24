<?php
session_start();
if(isset($_POST['adminlogin']))
{
	if($_POST['username']=="root" && $_POST['password']=="prabhu")
	{
	$_SESSION["username"]=$_POST['username'];
	print_r($_SESSION);
	//header("location:admin.php");
	}
	else{ 
	  echo "<script>";
	  echo "alert('Login Credentials are wrong')";
	  echo "</script>";
	}
}

//Two buttons in form one for author and one for admin

if(isset($_POST['authorlogin']))
{
	if($_POST['username']=="author" && $_POST['password']=="author")
	{
	$_SESSION["username"]=$_POST['username'];
	$_SESSION["password"]=$_POST['password'];
	header("location:authors.php");
	}
	else{
	  echo "<script>";
	  echo "alert('Login Credentials are wrong')";
	  echo "</script>";
	}
}


?>
<html>
<head>
<title>Login</title>
<style>
tableheader {
background-color: #95BEE6;
color:white;
font-weight:bold;
}
.tablerow {
background-color: #A7D6F1;
color:white;
}
.message {
color: #FF0000;
font-weight: bold;
text-align: center;
width: 100%;
}
</style>
</head>
<body>
<form name="authoruser" method="post" action="" autocomplete="off">
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="username" autocomplete="off"  required/></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password" autocomplete="off" required/></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="authorlogin" value=" AUTHOR LOGIN"></td>
<td align="center" colspan="2"><input type="submit" name="adminlogin" value="ADMIN LOGIN"></td>

</tr>
</table>
</form>

</body>
</html>